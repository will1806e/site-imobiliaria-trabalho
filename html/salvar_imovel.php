<?php
require_once "../php/conexao.php";
require_once "../php/funcoes.php";

function redirecionar($mensagem): void
{
    header("Location: admin.php?msg=" . urlencode($mensagem));
    exit;
}

function salvar_upload(string $campo, ?int $indice = null): ?string
{
    $arquivo = $indice === null ? ($_FILES[$campo] ?? null) : [
        "name" => $_FILES[$campo]["name"][$indice] ?? "",
        "tmp_name" => $_FILES[$campo]["tmp_name"][$indice] ?? "",
        "error" => $_FILES[$campo]["error"][$indice] ?? UPLOAD_ERR_NO_FILE,
    ];

    if (!$arquivo || $arquivo["error"] === UPLOAD_ERR_NO_FILE) {
        return null;
    }

    if ($arquivo["error"] !== UPLOAD_ERR_OK) {
        redirecionar("Erro ao enviar imagem.");
    }

    $permitidas = ["jpg", "jpeg", "png", "webp", "gif"];
    $extensao = strtolower(pathinfo($arquivo["name"], PATHINFO_EXTENSION));

    if (!in_array($extensao, $permitidas, true)) {
        redirecionar("Formato de imagem invalido.");
    }

    $pasta = dirname(__DIR__) . DIRECTORY_SEPARATOR . "uploads";
    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $nomeArquivo = uniqid("imovel_", true) . "." . $extensao;
    $destino = $pasta . DIRECTORY_SEPARATOR . $nomeArquivo;

    if (!move_uploaded_file($arquivo["tmp_name"], $destino)) {
        redirecionar("Nao foi possivel salvar a imagem.");
    }

    return $nomeArquivo;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirecionar("Requisicao invalida.");
}

if (!conexao_disponivel($c) || !tabela_imoveis_existe($c)) {
    redirecionar("Importe o banco.sql antes de cadastrar.");
}

$id = (int) ($_POST["id"] ?? 0);
$titulo = trim($_POST["titulo"] ?? "");
$descricao = trim($_POST["descricao"] ?? "");
$tipo = trim($_POST["tipo_imovel"] ?? "");
$finalidade = $_POST["finalidade"] ?? "Venda";
$valor = (float) ($_POST["valor"] ?? 0);
$cidade = trim($_POST["cidade"] ?? "");
$bairro = trim($_POST["bairro"] ?? "");
$imagemAtual = $_POST["imagem_atual"] ?? "";
$imagem = salvar_upload("imagem") ?? $imagemAtual;

if (!$titulo || !$descricao || !$tipo || !$finalidade || !$cidade || !$bairro || !$imagem) {
    redirecionar("Preencha todos os campos obrigatorios.");
}

if ($id > 0) {
    $stmt = mysqli_prepare($c, "UPDATE imoveis SET titulo = ?, descricao = ?, tipo_imovel = ?, finalidade = ?, valor = ?, cidade = ?, bairro = ?, imagem = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssssdsssi", $titulo, $descricao, $tipo, $finalidade, $valor, $cidade, $bairro, $imagem, $id);
    mysqli_stmt_execute($stmt);
    $imovelId = $id;
    $mensagem = "Imovel atualizado com sucesso.";
} else {
    $stmt = mysqli_prepare($c, "INSERT INTO imoveis (titulo, descricao, tipo_imovel, finalidade, valor, cidade, bairro, imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssdsss", $titulo, $descricao, $tipo, $finalidade, $valor, $cidade, $bairro, $imagem);
    mysqli_stmt_execute($stmt);
    $imovelId = mysqli_insert_id($c);
    $mensagem = "Imovel cadastrado com sucesso.";
}

if (isset($_FILES["imagens_adicionais"])) {
    $total = count($_FILES["imagens_adicionais"]["name"]);

    for ($i = 0; $i < $total; $i++) {
        $imagemExtra = salvar_upload("imagens_adicionais", $i);
        if (!$imagemExtra) {
            continue;
        }

        $stmtExtra = mysqli_prepare($c, "INSERT INTO imovel_imagens (imovel_id, imagem) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmtExtra, "is", $imovelId, $imagemExtra);
        mysqli_stmt_execute($stmtExtra);
    }
}

redirecionar($mensagem);
?>

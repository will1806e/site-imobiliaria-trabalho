<?php
function conexao_disponivel($c): bool
{
    return $c instanceof mysqli;
}

function tabela_imoveis_existe($c): bool
{
    if (!conexao_disponivel($c)) {
        return false;
    }

    $resultado = mysqli_query($c, "SHOW TABLES LIKE 'imoveis'");
    return $resultado && mysqli_num_rows($resultado) > 0;
}

function buscar_imoveis($c): array
{
    if (!tabela_imoveis_existe($c)) {
        return imoveis_exemplo();
    }

    $sql = "SELECT id, titulo, descricao, tipo_imovel, finalidade, valor, cidade, bairro, imagem
            FROM imoveis
            ORDER BY id DESC";
    $resultado = mysqli_query($c, $sql);

    if (!$resultado) {
        return [];
    }

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function buscar_imovel_por_id($c, int $id): ?array
{
    if (!tabela_imoveis_existe($c)) {
        foreach (imoveis_exemplo() as $imovel) {
            if ((int) $imovel["id"] === $id) {
                return $imovel;
            }
        }

        return null;
    }

    $stmt = mysqli_prepare($c, "SELECT id, titulo, descricao, tipo_imovel, finalidade, valor, cidade, bairro, imagem FROM imoveis WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $imovel = mysqli_fetch_assoc($resultado);

    return $imovel ?: null;
}

function imagens_galeria_imovel($c, array $imovel): array
{
    $imagens = [];

    if (!empty($imovel["imagem"])) {
        $imagens[] = ["imagem" => $imovel["imagem"]];
    }

    if (!empty($imovel["id"])) {
        $imagens = array_merge($imagens, imovel_imagens_adicionais($c, (int) $imovel["id"]));
    }

    if (count($imagens) > 1) {
        return $imagens;
    }

    return array_merge($imagens, [
        ["imagem" => "../imagens/modern-childrens-room.png"],
        ["imagem" => "../imagens/mid-century-modern-dining-area.png"],
        ["imagem" => "../imagens/interior-of-living-room-at-night-with-illuminated-tv-and-ceiling.png"],
    ]);
}

function imovel_imagens_adicionais($c, int $id): array
{
    if (!conexao_disponivel($c)) {
        return [];
    }

    $resultadoTabela = mysqli_query($c, "SHOW TABLES LIKE 'imovel_imagens'");
    if (!$resultadoTabela || mysqli_num_rows($resultadoTabela) === 0) {
        return [];
    }

    $stmt = mysqli_prepare($c, "SELECT imagem FROM imovel_imagens WHERE imovel_id = ? ORDER BY id ASC");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function formatar_moeda($valor): string
{
    return "R$ " . number_format((float) $valor, 2, ",", ".");
}

function limpar_texto($texto): string
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, "UTF-8");
}

function caminho_imagem(?string $imagem): string
{
    if (!$imagem) {
        return "../imagens/interior-of-living-room.png";
    }

    if (substr($imagem, 0, 3) === "../") {
        return $imagem;
    }

    return "../uploads/" . $imagem;
}

function imoveis_exemplo(): array
{
    return [
        [
            "id" => 1,
            "titulo" => "Casa com 3 quartos",
            "descricao" => "Casa ampla com area gourmet, boa iluminacao e garagem.",
            "tipo_imovel" => "Casa",
            "finalidade" => "Venda",
            "valor" => 450000,
            "cidade" => "Barreiras",
            "bairro" => "Centro",
            "imagem" => "../imagens/interior-of-living-room.png",
        ],
        [
            "id" => 2,
            "titulo" => "Apartamento mobiliado",
            "descricao" => "Apartamento pronto para morar perto de servicos essenciais.",
            "tipo_imovel" => "Apartamento",
            "finalidade" => "Aluguel",
            "valor" => 1800,
            "cidade" => "Barreiras",
            "bairro" => "Renato Goncalves",
            "imagem" => "../imagens/mid-century-modern-dining-area.png",
        ],
        [
            "id" => 3,
            "titulo" => "Sobrado moderno",
            "descricao" => "Sobrado com ambientes integrados e acabamento contemporaneo.",
            "tipo_imovel" => "Sobrado",
            "finalidade" => "Venda",
            "valor" => 620000,
            "cidade" => "Barreiras",
            "bairro" => "Morada Nobre",
            "imagem" => "../imagens/modern-childrens-room.png",
        ],
    ];
}
?>

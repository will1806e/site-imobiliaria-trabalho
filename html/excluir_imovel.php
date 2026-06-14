<?php
require_once "../php/conexao.php";
require_once "../php/funcoes.php";

$id = (int) ($_GET["id"] ?? 0);

if ($id > 0 && conexao_disponivel($c) && tabela_imoveis_existe($c)) {
    $stmt = mysqli_prepare($c, "DELETE FROM imoveis WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

header("Location: admin.php?msg=" . urlencode("Imovel excluido com sucesso."));
exit;
?>

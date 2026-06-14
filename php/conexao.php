<?php
// Dados da conexao do XAMPP/MySQL.
$host = "localhost";
$nome = "root";
$senha = "";
$bd = "imobiliaria";

mysqli_report(MYSQLI_REPORT_OFF);

$c = @mysqli_connect($host, $nome, $senha, $bd);

if ($c) {
    mysqli_set_charset($c, "utf8mb4");
}
?>

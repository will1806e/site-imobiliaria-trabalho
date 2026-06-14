<?php
// Dados da conexao do XAMPP/MySQL.
$host = "127.0.0.1";
$porta = 3307;
$nome = "root";
$senha = "";
$bd = "imobiliaria";

mysqli_report(MYSQLI_REPORT_OFF);

$c = @mysqli_connect($host, $nome, $senha, $bd, $porta);

if ($c) {
    mysqli_set_charset($c, "utf8mb4");
}
?>

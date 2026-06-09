<?php
//Dados da conexão
$host = "localhost";
$nome = "root";
$senha = "";
$bd = "imobiliaria";

// Variavel de conexão
$c = mysqli_connect($host,$nome,$senha,$bd);

//Verificação se a conexão foi estabelecida
if (!$c) {
    die("Erro de Conexão: " . mysqli_connect_error());
}
?>
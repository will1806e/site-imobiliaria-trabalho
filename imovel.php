<?php
$query = $_SERVER["QUERY_STRING"] ?? "";
$destino = "html/imovel.php" . ($query ? "?" . $query : "");

header("Location: " . $destino);
exit;
?>

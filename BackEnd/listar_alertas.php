<?php
include('conexao.php');

$stmt = $banco->query("SELECT * FROM alertas");

$alertas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
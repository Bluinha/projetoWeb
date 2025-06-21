<?php
include('conexao.php');

$stmt = $banco->query("SELECT * FROM producao_leite");

$producoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
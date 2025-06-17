<?php
include('conexao.php');

$stmt = $banco->query("SELECT * FROM teste_mastite");

$testes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
include('conexao.php');

$stmt = $banco->query("SELECT * FROM vacas");
$vacas = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($vacas as $vaca) {
    echo "ID: " . $vaca['id_vaca'] . " - Nome: " . $vaca['nome'] . " - Descarte: " . $vaca['descarte'] . "<br>";
}
?>
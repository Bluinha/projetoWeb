<?php
require("conexao.php");

$stmt = $banco->query("SELECT * FROM vacas");
$vacas = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($vacas) > 0) {
    foreach ($vacas as $vaca) {
        echo "<tr>";
        echo "<td>{$vaca['id_vaca']}</td>";
        echo "<td>{$vaca['nome']}</td>";
        echo "<td>{$vaca['descarte']}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'><strong>Nenhuma vaca encontrada</strong></td></tr>";
}
?>
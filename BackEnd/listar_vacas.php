<?php
require("conexao.php");

try {
    $stmt = $banco->query("SELECT * FROM vacas");
    $vacas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($vacas) > 0) {
        foreach ($vacas as $vaca) {
            echo "<tr data-id='{$vaca['id_vaca']}'>";
            echo "<td>{$vaca['id_vaca']}</td>";
            echo "<td class='nome-vaca'>{$vaca['nome']}</td>";
            echo "<td>{$vaca['descarte']}</td>";
            echo "<td class='acoes'>";
            echo "<button class='btn-editar' onclick='editarVaca(this)'>Editar</button>";
            echo "<button class='btn-excluir' onclick='excluirVaca({$vaca['id_vaca']}, this)'>Excluir</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'><strong>Nenhuma vaca encontrada</strong></td></tr>";
    }
} catch (PDOException $e) {
    echo "<tr><td colspan='4'><strong>Erro ao carregar vacas: " . $e->getMessage() . "</strong></td></tr>";
}
?>
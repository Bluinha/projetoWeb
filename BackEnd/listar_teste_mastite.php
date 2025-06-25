<?php
require("../../BackEnd/conexao.php");

try {
    $stmt = $banco->query("
        SELECT t.*, v.nome as nome_vaca 
        FROM teste_mastite t
        JOIN vacas v ON t.id_vaca = v.id_vaca
        ORDER BY t.data DESC
    ");
    $testes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($testes) > 0) {
        foreach ($testes as $teste) {
            echo "<tr data-id='{$teste['id_teste']}'>";
            echo "<td>{$teste['id_teste']}</td>";
            echo "<td>{$teste['nome_vaca']} (ID: {$teste['id_vaca']})</td>";
            echo "<td>" . date('d/m/Y', strtotime($teste['data'])) . "</td>";
            echo "<td>" . ($teste['resultado'] ? 'Positivo' : 'Negativo') . "</td>";
            echo "<td>{$teste['quantas_cruzes']}</td>";
            echo "<td>{$teste['ubere']}</td>";
            echo "<td>{$teste['tratamento']}</td>";
            echo "<td>{$teste['observacoes']}</td>";
            echo "<td class='acoes'>";
            echo "<button class='btn-editar' onclick='editarTeste(this)'>Editar</button>";
            echo "<button class='btn-excluir' onclick='excluirTeste({$teste['id_teste']}, this)'>Excluir</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'><strong>Nenhum teste de mastite registrado</strong></td></tr>";
    }
} catch (PDOException $e) {
    echo "<tr><td colspan='9'><strong>Erro ao carregar testes de mastite: " . $e->getMessage() . "</strong></td></tr>";
}
?>
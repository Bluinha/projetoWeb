<?php
require("conexao.php");

try {
    $stmt = $banco->query("
        SELECT p.*, v.nome as nome_vaca 
        FROM producao_leite p
        JOIN vacas v ON p.id_vaca = v.id_vaca
        ORDER BY p.data DESC
    ");
    $producoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($producoes) > 0) {
        foreach ($producoes as $producao) {
            echo "<tr data-id='{$producao['id_producao']}'>";
            echo "<td>{$producao['id_producao']}</td>";
            echo "<td>{$producao['nome_vaca']} (ID: {$producao['id_vaca']})</td>";
            echo "<td>{$producao['quantidade']} L</td>";
            echo "<td>" . date('d/m/Y', strtotime($producao['data'])) . "</td>";
            echo "<td class='acoes'>";
            echo "<button class='btn-editar' onclick='editarProducao(this)'>Editar</button>";
            echo "<button class='btn-excluir' onclick='excluirProducao({$producao['id_producao']}, this)'>Excluir</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'><strong>Nenhuma produção de leite registrada</strong></td></tr>";
    }
} catch (PDOException $e) {
    echo "<tr><td colspan='5'><strong>Erro ao carregar produção de leite: " . $e->getMessage() . "</strong></td></tr>";
}
?>
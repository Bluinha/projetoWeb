<?php
// Este é um exemplo de como listar_producao_leite.php deve gerar o HTML
// Supondo que você já tenha a conexão e esteja buscando os dados do banco
require_once 'conexao.php'; // Use require_once para evitar múltiplos includes

try {
    $stmt = $banco->query("SELECT pl.id_producao, pl.id_vaca, v.nome AS nome_vaca, pl.quantidade, pl.data FROM producao_leite pl JOIN vacas v ON pl.id_vaca = v.id_vaca ORDER BY pl.data DESC");
    $producoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($producoes as $producao) {
        // É CRÍTICO que o atributo data-id-vaca seja adicionado aqui
        echo "<tr data-id=\"{$producao['id_producao']}\" data-id-vaca=\"{$producao['id_vaca']}\">";
        echo "<td>" . htmlspecialchars($producao['id_producao']) . "</td>";
        echo "<td>" . htmlspecialchars($producao['nome_vaca']) . " (ID: " . htmlspecialchars($producao['id_vaca']) . ")</td>"; // Exibe o nome da vaca também para melhor UX
        echo "<td class=\"quantidade-producao\">" . htmlspecialchars($producao['quantidade']) . " L</td>";
        echo "<td class=\"data-producao\">" . htmlspecialchars($producao['data']) . "</td>";
        echo "<td>";
        echo "<button onclick=\"editarProducao(this)\" class=\"btn-editar\">Editar</button>";
        echo "<button onclick=\"excluirProducao({$producao['id_producao']}, this)\" class=\"btn-excluir\">Excluir</button>";
        echo "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "<tr><td colspan='5'>Erro ao carregar produções de leite: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
}
?>
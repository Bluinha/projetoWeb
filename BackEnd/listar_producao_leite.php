<?php
require_once 'conexao.php'; 
require_once  'ordenar.php';
try {
    $stmt = $banco->query("SELECT pl.id_producao, pl.id_vaca, v.nome AS nome_vaca, pl.quantidade, pl.data FROM producao_leite pl JOIN vacas v ON pl.id_vaca = v.id_vaca");//deletado o order by para desordenar
    $producoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //chama o algoritmo de ordenação
    $producoes = quicksortPorData($producoes);

    foreach ($producoes as $producao) {
        echo "<tr data-id=\"{$producao['id_producao']}\" data-id-vaca=\"{$producao['id_vaca']}\">";
        echo "<td>" . htmlspecialchars($producao['id_producao']) . "</td>";
        echo "<td>" . htmlspecialchars($producao['nome_vaca']) . " (ID: " . htmlspecialchars($producao['id_vaca']) . ")</td>";
        echo "<td class=\"quantidade-producao\">" . htmlspecialchars($producao['quantidade']) . " L</td>";
        echo "<td class=\"data-producao\">" . date("d/m/Y", strtotime($producao['data'])) . "</td>";
        echo "<td>";
        echo "<button onclick=\"editarProducao(this)\" class=\"btn-editar\">Editar</button>";
        echo "<button onclick=\"excluirProducao({$producao['id_producao']}, this)\" class=\"btn-excluir\">Excluir</button>";
        echo "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "<tr><td colspan='5'>Erro ao carregar produções de leite: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
}

//ordenação quicksort

?>
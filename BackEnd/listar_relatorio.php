<?php
require_once __DIR__ . '/dao/relatorioDAO.php';

$uploadBaseUrl = '../../uploads/';

try {
    $relatorios = listarRelatorios();

    if (empty($relatorios)) {
        echo "<tr><td colspan='4'>Nenhum relatório enviado ainda.</td></tr>";
    } else {
        foreach ($relatorios as $relatorio) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($relatorio['nome_aluno']) . "</td>";
            echo "<td>" . htmlspecialchars($relatorio['nome_arquivo']) . "</td>";
            echo "<td>" . date("d/m/Y H:i", strtotime($relatorio['data_upload'])) . "</td>";
            echo "<td><a href='" . htmlspecialchars($uploadBaseUrl . $relatorio['caminho_arquivo']) . "' download class='btn-baixar'>Baixar</a></td>";
            echo "</tr>";
        }
    }
} catch (PDOException $e) {
    error_log("Erro ao listar relatórios: " . $e->getMessage());
    echo "<tr><td colspan='4'>Erro ao carregar relatórios.</td></tr>";
}

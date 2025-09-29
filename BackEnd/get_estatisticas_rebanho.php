<?php
require_once __DIR__ . '/dao/estatisticasDAO.php';

try {
    $mediaSemanal      = getMediaSemanalGeral();
    $incidencia        = getIncidenciaMastiteMensal();
    $ubereMaisAfetada  = getUbereMaisAfetada();
    $totalAbates       = getAbatesMensais();
    $mediasPorVaca     = getMediaSemanalPorVaca();
} catch (PDOException $e) {
    $mediaSemanal = $incidencia = $totalAbates = 0;
    $ubereMaisAfetada = "—";
    $mediasPorVaca = [];
}

?>
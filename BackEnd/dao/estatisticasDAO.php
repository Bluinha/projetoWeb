<?php
require_once __DIR__ . '/../core/conexao.php';

function getMediaSemanalGeral() {
    global $banco;
    $sql = "SELECT AVG(pl.quantidade) AS media_semanal
            FROM producao_leite pl
            WHERE YEARWEEK(pl.data) = YEARWEEK(CURDATE())";
    $stmt = $banco->query($sql);
    return $stmt->fetch(PDO::FETCH_ASSOC)['media_semanal'] ?? 0;
}

function getIncidenciaMastiteMensal() {
    global $banco;
    $sql = "SELECT (SUM(CASE WHEN tm.resultado = 'Positivo' THEN 1 ELSE 0 END) * 100.0 / COUNT(*)) AS incidencia
            FROM teste_mastite tm
            WHERE MONTH(tm.data) = MONTH(CURDATE())
              AND YEAR(tm.data) = YEAR(CURDATE())";
    $stmt = $banco->query($sql);
    return $stmt->fetch(PDO::FETCH_ASSOC)['incidencia'] ?? 0;
}

function getUbereMaisAfetada() {
    global $banco;
    $sql = "SELECT tm.ubere, COUNT(*) AS ocorrencias
            FROM teste_mastite tm
            WHERE tm.resultado = 'Positivo'
              AND MONTH(tm.data) = MONTH(CURDATE())
              AND YEAR(tm.data) = YEAR(CURDATE())
            GROUP BY tm.ubere
            ORDER BY ocorrencias DESC
            LIMIT 1";
    $stmt = $banco->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['ubere'] ?? '—';
}

function getAbatesMensais() {
    global $banco;
    $sql = "SELECT COUNT(*) AS total_abates
            FROM vacas
            WHERE descarte = 1";
    $stmt = $banco->query($sql);
    return $stmt->fetch(PDO::FETCH_ASSOC)['total_abates'] ?? 0;
}

function getMediaSemanalPorVaca() {
    global $banco;
    $sql = "SELECT v.id_vaca, v.nome AS nome_vaca, AVG(pl.quantidade) AS media_semanal
            FROM producao_leite pl
            JOIN vacas v ON pl.id_vaca = v.id_vaca
            WHERE YEARWEEK(pl.data) = YEARWEEK(CURDATE())
            GROUP BY v.id_vaca, v.nome
            ORDER BY media_semanal DESC";
    $stmt = $banco->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

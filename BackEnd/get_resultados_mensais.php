<?php
    require_once 'conexao.php'; // sua conexão PDO

    try {
        // === 1. Produção média semanal (geral do rebanho) ===
        $sql = "SELECT AVG(pl.quantidade) AS media_semanal
                FROM producao_leite pl
                WHERE YEARWEEK(pl.data) = YEARWEEK(CURDATE())";
        $stmt = $banco->query($sql);
        $mediaSemanal = $stmt->fetch(PDO::FETCH_ASSOC)['media_semanal'] ?? 0;


        // === 2. Incidência mensal de mastite (percentual de positivos) ===
        $sql = "SELECT (SUM(CASE WHEN tm.resultado = 'Positivo' THEN 1 ELSE 0 END) * 100.0 / COUNT(*)) AS incidencia
                FROM teste_mastite tm
                WHERE MONTH(tm.data) = MONTH(CURDATE())
                AND YEAR(tm.data) = YEAR(CURDATE())";
        $stmt = $banco->query($sql);
        $incidencia = $stmt->fetch(PDO::FETCH_ASSOC)['incidencia'] ?? 0;
        // === 3. Uberes mais afetadas no mês ===
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
        $ubereMaisAfetada = $row['ubere'] ?? '—';


        // === 4. Animais abatidos no mês ===
        $sql = "SELECT COUNT(*) AS total_abates
                FROM vacas
                WHERE descarte = 1";
        $stmt = $banco->query($sql);
        $totalAbates = $stmt->fetch(PDO::FETCH_ASSOC)['total_abates'] ?? 0;

        // === Produção média semanal detalhada por vaca ===
        $sql = "SELECT v.id_vaca, v.nome AS nome_vaca, AVG(pl.quantidade) AS media_semanal
                FROM producao_leite pl
                JOIN vacas v ON pl.id_vaca = v.id_vaca
                WHERE YEARWEEK(pl.data) = YEARWEEK(CURDATE())
                GROUP BY v.id_vaca, v.nome
                ORDER BY media_semanal DESC";
        $stmt = $banco->query($sql);
        $mediasPorVaca = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erro ao carregar resultados mensais: " . htmlspecialchars($e->getMessage()));
    }
?>
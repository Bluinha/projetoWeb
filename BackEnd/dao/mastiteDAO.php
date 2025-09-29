<?php
require_once __DIR__ . '/../conexao.php';

function inserirMastite($id_vaca, $resultado, $quantas_cruzes, $ubere, $tratamento, $observacoes, $data) {
    global $banco;
    $stmt = $banco->prepare("INSERT INTO teste_mastite (id_vaca, resultado, quantas_cruzes, ubere, tratamento, observacoes, data) 
                             VALUES (:id_vaca, :resultado, :quantas_cruzes, :ubere, :tratamento, :observacoes, :data)");
    return $stmt->execute([
        ':id_vaca' => $id_vaca,
        ':resultado' => $resultado,
        ':quantas_cruzes' => $quantas_cruzes,
        ':ubere' => $ubere,
        ':tratamento' => $tratamento,
        ':observacoes' => $observacoes,
        ':data' => $data
    ]);
}

function listarMastite() {
    global $banco;
    $sql = "SELECT tm.id_teste, tm.id_vaca, v.nome AS nome_vaca, tm.resultado, tm.quantas_cruzes,
                   tm.ubere, tm.tratamento, tm.observacoes, tm.data
            FROM teste_mastite tm
            JOIN vacas v ON tm.id_vaca = v.id_vaca
            ORDER BY tm.data DESC";
    $stmt = $banco->query($sql);
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function atualizarMastite($id, $resultado, $quantas_cruzes, $ubere, $tratamento, $observacoes, $data) {
    global $banco;
    $stmt = $banco->prepare("UPDATE teste_mastite 
                             SET resultado = :resultado, quantas_cruzes = :quantas_cruzes, ubere = :ubere, 
                                 tratamento = :tratamento, observacoes = :observacoes, data = :data
                             WHERE id_teste = :id");
    return $stmt->execute([
        ':resultado' => $resultado,
        ':quantas_cruzes' => $quantas_cruzes,
        ':ubere' => $ubere,
        ':tratamento' => $tratamento,
        ':observacoes' => $observacoes,
        ':data' => $data,
        ':id' => $id
    ]);
}

function excluirMastite($id) {
    global $banco;
    $stmt = $banco->prepare("DELETE FROM teste_mastite WHERE id_teste = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->rowCount();
}
?>

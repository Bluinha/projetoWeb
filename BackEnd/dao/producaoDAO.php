<?php
require_once __DIR__ . '/../conexao.php';

function inserirProducao($id_vaca, $quantidade, $data) {
    global $banco;
    $stmt = $banco->prepare("INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (:id_vaca, :quantidade, :data)");
    return $stmt->execute([
        ':id_vaca' => $id_vaca,
        ':quantidade' => $quantidade,
        ':data' => $data
    ]);
}

function listarProducao() {
    global $banco;
    $sql = "SELECT pl.id_producao, pl.id_vaca, v.nome AS nome_vaca, pl.quantidade, pl.data
            FROM producao_leite pl
            JOIN vacas v ON pl.id_vaca = v.id_vaca
            ORDER BY pl.data DESC";
    $stmt = $banco->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function atualizarProducao($id, $quantidade, $data) {
    global $banco;
    $stmt = $banco->prepare("UPDATE producao_leite 
                             SET quantidade = :quantidade, data = :data 
                             WHERE id_producao = :id");
    return $stmt->execute([
        ':quantidade' => $quantidade,
        ':data' => $data,
        ':id' => $id
    ]);
}

function excluirProducao($id) {
    global $banco;
    $stmt = $banco->prepare("DELETE FROM producao_leite WHERE id_producao = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->rowCount();
}
?>

<?php
require_once __DIR__ . '/../conexao.php';

function inserirVaca($nome, $descarte = 0) {
    global $banco;
    $stmt = $banco->prepare("INSERT INTO vacas (nome, descarte) VALUES (:nome, :descarte)");
    return $stmt->execute([':nome' => $nome, ':descarte' => $descarte]);
}

function listarVacas() {
    global $banco;
    $stmt = $banco->query("SELECT * FROM vacas");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function atualizarVaca($id, $novoNome) {
    global $banco;
    $stmt = $banco->prepare("UPDATE vacas SET nome = :nome WHERE id_vaca = :id");
    return $stmt->execute([':nome' => $novoNome, ':id' => $id]);
}

function excluirVaca($id) {
    global $banco;
    $stmt = $banco->prepare("DELETE FROM vacas WHERE id_vaca = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->rowCount();
}

?>
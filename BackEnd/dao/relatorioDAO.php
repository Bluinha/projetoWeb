<?php
require_once __DIR__ . '/../core/conexao.php';

function inserirRelatorio($idAluno, $nomeOriginal, $nomeSalvo) {
    global $banco;
    $stmt = $banco->prepare("
        INSERT INTO relatorios (id_aluno, nome_arquivo, caminho_arquivo, data_upload) 
        VALUES (:id_aluno, :nome_original, :nome_salvo, NOW())
    ");
    return $stmt->execute([
        ':id_aluno'     => $idAluno,
        ':nome_original'=> $nomeOriginal,
        ':nome_salvo'   => $nomeSalvo
    ]);
}

function listarRelatorios() {
    global $banco;
    $sql = "SELECT r.id_relatorio, r.nome_arquivo, r.caminho_arquivo, r.data_upload, u.nome AS nome_aluno
            FROM relatorios r
            JOIN usuarios u ON r.id_aluno = u.id_usuario
            ORDER BY r.data_upload DESC";
    $stmt = $banco->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

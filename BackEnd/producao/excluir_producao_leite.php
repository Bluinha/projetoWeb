<?php

require_once __DIR__ . '/../dao/producaoDAO.php'; 
header('Content-Type: application/json');

$id_producao = $_POST['id_producao'] ?? null; 


if (!$id_producao) {
    echo json_encode(['success' => false, 'message' => 'ID da produção não fornecido.']);
    exit;
}

try {
    if (excluirProducao($id_producao) > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Nenhum registro encontrado com este ID.']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
?>
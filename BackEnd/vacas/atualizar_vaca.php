<?php
require_once __DIR__ . '/../dao/vacasDAO.php'; 
header('Content-Type: application/json');

$id_vaca = $_POST['id_vaca'] ?? null;
$novo_nome = $_POST['novo_nome'] ?? null;

if (!$id_vaca || !$novo_nome) {
    echo json_encode(['success' => false, 'message' => 'Dados incompletos']);
    exit;
}

try {
    atualizarVaca($id_vaca, $novo_nome);
    
    echo json_encode(['success' => true]);
    
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
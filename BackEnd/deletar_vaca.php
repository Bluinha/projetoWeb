<?php
require("conexao.php");
header('Content-Type: application/json');

$id_vaca = $_POST['id_vaca'] ?? null;

if (!$id_vaca) {
    echo json_encode(['success' => false, 'message' => 'ID não fornecido']);
    exit;
}

try {
    $stmt = $banco->prepare("DELETE FROM vacas WHERE id_vaca = :id");
    $stmt->bindParam(':id', $id_vaca);
    $stmt->execute();
    
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
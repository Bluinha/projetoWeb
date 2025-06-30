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
    $stmt->bindValue(':id', $id_vaca, PDO::PARAM_INT);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {//verifca se realmente o elemento existe no banco de dados
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Nenhum registro encontrado com este ID.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
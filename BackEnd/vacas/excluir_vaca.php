<?php
    require_once __DIR__ . '/../dao/vacasDAO.php'; 
    header('Content-Type: application/json');

    $id_vaca = $_POST['id_vaca'] ?? null; 

    
    if (!$id_vaca) {
        echo json_encode(['success' => false, 'message' => 'ID não fornecido']);
        exit;
    }

    try {

        if (excluirVaca($id_vaca) > 0) { 
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Nenhum registro encontrado com este ID.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
?>
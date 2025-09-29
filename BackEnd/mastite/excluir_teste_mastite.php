<?php
require_once __DIR__ . '/../dao/mastiteDAO.php';  
header('Content-Type: application/json');


$id_teste = $_POST['id_teste'] ?? null;

if (!$id_teste) {
    echo json_encode(['success' => false, 'message' => 'ID do teste não fornecido.']);

    exit;
}

try {
    
    if (excluirMastite($id_teste) > 0) {
        
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Nenhum teste encontrado com este ID.']);
    }

} catch (PDOException $e) {

    echo json_encode(['success' => false, 'message' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
?>
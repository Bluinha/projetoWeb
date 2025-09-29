<?php

require_once __DIR__ . '/../dao/producaoDAO.php'; 
header('Content-Type: application/json');

if (isset($_POST['id_producao'], $_POST['id_vaca'], $_POST['quantidade'], $_POST['data'])) {
    
    $id_producao = $_POST['id_producao'];
    $id_vaca = $_POST['id_vaca'];
    $quantidade = $_POST['quantidade'];
    $data = $_POST['data'];

    $linhasAlteradas = atualizarProducao($id_producao, $id_vaca, $quantidade, $data);

    try {
        if ($linhasAlteradas > 0) {
            echo json_encode(['success' => true]);
        } else {
                
            echo json_encode(['success' => false, 'message' => 'Nenhuma alteração foi feita. Verifique se o ID da produção e da vaca existem ou se os dados são diferentes.']);
        }
       
    } catch (PDOException $e) {
        
        echo json_encode(['success' => false, 'message' => 'Erro de Banco de Dados: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Parâmetros ausentes na requisição POST.']);
}
?>
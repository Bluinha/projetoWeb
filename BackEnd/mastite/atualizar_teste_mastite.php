<?php
require_once __DIR__ . '/../dao/mastiteDAO.php';  
header('Content-Type: application/json');


if (isset($_POST['id_teste'], $_POST['resultado'], $_POST['quantas_cruzes'], $_POST['tratamento'], $_POST['observacoes'], $_POST['ubere'])) {
    $id_teste = $_POST['id_teste'];
    $resultado = $_POST['resultado'];
    $quantas_cruzes = $_POST['quantas_cruzes'];
    $tratamento = $_POST['tratamento'];
    $observacoes = $_POST['observacoes'];
    $ubere = $_POST['ubere'];

    try {
        $linhasAlteradas = atualizarMastite($id_teste, $resultado, $quantas_cruzes, $ubere, $tratamento, $observacoes);

        if ($linhasAlteradas > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Nenhuma alteração foi feita ou ID não encontrado.']);
        }
       
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erro de Banco de Dados: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Parâmetros ausentes na requisição POST.']);
}
?>

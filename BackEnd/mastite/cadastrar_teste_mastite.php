<?php
session_start();
require_once __DIR__ . '/../dao/mastiteDAO.php';  

if (isset($_POST['id_vaca'], $_POST['data'], $_POST['resultado'], $_POST['quantas_cruzes'])) {

    $id_vaca = $_POST['id_vaca']; 
    $data = $_POST['data']; 
    $resultado = ($_POST['resultado'] == '1') ? 'positivo' : 'negativo';
    $quantas_cruzes = $_POST['quantas_cruzes']; 

  
    if (isset($_POST['ubere']) && is_array($_POST['ubere'])) {
        $ubere = implode(", ", $_POST['ubere']);
    } else {
        $ubere = "";
    }

    $tratamento = $_POST['tratamento'] ?? ""; 
    $observacoes = $_POST['observacoes'] ?? ""; 

    if (inserirMastite($id_vaca, $resultado, $quantas_cruzes, $ubere, $tratamento, $observacoes, $data)) {
        $_SESSION['mensagem'] = "Teste adicionado com Sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao adicionar Teste de Mastite! Verifique os detalhes acima."; 
    }
    header("Location:/projetoWeb/FrontEnd/aluno/area_comum_aluno.php?secao=cadastro_teste");
    exit; 
}
?>

<?php
session_start(); 
require_once __DIR__ . '/../dao/producaoDAO.php'; 


if (isset($_POST['id_vaca'], $_POST['quantidade'], $_POST['data'])) {

    $id_vaca = $_POST['id_vaca']; 
    $quantidade = $_POST['quantidade']; 
    $data = $_POST['data']; 

    if (inserirProducao($id_vaca, $quantidade, $data)) {
        $_SESSION['mensagem'] = "Dados da produção de leite inseridos com sucesso!";
    } else {
         $_SESSION['mensagem'] = "Erro ao inserir os dados.";
    }

    header("Location: /projetoWeb/FrontEnd/aluno/area_comum_aluno.php?secao=cadastro");
    session_write_close();
    exit;
}
?>

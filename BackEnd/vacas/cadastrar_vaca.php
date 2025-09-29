<?php
session_start(); 
require_once __DIR__ . '/../dao/vacasDAO.php'; 


if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $descarte = 0; 

    if (inserirVaca($nome, $descarte)) {

        $_SESSION['mensagem'] = "Animal adicionado com Sucesso";
        
    } else {
        
        $_SESSION['mensagem'] = "Erro ao adicionar animal";
    }

    header("Location: /projetoWeb/FrontEnd/aluno/area_comum_aluno.php?secao=cadastro");
    session_write_close();
    exit;
}
?>
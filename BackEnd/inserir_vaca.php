<?php
session_start();
require('conexao.php'); // Conexão com o banco de dados

if (isset($_POST['nome'])) {
    // Pegue os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $descarte = 0;

    // Prepare e execute o insert
    $stmt = $banco->prepare("INSERT INTO vacas (nome, descarte) VALUES (:nome, :descarte)");
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':descarte', $descarte, PDO::PARAM_INT);

    //Retorne a pagina de casdastro com uma mensagem de erro ou de sucesso
    if ($stmt->execute()) {
        $_SESSION['mensagem'] =  "Animal adicionado com Sucesso";
        header("Location:../FrontEnd/aluno/area_comum_aluno.php?secao=cadastro");
        exit;
    } else {
        $_SESSION['mensagem'] =  "Erro ao adicionar animal";
        header("Location:../FrontEnd/aluno/area_comum_aluno.php?secao=cadastro");
        exit;
    }
}
?>
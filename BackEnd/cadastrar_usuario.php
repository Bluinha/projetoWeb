<?php
session_start();
include('conexao.php');

// Se o formulário foi enviado
if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['tipo_usuario'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo_usuario = $_POST['tipo_usuario'];

    $stmt = $banco->prepare("INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES (:nome, :email, :senha, :tipo_usuario)");
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senha);
    $stmt->bindValue(':tipo_usuario', $tipo_usuario);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Aluno adicionado com Sucesso";
        session_write_close(); 
        header("Location:../FrontEnd/professor/area_professor.php?secao=cadastro_aluno");
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao adicionar aluno";
        session_write_close(); 
        header("Location:../FrontEnd/professor/area_professor.php?secao=cadastro_aluno");
        exit; // Termina a execução do script
    }
}

?>


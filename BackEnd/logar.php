<?php
session_start();
require('conexao.php');

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($email && $senha) {
    $stmt = $banco->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Login válido
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

        if ($usuario['tipo_usuario'] === 'professor') {
            header("Location:  ../FrontEnd/professor/area_professor.php");
            exit();
        } elseif ($usuario['tipo_usuario'] === 'aluno') {
            header("Location:  ../FrontEnd/aluno/area_comum_aluno.php");
            exit();
        } else {
            $_SESSION['mensagem'] =  "Tipo de usuário inválido.";
            header("Location:  ../FrontEnd/login.php");
            exit();
        }
    } else {
        $_SESSION['mensagem'] =   "Email ou senha incorretos.";
        header("Location:  ../FrontEnd/login.php");
        exit();
    }
} else {
    $_SESSION['mensagem'] =   "Preencha email e senha.";
    header("Location:  ../FrontEnd/login.php");
    exit();
}

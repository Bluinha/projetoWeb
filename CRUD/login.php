<?php
session_start();
include('conexao.php');

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($email && $senha) {
    $stmt = $banco->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && $senha === $usuario['senha']){
        // Login válido
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

        if ($usuario['tipo_usuario'] === 'professor') {
            header("Location:  ../html/aluno/area_professor.html");
            exit();
        } elseif ($usuario['tipo_usuario'] === 'aluno') {
            header("Location:  ../html/aluno/area_comum_aluno.php");
            exit();
        } else {
            echo "Tipo de usuário inválido.";
        }
    } else {
        echo "Email ou senha incorretos.";
    }
} else {
    echo "Preencha email e senha.";
}
?>
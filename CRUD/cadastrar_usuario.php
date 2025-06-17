<?php
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
        echo "<p>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar o usuário.</p>";
        print_r($stmt->errorInfo()); 
    }
}

?>
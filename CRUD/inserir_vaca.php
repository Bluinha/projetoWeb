<?php
include('conexao.php'); // Conexão com o banco de dados

if (isset($_POST['nome'])) {
    // Pegue os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $descarte = 0;

    // Prepare e execute o insert
    $stmt = $banco->prepare("INSERT INTO vacas (nome, descarte) VALUES (:nome, :descarte)");
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':descarte', $descarte, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<p>Vaca inserida com sucesso!</p>";
    } else {
        echo "<p>Erro ao inserir a vaca.</p>";
        print_r($stmt->errorInfo()); 
    }
}
?>
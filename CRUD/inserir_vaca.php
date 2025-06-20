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

    //Retorne a pagina de casdastro com uma mensagem de erro ou de sucesso
    if ($stmt->execute()) {
        header("Location:../html/aluno/area_comum_aluno.php?msg=sucesso&secao=cadastro");
        exit;
    } else {
        header("Location:../html/aluno/area_comum_aluno.php?msg=sucesso");
        exit;
    }
}
?>
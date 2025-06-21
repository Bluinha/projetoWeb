<?php
include('conexao.php');

// Se o formulário foi enviado
if (isset($_POST['id_producao'], $_POST['id_vaca'], $_POST['quantidade'], $_POST['data'])) {
    $id_producao = $_POST['id_producao'];
    $id_vaca = $_POST['id_vaca'];
    $quantidade = $_POST['quantidade'];
    $data = $_POST['data'];

    $stmt = $banco->prepare("UPDATE producao_leite SET id_vaca = :id_vaca, quantidade = :quantidade, data = :data WHERE id_producao = :id_producao");

    $stmt->bindValue(':id_vaca', $id_vaca, PDO::PARAM_INT);
    $stmt->bindValue(':quantidade', $quantidade);
    $stmt->bindValue(':data', $data);
    $stmt->bindValue(':id_producao', $id_producao, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<p>Dados atualizados com sucesso!</p>";
    } else {
        echo "<p>Erro ao atualizar os dados.</p>";
        print_r($stmt->errorInfo()); 
    }
}

// Carregar os dados pra exibir no formulário
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $banco->prepare("SELECT * FROM producao_leite WHERE id_producao = :id");

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $producao = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
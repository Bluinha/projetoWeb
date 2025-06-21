<?php
include('conexao.php');

// Se o formulário foi enviado
if (isset($_POST['id'], $_POST['nome'], $_POST['descarte'])) {
    $id = $_POST['id'];
    $novo_nome = $_POST['nome'];
    $novo_descarte = $_POST['descarte'];

    $stmt = $banco->prepare("UPDATE vacas SET nome = :nome, descarte = :descarte WHERE id_vaca = :id");

    $stmt->bindValue(':nome', $novo_nome);
    $stmt->bindValue(':descarte', $novo_descarte, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<p>Vaca atualizada com sucesso!</p>";
    } else {
        echo "<p>Erro ao atualizar a vaca.</p>";
        print_r($stmt->errorInfo()); 
    }
}

?>
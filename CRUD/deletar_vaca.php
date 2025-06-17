<?php
include('conexao.php');

// Se o formulário foi enviado
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $banco->prepare("DELETE FROM vacas WHERE id_vaca = :id");

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<p>Vaca deletada com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir a vaca.</p>";
        print_r($stmt->errorInfo()); 
    }
}

?>
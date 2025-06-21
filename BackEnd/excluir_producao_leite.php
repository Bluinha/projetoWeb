<?php
include('conexao.php');

// Se o formulário foi enviado
if (isset($_POST['id_producao'])) {
    $id = $_POST['id_producao'];

    $stmt = $banco->prepare("DELETE FROM producao_leite WHERE id_producao = :id");

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<p>Dados excluídos com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir os dados.</p>";
        print_r($stmt->errorInfo()); 
    }
}

?>
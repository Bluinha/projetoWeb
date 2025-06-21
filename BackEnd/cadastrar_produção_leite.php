<?php
include('conexao.php');

// Se o formulário foi enviado
if (isset($_POST['id_vaca'], $_POST['quantidade'], $_POST['data'])) {
    $id_vaca = $_POST['id_vaca'];
    $quantidade = $_POST['quantidade'];
    $data = $_POST['data'];

    $stmt = $banco->prepare("INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (:id_vaca, :quantidade, :data)");
    $stmt->bindValue(':id_vaca', $id_vaca, PDO::PARAM_INT);
    $stmt->bindValue(':quantidade', $quantidade);
    $stmt->bindValue(':data', $data);

    if ($stmt->execute()) {
        echo "<p>Dados da produção de leite inseridos com sucesso!</p>";
    } else {
        echo "<p>Erro ao inserir os dados.</p>";
        print_r($stmt->errorInfo()); 
    }
}

?>
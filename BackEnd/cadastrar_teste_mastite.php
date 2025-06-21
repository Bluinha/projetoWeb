<?php
include('conexao.php');

// Se o formulário foi enviado
if (isset($_POST['id_vaca'], $_POST['data'], $_POST['resultado'], $_POST['quantas_cruzes'])) {
    $id_vaca = $_POST['id_vaca'];
    $data = $_POST['data'];
    $resultado = $_POST['resultado'];
    $quantas_cruzes = $_POST['quantas_cruzes'];
    $ubere = $_POST['ubere'];
    $tratamento = $_POST['tratamento'];
    $observacoes = $_POST['observacoes'];

    $stmt = $banco->prepare("INSERT INTO teste_mastite (id_vaca, data, resultado, quantas_cruzes, ubere, tratamento, observacoes) VALUES (:id_vaca, :data, :resultado, :quantas_cruzes, :ubere, :tratamento, :observacoes)");
    $stmt->bindValue(':id_vaca', $id_vaca, PDO::PARAM_INT);
    $stmt->bindValue(':data', $data);
    $stmt->bindValue(':resultado', $resultado);
    $stmt->bindValue(':quantas_cruzes', $quantas_cruzes, PDO::PARAM_INT);
    $stmt->bindValue(':ubere', $ubere);
    $stmt->bindValue(':tratamento', $tratamento);
    $stmt->bindValue(':observacoes', $observacoes);

    if ($stmt->execute()) {
        echo "<p>Dados do teste de mastite inseridos com sucesso!</p>";
    } else {
        echo "<p>Erro ao inserir os dados.</p>";
        print_r($stmt->errorInfo()); 
    }
}

?>
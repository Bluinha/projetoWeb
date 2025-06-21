<?php
include('conexao.php');

// Se o formulário foi enviado
if (isset($_POST['id_teste'], $_POST['id_vaca'], $_POST['data'], $_POST['resultado'], $_POST['quantas_cruzes'])) {
    $id_teste = $_POST['id_teste'];
    $id_vaca = $_POST['id_vaca'];
    $data = $_POST['data'];
    $resultado = $_POST['resultado'];
    $quantas_cruzes = $_POST['quantas_cruzes'];
    $ubere = $_POST['ubere'];
    $tratamento = $_POST['tratamento'];
    $observacoes = $_POST['observacoes'];

    $stmt = $banco->prepare("UPDATE teste_mastite SET id_vaca = :id_vaca, data = :data, resultado = :resultado, quantas_cruzes = :quantas_cruzes, ubere = :ubere, tratamento = :tratamento, observacoes = :observacoes WHERE id_teste = :id_teste");

    $stmt->bindValue(':id_vaca', $id_vaca, PDO::PARAM_INT);
    $stmt->bindValue(':data', $data);
    $stmt->bindValue(':resultado', $resultado);
    $stmt->bindValue(':quantas_cruzes', $quantas_cruzes, PDO::PARAM_INT);
    $stmt->bindValue(':ubere', $ubere);
    $stmt->bindValue(':tratamento', $tratamento);
    $stmt->bindValue(':observacoes', $observacoes);
    $stmt->bindValue(':id_teste', $id_teste, PDO::PARAM_INT);

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

    $stmt = $banco->prepare("SELECT * FROM teste_mastite WHERE id_teste = :id");

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $teste = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
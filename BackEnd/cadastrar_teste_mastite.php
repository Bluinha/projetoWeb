<?php
session_start(); 
include('conexao.php'); 


if (isset($_POST['id_vaca'], $_POST['data'], $_POST['resultado'], $_POST['quantas_cruzes'])) {
    $id_vaca = $_POST['id_vaca'];
    $data = $_POST['data'];
    $resultado = ($_POST['resultado'] == '1') ? 'positivo' : 'negativo';
    $quantas_cruzes = $_POST['quantas_cruzes'];

    if (isset($_POST['ubere']) && is_array($_POST['ubere'])) {
        $ubere = implode(", ", $_POST['ubere']);
    } else {
        $ubere = "";
    }

    $tratamento = $_POST['tratamento'] ?? "";
    $observacoes = $_POST['observacoes'] ?? "";

    $stmt = $banco->prepare("INSERT INTO teste_mastite (id_vaca, data, resultado, quantas_cruzes, ubere, tratamento, observacoes) VALUES (:id_vaca, :data, :resultado, :quantas_cruzes, :ubere, :tratamento, :observacoes)");

    $stmt->bindValue(':id_vaca', $id_vaca, PDO::PARAM_INT);
    $stmt->bindValue(':data', $data);
    $stmt->bindValue(':resultado', $resultado);
    $stmt->bindValue(':quantas_cruzes', $quantas_cruzes, PDO::PARAM_INT);
    $stmt->bindValue(':ubere', $ubere);
    $stmt->bindValue(':tratamento', $tratamento);
    $stmt->bindValue(':observacoes', $observacoes);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Teste adicionado com Sucesso!";
        header("Location:../FrontEnd/aluno/area_comum_aluno.php?secao=cadastro_teste");
        exit; 
    } else {
        $_SESSION['mensagem'] = "Erro ao adicionar Teste de Mastite! Verifique os detalhes acima."; 
        header("Location:../FrontEnd/aluno/area_comum_aluno.php?secao=cadastro_teste");
        exit;
    }
}
?>

<?php
session_start(); 
include('conexao.php'); 

if (isset($_POST['id_vaca'], $_POST['quantidade'], $_POST['data'])) {
    // Captura os dados do formulário
    $id_vaca = $_POST['id_vaca'];
    $quantidade = $_POST['quantidade'];
    $data = $_POST['data'];

   
    $stmt = $banco->prepare("INSERT INTO producao_leite (id_vaca, quantidade, data) VALUES (:id_vaca, :quantidade, :data)");

    $stmt->bindValue(':id_vaca', $id_vaca, PDO::PARAM_INT);
    $stmt->bindValue(':quantidade', $quantidade); 
    $stmt->bindValue(':data', $data);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Produção de leite adicionada com Sucesso!";
        header("Location:../FrontEnd/aluno/area_comum_aluno.php?secao=cadastro_producao");
        exit; 
    } else {
        $_SESSION['mensagem'] = "Erro ao adicionar Produção de Leite!";
        header("Location:../FrontEnd/aluno/area_comum_aluno.php?secao=cadastro_producao");
        exit; 
    }
}
?>

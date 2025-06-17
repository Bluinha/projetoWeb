<?php
include('conexao.php');

// Se o formulário foi enviado
if (isset($_POST['id_vaca'], $_POST['mensagem'])) {
    $id_vaca = $_POST['id_vaca'];
    $mensagem = $_POST['mensagem'];

    $stmt = $banco->prepare("INSERT INTO alertas (id_vaca, mensagem) VALUES (:id_vaca, :mensagem)");
    $stmt->bindValue(':id_vaca', $id_vaca, PDO::PARAM_INT);
    $stmt->bindValue(':mensagem', $mensagem);

    if ($stmt->execute()) {
        echo "<p>Alerta cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar o alerta.</p>";
        print_r($stmt->errorInfo()); 
    }
}

?>
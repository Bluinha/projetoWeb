<?php
require(__DIR__ . '/conexao_sem_banco.php');

// Agora seu código para criar banco, por exemplo:
$stmt = $banco->prepare("CREATE DATABASE IF NOT EXISTS cql_ifpe");

if ($stmt->execute()) {
    echo "Banco criado com sucesso.";
} else {
    echo "Erro na criação do banco.";
    print_r($stmt->errorInfo());
}
$stmt->closeCursor();
?>
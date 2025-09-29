<?php

$root = "root"; 
$senha_banco = ""; 
$nome_banco = "cql_ifpe1"; 

try {
    $banco = new PDO("mysql:host=localhost;dbname=$nome_banco;charset=utf8", $root, $senha_banco);
    
    $banco->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexão bem-sucedida";

} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage()); 
}
?>


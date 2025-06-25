<?php
try {
    $banco = new PDO("mysql:host=localhost;charset=utf8", "root", "");
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
<?php
try {
    $banco = new PDO("mysql:host=localhost;dbname=cql_ifpe;charset=utf8", "root", "");
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $banco->query("SHOW TABLES");
    $tabelas = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if ($tabelas) {
        echo "Tabelas no banco cql_ifpe:<br>";
        foreach ($tabelas as $tabela) {
            echo "- " . htmlspecialchars($tabela) . "<br>";
        }
    } else {
        echo "Nenhuma tabela encontrada no banco.";
    }

} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
<?php

require("conexao.php");


header('Content-Type: application/json');

$vacasData = [];

try {
    
    $stmt = $banco->query("SELECT id_vaca, nome FROM vacas ORDER BY nome ASC");
    $vacas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    foreach ($vacas as $vaca) {
        
        $vacasData[] = [
            'id_vaca' => $vaca['id_vaca'],
            'nome' => $vaca['nome']
        ];
    }

    
    echo json_encode($vacasData);

} catch (PDOException $e) { 
    error_log("Erro ao buscar IDs e nomes de vacas para datalist: " . $e->getMessage());
    echo json_encode([]);
}
?>
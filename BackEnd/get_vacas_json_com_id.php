<?php
// Caminho para o DAO
require_once __DIR__ . '/dao/vacasDAO.php'; 

header('Content-Type: application/json');

try {

    $vacas = listarVacas();

    $vacasData = array_map(function($vaca) {
        return [
            'id_vaca' => $vaca['id_vaca'],
            'nome'    => $vaca['nome']
        ];
    }, $vacas);

    echo json_encode($vacasData);

} catch (PDOException $e) {
    error_log("Erro ao buscar vacas para JSON: " . $e->getMessage());
    echo json_encode([]);
}
?>
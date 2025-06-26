<?php
session_start();
$uploadDir = __DIR__ . '/uploads/relatorios/'; // caminho absoluto da pasta no servidor

// cria pasta caso não exista
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];
    
    if ($arquivo['error'] === UPLOAD_ERR_OK) {
        $nomeTmp = $arquivo['tmp_name'];
        $nomeArquivo = basename($arquivo['name']);
        
        $destino = $uploadDir . $nomeArquivo;
        
        if (move_uploaded_file($nomeTmp, $destino)) {
            echo "Upload realizado com sucesso!";
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        echo "Erro no upload: " . $arquivo['error'];
    }
} else {
    echo "Nenhum arquivo enviado.";
}
?>
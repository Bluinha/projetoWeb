<?php
session_start();
include __DIR__ . "/criar_alerta.php";
require_once __DIR__ . '/dao/relatorioDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo'])) {
    $uploadDir = __DIR__ . '/../../uploads/';

    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0775, true)) {
            criar_alerta("Erro interno: não foi possível criar a pasta de uploads.", "erro");
            header("Location: ../FrontEnd/aluno/area_comum_aluno.php?secao=relatorios");
            exit();
        }
    }

    $fileName    = basename($_FILES['arquivo']['name']);
    $fileTmpName = $_FILES['arquivo']['tmp_name'];
    $fileSize    = $_FILES['arquivo']['size'];
    $fileError   = $_FILES['arquivo']['error'];
    $fileType    = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedTypes = ['pdf', 'doc', 'docx', 'txt', 'jpg', 'jpeg', 'png'];
    $maxFileSize  = 10 * 1024 * 1024; // 10MB

    // Validações
    if ($fileError !== UPLOAD_ERR_OK) {
        criar_alerta("Erro no upload (código $fileError).", "erro");
    } elseif (!in_array($fileType, $allowedTypes)) {
        criar_alerta("Tipo de arquivo não permitido.", "erro");
    } elseif ($fileSize > $maxFileSize) {
        criar_alerta("Arquivo muito grande (máx. 10MB).", "erro");
    } else {
        // Gera nome único e salva
        $uniqueFileName = uniqid(pathinfo($fileName, PATHINFO_FILENAME) . '_') . '.' . $fileType;
        $uploadFilePath = $uploadDir . $uniqueFileName;

        if (move_uploaded_file($fileTmpName, $uploadFilePath)) {
            if (isset($_SESSION['id_usuario'])) {
                if (inserirRelatorio($_SESSION['id_usuario'], $fileName, $uniqueFileName)) {
                    criar_alerta("Relatório '{$fileName}' enviado e registrado com sucesso!", "sucesso");
                } else {
                    criar_alerta("Arquivo salvo, mas erro ao registrar no banco.", "atencao");
                }
            } else {
                criar_alerta("Arquivo salvo, mas usuário não identificado.", "atencao");
            }
        } else {
            criar_alerta("Erro ao salvar arquivo no servidor.", "erro");
        }
    }
} else {
    criar_alerta("Nenhum arquivo enviado.", "erro");
}

header("Location: ../FrontEnd/aluno/area_comum_aluno.php?secao=relatorios");
exit();

<?php
require '../BackEnd/conexao.php';
require '../BackEnd/PHPMailer-master/src/PHPMailer.php';
require '../BackEnd/PHPMailer-master/src/SMTP.php';
require '../BackEnd/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

$stmt = $banco->query("SELECT * FROM fila_emails WHERE status = 'pendente' LIMIT 5");
$emails = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($emails as $email) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'melovitoria763@gmail.com';
            $mail->Password = 'zphyxqjhpdqyukli'; // senha de app
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('melovitoria763@gmail.com', 'Controle de Qualidade do Leite');
            $mail->addAddress($email['destinatario']);
            $mail->isHTML(true);
            $mail->Subject = $email['assunto'];
            $mail->Body = $email['corpo'];
            $mail->send();

            $upd = $banco->prepare("UPDATE fila_emails SET status = 'enviado', enviado_em = NOW() WHERE id = :id");
            $upd->bindValue(':id', $email['id']);
            $upd->execute();

        } catch (Exception $e) {
            $upd = $banco->prepare("UPDATE fila_emails SET status = 'erro', tentativas = tentativas + 1 WHERE id = :id");
            $upd->bindValue(':id', $email['id']);
            $upd->execute();
        }
}


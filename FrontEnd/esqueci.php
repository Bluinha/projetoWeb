<?php
require '../BackEnd/PHPMailer-master/src/PHPMailer.php';
require '../BackEnd/PHPMailer-master/src/SMTP.php';
require '../BackEnd/PHPMailer-master/src/Exception.php';
require '../BackEnd/conexao.php';
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email'])) {
    $email = $_POST['email'];

    $stmt = $banco->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $token = bin2hex(random_bytes(16));
        $id_usuario = $usuario['id_usuario'];
        $data_expiracao = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $stmt = $banco->prepare("INSERT INTO recuperacao_senha (id_usuario, token, data_expiracao) VALUES (:id_usuario, :token, :data_expiracao)");
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':data_expiracao', $data_expiracao);
        $stmt->execute();

        $link = "http://localhost/projetoWeb/FrontEnd/resetar_senha.php?token=$token";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'melovitoria763@gmail.com';
            $mail->Password = 'zphyxqjhpdqyukli';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->setFrom('melovitoria763@gmail.com', 'Controle de Qualidade do Leite');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Recuperação de senha';
            $mail->Body = "Clique <a href='$link'>aqui</a> para redefinir sua senha.";
            $mail->send();

            $mensagem = "Email enviado com sucesso para $email.";
        } catch (Exception $e) {
            $mensagem = "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
    } else {
        $mensagem = "Email não cadastrado.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensagem = "Informe um email válido.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar Senha</title>
  <link rel="shortcut icon" href="imgs/vacaFavicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="style/variaveis.css">
  <link rel="stylesheet" href="style/login.css">
</head>
<body>
  <main class="pagina">
    <section class="caixa-login">
      <h1>Recuperar Senha</h1>
      <p>Digite o e-mail cadastrado para receber um link de redefinição de senha.</p>

      <?php if (!empty($mensagem)): ?>
        <p style="color: green; font-weight: bold;">
          <?php echo htmlspecialchars($mensagem); ?>
        </p>
      <?php endif; ?>

      <form method="POST" action=""> 
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

        <button type="submit" class="btn">Enviar Link</button>
      </form>

      <nav>
        <a href="login.php">Voltar para login</a>
      </nav>
    </section>
  </main>
</body>
</html>



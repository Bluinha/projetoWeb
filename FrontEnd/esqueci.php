<?php
require '../BackEnd/conexao.php';
include("../BackEnd/criar_alerta.php"); 

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email'])) {
    $email = $_POST['email'];

    // Busca o usuário
    $stmt = $banco->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Gera token e link 
    $token = bin2hex(random_bytes(16));
    $link = "http://localhost/projetoWeb/FrontEnd/resetar_senha.php?token=$token";

    if ($usuario) {
        $id_usuario = $usuario['id_usuario'];
        $data_expiracao = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Insere na tabela de recuperação de senha
        $stmt = $banco->prepare("
            INSERT INTO recuperacao_senha (id_usuario, token, data_expiracao)
            VALUES (:id_usuario, :token, :data_expiracao)
        ");
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':data_expiracao', $data_expiracao);
        $stmt->execute();
    }

    // Insere na fila de emails
    $stmt = $banco->prepare("
        INSERT INTO fila_emails (destinatario, assunto, corpo)
        VALUES (:destinatario, :assunto, :corpo)
    ");
    $stmt->bindValue(':destinatario', $email);
    $stmt->bindValue(':assunto', 'Recuperação de senha');
    $stmt->bindValue(':corpo', "Clique <a href='$link'>aqui</a> para redefinir sua senha.");
    $stmt->execute();

    $mensagem = "Se o e-mail estiver cadastrado, você receberá um link de redefinição em breve.";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensagem = "Informe um email válido.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recuperar Senha</title>
  <link rel="shortcut icon" href="imgs/vacaFavicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="style/login.css" />
</head>
<body>
  <main class="fundo-login">
    <section class="caixa-login">
      <figure class="imagem-vaca">
        <img src="imgs/vacalogin.png" alt="Imagem decorativa de vacas" />
      </figure>
      <h1 class="titulo-recuperacao">Recuperar Senha</h1>
      <p>Digite o e-mail cadastrado para receber um link de redefinição de senha.</p>
      <?php if (!empty($mensagem)): ?>
        <p class="mensagem"><?php echo htmlspecialchars($mensagem); ?></p>
      <?php endif; ?>
      <form method="POST">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required />
        <button type="submit" class="btn">Enviar Link</button>
      </form>
      <nav><a href="login.php">Voltar para login</a></nav>
    </section>
  </main>

   <?php
  // Esta condição garante que o worker só seja "chamado" após o formulário
  // ser enviado com sucesso e a tarefa de e-mail ter sido inserida na fila.
  if (isset($mensagem) && $mensagem === "Se o e-mail estiver cadastrado, você receberá um link de redefinição em breve.") {
      echo "
      <script>
          console.log('Formulário enviado com sucesso. Disparando o worker para processar a fila...');

          // Esta chamada fetch simula a ativação do worker.
          // Em um ambiente real, isso seria feito por um Cron Job no servidor,
          // mas para o nosso projeto, esta abordagem demonstra o desacoplamento.
          fetch('enviar_email.php');
      </script>
      ";
  }
  ?>
</body>
</html>

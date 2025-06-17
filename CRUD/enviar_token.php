<?php
include('conexao.php');

if (!empty($_POST['email'])) {
    $email = $_POST['email'];

    // Verifica se usuário existe
    $stmt = $banco->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Gerar token seguro
        $token = bin2hex(random_bytes(16));
        $id_usuario = $usuario['id_usuario'];
        $data_expiracao = date('Y-m-d H:i:s', strtotime('+1 hour')); // token válido por 1 hora

        // Salvar token no banco
        $stmt = $banco->prepare("INSERT INTO recuperacao_senha (id_usuario, token, data_expiracao) VALUES (:id_usuario, :token, :data_expiracao)");
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':data_expiracao', $data_expiracao);
        $stmt->execute();

        // Enviar email com link (aqui exemplo básico, você pode usar PHPMailer para algo mais robusto)
        $link = "http://seusite.com/resetar_senha.php?token=$token";
        $assunto = "Recuperação de senha";
        $mensagem = "Clique no link para redefinir sua senha: $link";

        // função mail simples (certifique-se de que o servidor suporta)
        mail($email, $assunto, $mensagem);

        echo "Email enviado com instruções para recuperação.";
    } else {
        echo "Email não cadastrado.";
    }
} else {
    echo "Informe um email válido.";
}
?>
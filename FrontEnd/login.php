<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="imgs/vacaFavicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/variaveis.css">
</head>
<body>
    <main class="pagina">
        <section class="caixa-login" aria-label="Formulário de Login">
            <h1>
                <img src="imgs/loginPag.png" alt="Ícone de Login" class="icone-login">
                Login
            </h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <?php include('mensagem.php')?>

            <form action="../BackEnd/logar.php" method="POST">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" placeholder="Digite seu e-mail" required autofocus/>

                <label for="senha">Senha</label>
                <input id="senha" name="senha" type="password" placeholder="Digite sua senha" required />

                <a href="esqueci.php">Esqueci minha senha</a>

                <button type="submit" class="btn">Acessar</button>
            </form>
        </section>
    </main>
</body>
</html>

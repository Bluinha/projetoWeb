<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../imgs/IconeProjeto.png" type="image/x-icon" />
  <title>Página do Professor</title>
  <link rel="stylesheet" href="../style/usuario.css" />
  <link rel="stylesheet" href="../style/professor.css" />
  <link rel="stylesheet" href="../style/variaveis.css" />
</head>

<body>
  <!-- cabeçalho -->
  <div class="faixa-decorada"></div>
  <header id="menu">
    <div class="logo-container">
      <img src="../imgs/iconePagPreto.png" alt="Logo do projeto" class="logo" />
      <div class="texto-logo">
        <h1 class="barlow-regular">CQL</h1>
        <h2 class="barlow-regular">Controle de Qualidade do Leite</h2>
      </div>
    </div>
    <!-- Caixa de perfil expandida -->

    <div class="caixa-perfil">
      <!-- Botão que abre o menu -->
      <button id="btnPerfil" title="<?php echo htmlspecialchars($_SESSION['nome'] ?? 'Usuário'); ?>">
        <img src="../imgs/perfil.png" alt="Perfil de <?php echo htmlspecialchars($_SESSION['nome'] ?? 'usuário'); ?>">
      </button>

      <!-- Caixa de informações personalizada -->
      <section id="menuPerfil" class="info-do-usuario" style="display: none;">
        <p><strong><?php echo htmlspecialchars($_SESSION['nome'] ?? 'Sem nome'); ?></strong></p>
        <p><?php echo htmlspecialchars($_SESSION['email'] ?? 'Sem email'); ?></p>
      </section>

      <!-- Botão de sair -->
      <button title="Sair" onclick="if(confirmarSaida()) location.href='../../FrontEnd/logout.php'">
        <img src="../imgs/sair.png" alt="Botão sair">
      </button>
    </div>
  </header>
  <div class="faixa-decorada"></div>

  <nav aria-label="Seções principais">
    <button class="tablink" onclick="abrirAba(event, 'alertas')">Alertas</button>
    <button class="tablink" onclick="abrirAba(event, 'alunos')">Alunos</button>
    <button class="tablink" onclick="abrirAba(event, 'relatorios')">Relatórios</button>
  </nav>

  <main>
    <section id="alertas" class="aba-conteudo">
      <h2>Alertas</h2>
      <article id="conteudo-alertas">
        <table class="tabela" id="id-alertas">
          <thead>
            <tr>
              <th>Vaca</th>
              <th>Alerta</th>
              <th>Data</th>
            </tr>
          </thead>
          <tbody>
            <?php require('../../BackEnd/listar_alertas.php') ?>
          </tbody>
        </table>
      </article>
    </section>

    <section id="alunos" class="aba-conteudo" style="display:none">
      <h2>Alunos</h2>
      <button class="btn-adicionar" onclick="abrirFormularioCadastro()">
        Cadastrar Novo Aluno
      </button>
      <article id="conteudo-alunos">

        <table class="tabela" id="id-alertas">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php require('../../BackEnd/listar_alunos.php') ?>
          </tbody>
        </table>

      </article>
    </section>

    <section id="relatorios" class="aba-conteudo" style="display:none">
      <h2>Relatórios</h2>
      <article id="conteudo-relatorio">
        <!-- PHP aqui -->
      </article>
    </section>
  </main>

  <script src="script.js"></script>
  <script src="../script_sair.js"></script>
</body>

</html>
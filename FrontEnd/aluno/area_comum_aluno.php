<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="imgs/vacaFavicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="../style/variaveis.css" />
  <link rel="stylesheet" href="../style/usuario.css" />
  <link rel="stylesheet" href="../style/aluno.css" />
  <link rel="shortcut icon" href="../imgs/IconeProjeto.png" type="image/x-icon" />
  <title>Página do Aluno</title>
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

      <div class="caixa-perfil">
        <button><img src="../imgs/perfil.png" alt="perfil aluno botão"></button>
        <button><img src="../imgs/sair.png" alt="logout botão"></button>
      </div>
    </header>
    <div class="faixa-decorada"></div>

    <!-- parte dos comandos -->
    <main class="painel">

      <nav class="menu-lateral">
        <h2>Comandos</h2>
        <ul>
          <li><a href="#" onclick="mostrarSecao('lista')">Lista de vacas</a></li>
          <li><a href="#" onclick="mostrarSecao('cadastro')">Cadastrar vaca</a></li>
          <li><a href="#" onclick="mostrarSecao('editar')">Editar vaca</a></li>
          <li><a href="#" onclick="mostrarSecao('producao')">Produção de leite</a></li>
          <li><a href="#" onclick="mostrarSecao('relatorios')">Relatórios</a></li>
        </ul>
      </nav>

      <!-- seções para serem exibidas dinamicamente -->
      <!--listas das vacas-->
      <section id="lista" class="conteudo" style="display: none;">
        <h3>Lista de vacas</h3>
        <table class="tabela-vacas" id="id-tabela-vacas">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Descarte</th>
            </tr>
          </thead>
          <tbody>
            <?php require("../../BackEnd/listar_vacas.php") ?>
          </tbody>
        </table>
      </section>

      <!--cadastrando vaca-->
      <section id="cadastro" class="conteudo bloco-pagina " style="display: none;">
        <h3>Cadastro de vaca</h3>
        <?php include('../mensagem.php') ?>
        <!--form de inserir a vaca-->
        <form class="form-padrao" method="POST" action="../../BackEnd/inserir_vaca.php">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" placeholder="Digite o nome da vaca">
          <button type="submit" class="btn">Cadastrar</button>
        </form>
      </section>

      <!---editar a vaca-->
      <section id="editar" class="conteudo bloco-pagina" style="display: none;">
        <h3>Editar vaca</h3>

        <!-- Lista de vacas para selecionar -->
        <form class="form-padrao" method="POST" action="../../BackEnd/atualizar_vaca.php"> <!---amarração-->
          <label for="id_vaca">Escolha a vaca:</label>
          <select id="id_vaca" name="id_vaca">
            <!-- ex php, mas não se isso tá muito certo. é só simulando  -->
            <?php
            /*
        include("../../BackEnd/listar_vaca.php");
        while ($vaca = mysqli_fetch_assoc($resultado)) {
          echo "<option value='{$vaca['id']}'>{$vaca['nome']}</option>";
        }
        */
            ?>
            <!-- Temporário -->
            <option value="1">Mimosa</option>
            <option value="2">Estrela</option>
          </select>

          <label for="novo_nome">Novo nome:</label>
          <input type="text" id="novo_nome" name="novo_nome" placeholder="Digite o novo nome">

          <button type="submit" class="btn">Atualizar</button>
        </form>
      </section>

      <!--quantidade de leite-->
      <section id="producao" class="conteudo bloco-pagina " style="display: none;">
        <h3>Produção de leite</h3>

        <form class="form-padrao" method="POST" action="../php/registrar_producao.php"> <!--amarração-->
          <label for="vaca">Vaca:</label>
          <select id="vaca" name="vaca">
            <!-- PHP vai popular aqui -->
            <option value="1">Mimosa</option>
          </select>

          <label for="data">Data:</label>
          <input type="date" id="data" name="data">

          <label for="quantidade">Quantidade (litros):</label>
          <input type="number" id="quantidade" name="quantidade" step="0.1">

          <button type="submit" class="btn">Registrar</button>
        </form>
      </section>

      <!--relatorio-->
      <section id="relatorios" class="conteudo bloco-pagina " style="display: none;">
        <h3>Relatórios</h3>
        <!--Configurar o inserir relatorio-->
        <button onclick="gerarPDF()" class="btn">Inserir Relatório</button>
      </section>

    </main>

    <!-- fiz essa parte de java para ver como ficava, mas qualquer coisa pode mudar etc, esse negocio funciona como o frame. vi que usar frame não era muito semnatico  -->
    <script src="script.js"></script>

</body>

</html>
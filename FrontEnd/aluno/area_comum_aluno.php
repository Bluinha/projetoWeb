<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style/usuario.css" />
  <link rel="stylesheet" href="../style/area_comun.css" />
  <link rel="shortcut icon" href="../img/vaquinhaa.png" type="image/x-icon" />
  <title>Página do Aluno</title>
</head>

<body>

  <!--  perfil -->
  <header class="topo">
    <figure>
      <img src="../img/ifpe-removebg-preview.png" alt="Logo IFPE" class="logo-ifpe">
    </figure>
    <hgroup>
      <h1>PIBIC - Controle de Qualidade<br>
        Físico-Químico do Leite
      </h1>
    </hgroup>
    <img src="../img/login2.png" class="icone-usuario" alt="Login" />
  </header>

  </section>

  <!-- a parte dos comandos -->
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
    <section id="lista" class="conteudo card-form" style="display: none;">
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
          <?php require("../../BackEnd/listar_vacas.php")?>
        </tbody>
      </table>
    </section>

    <!--cadastrando vaca-->
    <section id="cadastro" class="conteudo card-form" style="display: none;">
      <h3>Cadastro de vaca</h3>
      <?php include('../mensagem.php')?>
      <!--form de inserir a vaca-->
      <form method="POST" action="../../BackEnd/inserir_vaca.php">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome da vaca">
        <button type="submit" class="btn">Cadastrar</button>
      </form>
    </section>

    <!---editar a vaca-->
    <section id="editar" class="conteudo card-form" style="display: none;">
      <h3>Editar vaca</h3>

      <!-- Lista de vacas para selecionar -->
      <form method="POST" action="../../BackEnd/atualizar_vaca.php"> <!---amarração-->
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
    <section id="producao" class="conteudo card-form" style="display: none;">
      <h3>Produção de leite</h3>

      <form method="POST" action="../php/registrar_producao.php"> <!--amarração-->
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
    <section id="relatorios" class="conteudo card-form" style="display: none;">
      <h3>Relatórios</h3>
      <!--Configurar o inserir relatorio-->
      <button onclick="gerarPDF()" class="btn">Inserir Relatório</button> 
    </section>

  </main>

  <!-- fiz essa parte de java para ver como ficava, mas qualquer coisa pode mudar etc, esse negocio funciona como o frame. vi que usar frame não era muito semnatico  -->
  <script src="script.js"></script>

</body>

</html>
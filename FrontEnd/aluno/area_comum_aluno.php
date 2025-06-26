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
  <style>
    /* Garante que todas as seções estejam escondidas por padrão */
    .conteudo {
      display: none;
    }
    /* Mostra apenas a lista inicialmente */
    #lista {
      display: block;
    }
  </style>
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
          <li><a href="#" onclick="mostrarSecao('lista')">Vacas</a></li>
          <li><a href="#" onclick="mostrarSecao('producao')">Produção de leite</a></li>
          <li><a href="#" onclick="mostrarSecao('teste_mastite')">Teste de Mastite</a></li>
          <li><a href="#" onclick="mostrarSecao('relatorios')">Relatórios</a></li>
        </ul>
      </nav>

      <?php if (isset($_SESSION['mensagem'])): ?>
        <p class="mensagem" role="alert" id="mensagem-global"><?= $_SESSION['mensagem']; ?></p>
      <?php unset($_SESSION['mensagem']); endif; ?>

      <!-- seções para serem exibidas dinamicamente -->
      <!--listas das vacas-->
      <section id="lista" class="conteudo">
        <h3>Lista de vacas</h3>
        <input type="text" id="buscaVaca" placeholder="Buscar por nome..." onkeyup="filtrarVacas()" class="input-busca">
        <button onclick="mostrarSecao('cadastro')" class="btn">Cadastrar Nova Vaca</button>
        <table class="tabela" id="id-tabela-vacas">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Descarte</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php require("../../BackEnd/listar_vacas.php") ?>
          </tbody>
        </table>
      </section>

      <!--cadastrando vaca-->
      <section id="cadastro" class="conteudo bloco-pagina">
        <h3>Cadastro de vaca</h3>
        <?php include('../mensagem.php') ?>
        <!--form de inserir a vaca-->
        <form class="form-padrao" method="POST" action="../../BackEnd/inserir_vaca.php">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" placeholder="Digite o nome da vaca">
          <button type="submit" class="btn">Cadastrar</button>
        </form>
      </section>

      <!--listas das Produção de leite-->
      <section id="producao" class="conteudo">
        <h3>Lista de Produção de leite</h3>
        <input type="text" id="buscaProducao" placeholder="Buscar por nome..." onkeyup="filtrarProducao()" class="input-busca">
        <button onclick="mostrarSecao('cadastro_producao')" class="btn">Cadastrar Produção de Leite</button>
        <table class="tabela" id="id-tabela-producao">
          <thead>
            <tr>
              <th>ID</th>
              <th>ID Vaca</th>
              <th>Quantidade</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php require("../../BackEnd/listar_producao_leite.php") ?>
          </tbody>
        </table>
      </section>

      <!--cadastro de quantidade de leite-->
      <section id="cadastro_producao" class="conteudo bloco-pagina">
        <h3>Produção de leite</h3>
        <?php include('../mensagem.php') ?>
         <!--form de inserir produção de leite-->
        <form class="form-padrao" method="POST" action="../../BackEnd/cadastrar_producao_leite.php">
          <label for="vaca_producao">Vaca:</label>
          <select id="vaca_producao" name="id_vaca">
            <option value="1">Alicate</option>
            <option value="2">Chuvisco</option>
            <option value="3">Chichita</option>
            <option value="4">Muriçoca</option>
          </select>
          <label for="data">Data:</label>
          <input type="date" id="data" name="data">
          <label for="quantidade">Quantidade (litros):</label>
          <input type="number" id="quantidade" name="quantidade" step="0.1">
          <button type="submit" class="btn">Cadastrar</button>
        </form>
      </section>


      <!--listas dos testes de mastite-->
      <section id="teste_mastite" class="conteudo">
        <h3>Lista de Teste de Mastite</h3>
        <input type="text" id="buscaTeste" placeholder="Buscar por nome..." onkeyup="filtrarTeste()" class="input-busca">
        <button onclick="mostrarSecao('cadastro_teste')" class="btn">Cadastrar Teste de Mastite</button>
        <table class="tabela" id="id-tabela-teste">
          <thead>
            <tr>
              <th>ID</th>
              <th>ID Vaca</th>
              <th>Data</th>
              <th>Resultado</th>
              <th>Cruzes</th>
              <th>Úbere</th>
              <th>Tratamento</th>
              <th>Observações</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php require("../../BackEnd/listar_teste_mastite.php") ?>
          </tbody>
        </table>
      </section>

       <!--cadastro dos testes de mastite-->
      <section id="cadastro_teste" class="conteudo bloco-pagina">
        <h3>Cadastro de Teste de Mastite</h3>
        <?php include('../mensagem.php') ?>
        <form class="form-padrao" method="POST" action="../../BackEnd/cadastrar_teste_mastite.php">
            <label for="vaca_teste">Vaca:</label>
            <select id="vaca_teste" name="id_vaca" required>
                <option value="1">Alicate</option>
                <option value="2">Chuvisco</option>
                <option value="3">Chichita</option>
                <option value="4">Muriçoca</option>
            </select>

            <label for="data">Data do Teste:</label>
            <input type="date" id="data" name="data" required>

            <label for="resultado">Resultado:</label>
            <select id="resultado" name="resultado" required>
                <option value="1">Positivo</option>
                <option value="0">Negativo</option>
            </select>

            <label for="cruzes">Quantidade de Cruzes:</label>
            <input type="number" id="cruzes" name="quantas_cruzes" min="0" max="4" required>

            <fieldset class="grupo-uberes">
              <legend>Úbere Afetado:</legend>
              <label class="opcao-ubre">
                <input type="checkbox" name="ubere[]" value="D.E">
                <span>Dianteiro Esquerdo</span>
              </label>
              <label class="opcao-ubre">
                <input type="checkbox" name="ubere[]" value="D.D">
                <span>Dianteiro Direito</span>
              </label>
              <label class="opcao-ubre">
                <input type="checkbox" name="ubere[]" value="T.E">
                <span>Traseiro Esquerdo</span>
              </label>
              <label class="opcao-ubre">
                <input type="checkbox" name="ubere[]" value="T.D">
                <span>Traseiro Direito</span>
              </label>
            </fieldset>

            <label for="tratamento">Tratamento:</label>
            <textarea id="tratamento" name="tratamento" rows="3"></textarea>

            <label for="observacoes">Observações:</label>
            <textarea id="observacoes" name="observacoes" rows="3"></textarea>
            <button type="submit" class="btn">Cadastrar</button>
        </form>
     </section>

      <!--relatorio-->
     <section id="relatorios" class="conteudo bloco-pagina">
      <h3>Relatórios</h3>
      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="arquivo" required>
        <button type="submit" class="btn">Enviar Relatório</button>
      </form>
    </section>


    </main>

    <script>
    // Função para mostrar seções
    function mostrarSecao(secao) {
        // Esconder todas as seções
        document.querySelectorAll('.conteudo').forEach(function(sec) {
            sec.style.display = 'none';
        });
        
        // Mostrar apenas a seção desejada
        document.getElementById(secao).style.display = 'block';
    }

    function filtrarVacas() {
        const input = document.getElementById('buscaVaca');
        const filtro = input.value.toUpperCase();
        const tabela = document.getElementById('id-tabela-vacas');
        const linhas = tabela.getElementsByTagName('tr');
        
        for (let i = 1; i < linhas.length; i++) {
            const colunaNome = linhas[i].getElementsByTagName('td')[1];
            
            if (colunaNome) {
                const textoNome = colunaNome.textContent || colunaNome.innerText;
                
                if (textoNome.toUpperCase().indexOf(filtro) > -1) {
                    linhas[i].style.display = '';
                } else {
                    linhas[i].style.display = 'none';
                }
            }
        }
    }

    function editarVaca(button) {
      const row = button.closest('tr');
      const id = row.getAttribute('data-id');
      const nomeCell = row.querySelector('.nome-vaca');
      const nomeAtual = nomeCell.textContent;
      
      const input = document.createElement('input');
      input.type = 'text';
      input.value = nomeAtual;
      input.className = 'input-edicao';
      
      nomeCell.textContent = '';
      nomeCell.appendChild(input);
      input.focus();
      
      button.textContent = 'Salvar';
      button.classList.remove('btn-editar');
      button.classList.add('btn-salvar');
      button.onclick = function() {
          salvarEdicaoVaca(id, input.value, nomeCell, button);
      };
    }

    function salvarEdicaoVaca(id, novoNome, nomeCell, button) {
        fetch('../../BackEnd/atualizar_vaca.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id_vaca=${id}&novo_nome=${encodeURIComponent(novoNome)}`
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                nomeCell.textContent = novoNome;
                button.textContent = 'Editar';
                button.classList.remove('btn-salvar');
                button.classList.add('btn-editar');
                button.onclick = function() { editarVaca(button); };
            } else {
                alert('Erro ao atualizar: ' + data.message);
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Erro ao atualizar a vaca');
            location.reload();
        });
    }

    function excluirVaca(id, button) {
        if(confirm('Tem certeza que deseja excluir esta vaca?')) {
            const row = button.closest('tr');
            
            fetch('../../BackEnd/deletar_vaca.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id_vaca=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    row.remove();
                    const mensagem = document.createElement('div');
                    mensagem.className = 'mensagem-sucesso';
                    mensagem.textContent = 'Vaca excluída com sucesso!';
                    document.body.appendChild(mensagem);
                    setTimeout(() => mensagem.remove(), 3000);
                } else {
                    alert('Erro ao excluir: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Erro ao excluir a vaca');
            });
        }
    }

    function filtrarProducao() {
    const input = document.getElementById('buscaProducao');
    const filtro = input.value.toUpperCase();
    const tabela = document.getElementById('id-tabela-producao');
    const linhas = tabela.getElementsByTagName('tr');

      for (let i = 1; i < linhas.length; i++) {
          const colunaNome = linhas[i].getElementsByTagName('td')[1];

          if (colunaNome) {
              const texto = colunaNome.textContent || colunaNome.innerText;

              if (texto.toUpperCase().indexOf(filtro) > -1) {
                  linhas[i].style.display = '';
              } else {
                  linhas[i].style.display = 'none';
              }
          }
      }
    }

    function editarProducao(button) {
    const row = button.closest('tr');
    const id = row.getAttribute('data-id');
    // CORREÇÃO: Usar a classe correta para a célula de quantidade
    const quantidadeCell = row.querySelector('.quantidade-producao'); 
    const dataCell = row.querySelector('.data-producao');

    const qtdAtual = quantidadeCell.textContent;
    const dataAtual = dataCell.textContent;

    quantidadeCell.innerHTML = `<input type="number" class="input-edicao" value="${qtdAtual}" step="0.1">`;
    dataCell.innerHTML = `<input type="date" class="input-edicao" value="${dataAtual}">`;

      button.textContent = 'Salvar';
      button.classList.remove('btn-editar');
      button.classList.add('btn-salvar');
      button.onclick = function () {
          const novaQtd = quantidadeCell.querySelector('input').value;
          const novaData = dataCell.querySelector('input').value;
          salvarEdicaoProducao(id, novaQtd, novaData, row, button);
      };
    }

    function salvarEdicaoProducao(id, novaQtd, novaData, row, button) {
      const idVaca = row.getAttribute('data-id-vaca'); // pegar id da vaca da linha
      
      fetch('../../BackEnd/atualizar_producao_leite.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: `id_producao=${id}&id_vaca=${idVaca}&quantidade=${encodeURIComponent(novaQtd)}&data=${encodeURIComponent(novaData)}`
      })
      .then(res => res.json())
      .then(data => {
          if (data.success) {
              row.querySelector('.quantidade-producao').textContent = novaQtd + ' L';
              row.querySelector('.data-producao').textContent = novaData;
              button.textContent = 'Editar';
              button.classList.remove('btn-salvar');
              button.classList.add('btn-editar');
              button.onclick = function () { editarProducao(button); };
          } else {
              alert('Erro ao atualizar: ' + data.message);
          }
      })
      .catch(error => {
          alert('Erro na requisição: ' + error);
      });
    }


    function excluirProducao(id, button) {
    if (confirm('Tem certeza que deseja excluir essa produção?')) {
        const row = button.closest('tr');
        fetch('../../BackEnd/excluir_producao_leite.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id_producao=${id}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                row.remove();
            } else {
                alert('Erro ao excluir: ' + data.message);
            }
        });
      }
    }

    function filtrarTeste() {
    const input = document.getElementById('buscaTeste');
    const filtro = input.value.toUpperCase();
    const tabela = document.getElementById('id-tabela-teste');
    const linhas = tabela.getElementsByTagName('tr');

    for (let i = 1; i < linhas.length; i++) {
        const colunaNome = linhas[i].getElementsByTagName('td')[1];

        if (colunaNome) {
            const texto = colunaNome.textContent || colunaNome.innerText;

            if (texto.toUpperCase().indexOf(filtro) > -1) {
                linhas[i].style.display = '';
            } else {
                linhas[i].style.display = 'none';
            }
        }
      }
    }

    function editarTeste(button) {
    const row = button.closest('tr');
    const id = row.getAttribute('data-id');
    const resultadoCell = row.querySelector('.resultado-teste');
    const cruzesCell = row.querySelector('.cruzes-teste');
    const tratamentoCell = row.querySelector('.tratamento-teste');

    const resultadoAtual = resultadoCell.textContent.trim() === 'Positivo' ? 1 : 0;
    const cruzesAtual = cruzesCell.textContent.trim();
    const tratamentoAtual = tratamentoCell.textContent.trim();

    resultadoCell.innerHTML = `
        <select class="input-edicao">
            <option value="1" ${resultadoAtual == 1 ? 'selected' : ''}>Positivo</option>
            <option value="0" ${resultadoAtual == 0 ? 'selected' : ''}>Negativo</option>
        </select>`;
    cruzesCell.innerHTML = `<input type="number" class="input-edicao" value="${cruzesAtual}" min="0" max="4">`;
    tratamentoCell.innerHTML = `<input type="text" class="input-edicao" value="${tratamentoAtual}">`;

      button.textContent = 'Salvar';
      button.classList.remove('btn-editar');
      button.classList.add('btn-salvar');
      button.onclick = function () {
          const novoResultado = resultadoCell.querySelector('select').value;
          const novasCruzes = cruzesCell.querySelector('input').value;
          const novoTratamento = tratamentoCell.querySelector('input').value;
          salvarEdicaoTeste(id, novoResultado, novasCruzes, novoTratamento, row, button);
      };
    }

    function salvarEdicaoTeste(id, resultado, cruzes, tratamento, row, button) {
      fetch('../../BackEnd/atualizar_teste_mastite.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id_teste=${id}&resultado=${resultado}&quantas_cruzes=${cruzes}&tratamento=${encodeURIComponent(tratamento)}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                row.querySelector('.resultado-teste').textContent = resultado == 1 ? 'Positivo' : 'Negativo';
                row.querySelector('.cruzes-teste').textContent = cruzes;
                row.querySelector('.tratamento-teste').textContent = tratamento;
                button.textContent = 'Editar';
                button.classList.remove('btn-salvar');
                button.classList.add('btn-editar');
                button.onclick = function () { editarTeste(button); };
            } else {
                alert('Erro ao atualizar: ' + data.message);
            }
        });
    }

    function excluirTeste(id, button) {
      if (confirm('Tem certeza que deseja excluir este teste?')) {
        const row = button.closest('tr');
        fetch('../../BackEnd/excluir_teste_mastite.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id_teste=${id}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                row.remove();
            } else {
                alert('Erro ao excluir: ' + data.message);
            }
        });
      }
    }

    function mostrarSecao(secao) {
      // Esconde todas as seções
      document.querySelectorAll('.conteudo').forEach(function(sec) {
          sec.style.display = 'none';
      });

      // Mostra a seção desejada
      const secaoAlvo = document.getElementById(secao);
      secaoAlvo.style.display = 'block';

      // Se houver uma mensagem global, move ela para o topo da seção ativa
      const mensagem = document.getElementById('mensagem-global');
      if (mensagem && secaoAlvo) {
          secaoAlvo.prepend(mensagem);
      }

      // Remove a mensagem se ainda existir após 4 segundos
      if (mensagem) {
          setTimeout(() => {
              mensagem.remove();
          }, 5000);
      }
    }

    // Garante que a seção correta está visível mesmo se houver atraso no carregamento
    window.onload = function() {
    const params = new URLSearchParams(window.location.search);
    const secao = params.get('secao');
      if (secao) {
          mostrarSecao(secao);
      } else {
          mostrarSecao('lista');
      }

    };
    </script>
</body>
</html>
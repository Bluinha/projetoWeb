<?php
session_start();
include("../../BackEnd/gerar_alertas.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="imgs/vacaFavicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="../style/usuarios.css" />
  <link rel="shortcut icon" href="../imgs/IconeProjeto.png" type="image/x-icon" />
  <title>Página do Aluno</title>
</head>

<body>
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
      <button id="btnPerfil" title="<?php echo htmlspecialchars($_SESSION['nome'] ?? 'Usuário'); ?>">
        <img src="../imgs/perfil.png" alt="Perfil de <?php echo htmlspecialchars($_SESSION['nome'] ?? 'usuário'); ?>">
      </button>

      <section id="menuPerfil" class="info-do-usuario" style="display: none;">
        <p><strong><?php echo htmlspecialchars($_SESSION['nome'] ?? 'Sem nome'); ?></strong></p>
        <p><?php echo htmlspecialchars($_SESSION['email'] ?? 'Sem email'); ?></p>
      </section>

      <button title="Sair" onclick="if(confirmarSaida()) location.href='../../FrontEnd/logout.php'">
        <img src="../imgs/sair.png" alt="Botão sair">
      </button>
    </div>
  </header>
  <div class="faixa-decorada"></div>


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

    <section id="lista" class="conteudo">
      <?php if (isset($_SESSION['mensagem'])): ?>
        <p class="mensagem" role="alert" id="mensagem-global"><?= $_SESSION['mensagem']; ?></p>
      <?php unset($_SESSION['mensagem']);
      endif; ?>
      <h3>Lista de vacas</h3>
      <input type="text" id="buscaVaca" list="vacasNomesDatalist" placeholder="Buscar por nome..." oninput="filtrarVacasTabela()" class="input-busca">
      <datalist id="vacasNomesDatalist"></datalist>
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

    <section id="cadastro" class="conteudo bloco-pagina">
      <h3>Cadastro de vaca</h3>
      <?php include('../mensagem.php') ?>
      <form class="form-padrao" method="POST" action="../../BackEnd/inserir_vaca.php">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome da vaca">
        <button type="submit" class="btn">Cadastrar</button>
      </form>
    </section>

    <section id="producao" class="conteudo">
      <h3>Lista de Produção de leite</h3>
      <input type="text" id="buscaProducao" list="vacasNomesDatalist" placeholder="Buscar por nome..." onkeyup="filtrarProducao()" class="input-busca">
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

    <section id="cadastro_producao" class="conteudo bloco-pagina">
      <h3>Produção de leite</h3>
      <?php include('../mensagem.php') ?>
      <form class="form-padrao" method="POST" action="../../BackEnd/cadastrar_producao_leite.php">
        <label for="vaca_producao_nome">Vaca:</label>
        <input type="text" id="vaca_producao_nome" name="vaca_producao_nome" list="vacasNomesDatalist" placeholder="Digite ou selecione a vaca" required>
        <input type="hidden" id="id_vaca_producao_hidden" name="id_vaca">

        <label for="data_producao">Data:</label>
        <input type="date" id="data_producao" name="data" required>
        <label for="quantidade_producao">Quantidade (litros):</label>
        <input type="number" id="quantidade_producao" name="quantidade" step="0.1" required>
        <button type="submit" class="btn">Cadastrar</button>
      </form>
    </section>


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

    <section id="cadastro_teste" class="conteudo bloco-pagina">
      <h3>Cadastro de Teste de Mastite</h3>
      <?php include('../mensagem.php') ?>
      <form class="form-padrao" method="POST" action="../../BackEnd/cadastrar_teste_mastite.php">
        <label for="vaca_teste_nome">Vaca:</label>
        <input type="text" id="vaca_teste_nome" name="vaca_teste_nome" list="vacasNomesDatalist" placeholder="Digite ou selecione a vaca" required>
        <input type="hidden" id="id_vaca_teste_hidden" name="id_vaca">

        <label for="data_teste">Data do Teste:</label>
        <input type="date" id="data_teste" name="data" required>

        <label for="resultado">Resultado:</label>
        <select id="resultado" name="resultado" required>
          <option value="1">Positivo</option>
          <option value="0">Negativo</option>
        </select>

        <label for="cruzes">Quantidade de Cruzes:</label>
        <input type="number" id="cruzes" name="quantas_cruzes" min="0" max="4" required>

        <fieldset class="uberes-teste">
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

    <section id="relatorios" class="conteudo bloco-pagina">
    <h3>Envio de Relatórios</h3>
    <form action="../../BackEnd/upload_relatorio.php" method="POST" enctype="multipart/form-data">
        <label for="arquivo_relatorio">Selecione o arquivo do relatório:</label>
        <input type="file" name="arquivo" id="arquivo_relatorio" required>
        <button type="submit" class="btn">Enviar Relatório</button>
    </form>
    </section>


  </main>
  <script src="../script_sair.js"></script>
  <script src="script.js"></script>
  <script>
    // Objeto global para armazenar o mapeamento de nome para ID
    let vacaNomesParaIds = {};

    // Função para mostrar seções
    function mostrarSecao(secao) {
      // Esconder todas as seções
      document.querySelectorAll('.conteudo').forEach(function(sec) {
        sec.style.display = 'none';
      });

      // Mostrar apenas a seção desejada
      document.getElementById(secao).style.display = 'block';
    }

    // NOVA FUNÇÃO: Carregar os nomes e IDs das vacas para o datalist e mapeamento
    function carregarNomesVacasDatalist() {
        const vacasNomesDatalist = document.getElementById('vacasNomesDatalist');
        vacasNomesDatalist.innerHTML = ''; // Limpa as opções existentes
        vacaNomesParaIds = {}; // Limpa o mapeamento existente

        // Alterar o endpoint para buscar ID e Nome
        fetch('../../BackEnd/get_vacas_json_com_id.php') // Novo endpoint PHP que retorna ID e Nome
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao carregar os nomes das vacas: ' + response.statusText);
                }
                return response.json();
            })
            .then(vacas => {
                vacas.forEach(vaca => {
                    const option = document.createElement('option');
                    option.value = vaca.nome;
                    vacasNomesDatalist.appendChild(option);
                    vacaNomesParaIds[vaca.nome] = vaca.id_vaca; // Armazena o mapeamento
                });
            })
            .catch(error => {
                console.error('Erro na requisição para carregar datalist:', error);
            });
    }

    // Funções para lidar com os inputs de datalist nos formulários de cadastro
    function setupDatalistInput(inputElementId, hiddenInputElementId) {
        const inputElement = document.getElementById(inputElementId);
        const hiddenInputElement = document.getElementById(hiddenInputElementId);

        if (inputElement && hiddenInputElement) {
            inputElement.addEventListener('input', function() {
                const selectedName = this.value;
                if (vacaNomesParaIds[selectedName]) {
                    hiddenInputElement.value = vacaNomesParaIds[selectedName];
                } else {
                    hiddenInputElement.value = ''; // Limpa se o nome não for válido
                }
            });

            // Limpar o input e hidden ao exibir a seção de cadastro
            // Isso pode ser ajustado dependendo de como você quer que os formulários se comportem ao serem mostrados
            inputElement.value = '';
            hiddenInputElement.value = '';
        }
    }


    // Função para filtrar a tabela de vacas
    function filtrarVacasTabela() {
      const input = document.getElementById('buscaVaca');
      const filtro = input.value.toUpperCase();
      const tabela = document.getElementById('id-tabela-vacas');
      const linhas = tabela.getElementsByTagName('tr');

      for (let i = 1; i < linhas.length; i++) { // Começa do 1 para pular o cabeçalho
        const colunaNome = linhas[i].getElementsByTagName('td')[1]; // Coluna do nome

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
          if (data.success) {
            nomeCell.textContent = novoNome;
            button.textContent = 'Editar';
            button.classList.remove('btn-salvar');
            button.classList.add('btn-editar');
            button.onclick = function() {
              editarVaca(button);
            };
            carregarNomesVacasDatalist(); // CHAMADA ADICIONADA AQUI
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
      if (confirm('Tem certeza que deseja excluir esta vaca?')) {
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
            if (data.success) {
              row.remove();
              const mensagem = document.createElement('div');
              mensagem.className = 'mensagem-sucesso';
              mensagem.textContent = 'Vaca excluída com sucesso!';
              document.body.appendChild(mensagem);
              setTimeout(() => mensagem.remove(), 3000);
              carregarNomesVacasDatalist(); // CHAMADA ADICIONADA AQUI
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
        const colunaNome = linhas[i].getElementsByTagName('td')[1]; // Coluna do nome da vaca

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
      button.onclick = function() {
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
            button.onclick = function() {
              editarProducao(button);
            };
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
            console.log(data);
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
        const colunaNome = linhas[i].getElementsByTagName('td')[1]; // Coluna do nome da vaca

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
      const ubersCell = row.querySelector('.uberes-teste');
      const tratamentoCell = row.querySelector('.tratamento-teste');
      const observacoesCell = row.querySelector('.observacoes-teste');

      const resultadoAtual = resultadoCell.textContent.trim() === 'Positivo' ? 1 : 0;
      const cruzesAtual = cruzesCell.textContent.trim();
      const tratamentoAtual = tratamentoCell.textContent.trim();
      const observacoesAtual = observacoesCell.textContent.trim();
      const ubersAtuais = ubersCell.textContent.split(',').map(u => u.trim());

      resultadoCell.innerHTML = `
        <select class="input-edicao">
            <option value="1" ${resultadoAtual == 1 ? 'selected' : ''}>Positivo</option>
            <option value="0" ${resultadoAtual == 0 ? 'selected' : ''}>Negativo</option>
        </select>`;

      cruzesCell.innerHTML = `<input type="number" class="input-edicao" value="${cruzesAtual}" min="0" max="4">`;

      // UBERES CHECKBOXES
      const todasUbers = ['D.E', 'D.D', 'T.E', 'T.D'];
      ubersCell.innerHTML = todasUbers.map(ubere => {
        const checked = ubersAtuais.includes(ubere) ? 'checked' : '';
        return `
          <label style="margin-right: 8px;">
            <input type="checkbox" value="${ubere}" class="checkbox-ubere" ${checked}>
            ${ubere}
          </label>`;
      }).join('');

      tratamentoCell.innerHTML = `<input type="text" class="input-edicao" value="${tratamentoAtual}">`;
      observacoesCell.innerHTML = `<textarea class="input-edicao" rows="3">${observacoesAtual}</textarea>`;

      button.textContent = 'Salvar';
      button.classList.remove('btn-editar');
      button.classList.add('btn-salvar');
      button.onclick = function () {
        const novoResultado = resultadoCell.querySelector('select').value;
        const novasCruzes = cruzesCell.querySelector('input').value;
        const novoTratamento = tratamentoCell.querySelector('input').value;
        const novasObservacoes = observacoesCell.querySelector('textarea').value;

        const checkboxes = ubersCell.querySelectorAll('.checkbox-ubere');
        const novasUbers = Array.from(checkboxes)
          .filter(c => c.checked)
          .map(c => c.value)

        salvarEdicaoTeste(id, novoResultado, novasCruzes, novasUbers, novoTratamento, novasObservacoes, row, button);
      };
    }

    function salvarEdicaoTeste(id, resultado, cruzes, ubersArrayParam, tratamento, observacoes, row, button) {
      const ubereFormatado = ubersArrayParam.join(', ');
      fetch('../../BackEnd/atualizar_teste_mastite.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        // Monta o body da requisição com todos os parâmetros que o PHP espera
        body: `id_teste=${id}&resultado=${resultado}&quantas_cruzes=${cruzes}&tratamento=${encodeURIComponent(tratamento)}&observacoes=${encodeURIComponent(observacoes)}&ubere=${encodeURIComponent(ubereFormatado)}`
      })
        .then(res => res.json())
        .then(data => {
        console.log(data); // Sempre bom para depurar a resposta do backend
        if (data.success) {
          // Atualiza as células da tabela com os novos valores
          row.querySelector('.resultado-teste').textContent = resultado == 1 ? 'Positivo' : 'Negativo';
          row.querySelector('.cruzes-teste').textContent = cruzes;
          row.querySelector('.tratamento-teste').textContent = tratamento;
          row.querySelector('.observacoes-teste').textContent = observacoes;
          row.querySelector('.uberes-teste').textContent = ubereFormatado; // Atualiza o texto dos úberes na tabela

          // Volta o botão para o estado "Editar"
          button.textContent = 'Editar';
          button.classList.remove('btn-salvar');
          button.classList.add('btn-editar');
          button.onclick = function () {
            editarTeste(button);
          };
        } else {
          alert('Erro ao atualizar: ' + data.message);
        }
      })
      .catch(error => {
        console.error('Erro na requisição:', error);
        alert('Erro na requisição: ' + error);
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

      // Se for a seção de cadastro de produção ou teste, configure o datalist
      if (secao === 'cadastro_producao') {
        setupDatalistInput('vaca_producao_nome', 'id_vaca_producao_hidden');
      } else if (secao === 'cadastro_teste') {
        setupDatalistInput('vaca_teste_nome', 'id_vaca_teste_hidden');
      }

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

    // Garante que a seção correta está visível e carrega o datalist
    window.onload = function() {
      const params = new URLSearchParams(window.location.search);
      const secao = params.get('secao');
      if (secao) {
        mostrarSecao(secao);
      } else {
        mostrarSecao('lista'); // Default para a lista de vacas
      }
      carregarNomesVacasDatalist(); // CHAMADA ADICIONADA AQUI PARA GARANTIR O CARREGAMENTO INICIAL
    };
  </script>
</body>

</html>
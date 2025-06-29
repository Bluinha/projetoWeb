// --- script_professor.js ---
// Este é o arquivo JavaScript principal da área do professor.

// 1.1 Controle do menu de perfil (dropdown)
const botaoPerfilProf = document.getElementById('btnPerfil');
const menuPerfilProf = document.getElementById('menuPerfil');

if (botaoPerfilProf && menuPerfilProf) {
    botaoPerfilProf.addEventListener('click', function (e) {
        e.stopPropagation();
        menuPerfilProf.style.display = (menuPerfilProf.style.display === 'block') ? 'none' : 'block';
    });

    document.addEventListener('click', function (e) {
        if (!menuPerfilProf.contains(e.target) && e.target !== botaoPerfilProf) {
            menuPerfilProf.style.display = 'none';
        }
    });
}

// 1.2 Função de confirmação de saída (reutilizada da área do aluno)
function confirmarSaida() {
    return confirm("Deseja realmente sair?");
}

// 2.1 Função para abrir abas de navegação
// Esta é a função que será chamada pelos botões de navegação no professor.
function abrirAba(evt, nomeAba) {
    const secoes = document.querySelectorAll("main .aba-conteudo"); // Seleciona as seções de conteúdo
    const botoes = document.querySelectorAll("nav .tablink"); // Seleciona os botões das abas

    // Oculta todas as seções
    secoes.forEach(secao => secao.style.display = "none");
    // Remove a classe 'ativo' de todos os botões
    botoes.forEach(botao => botao.classList.remove("ativo"));

    // Exibe a seção desejada
    const abaParaAbrir = document.getElementById(nomeAba);
    if (abaParaAbrir) {
        abaParaAbrir.style.display = "block";
    } else {
        console.error(`Erro: seção com id '${nomeAba}' não encontrada.`);
    }

    // Adiciona a classe 'ativo' ao botão que foi clicado (se houver um evento)
    if (evt && evt.currentTarget) {
        evt.currentTarget.classList.add("ativo");
    }
}

// Funções específicas da área do professor (ex: abrirFormularioCadastro)
function abrirFormularioCadastro() {
    alert('Formulário de cadastro de aluno será aberto aqui!');
    // Você pode adicionar a lógica para exibir um formulário de cadastro real aqui,
    // talvez chamando abrirAba('id_da_secao_cadastro_aluno');
}


// Inicialização ao carregar a página
document.addEventListener('DOMContentLoaded', function() {
    // 1. Define a aba 'alertas' como padrão ao carregar a página
    const defaultTabButton = document.querySelector('.tablink[data-secao="alertas"]');
    if (defaultTabButton) {
        // Simula um clique no botão padrão para ativar a aba e o botão
        // Isso é melhor do que chamar abrirAba(null, ...) e depois adicionar 'ativo'
        defaultTabButton.click(); // Dispara o evento de clique, que já tem o listener configurado
    } else {
        // Fallback: se o botão padrão não for encontrado, tenta mostrar a seção diretamente
        const alertasSection = document.getElementById('alertas');
        if (alertasSection) {
            alertasSection.style.display = 'block';
        }
    }

    // 2. Adiciona event listeners para os botões de navegação das abas
    document.querySelectorAll('nav .tablink').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Impede o comportamento padrão do botão
            const secaoId = this.getAttribute('data-secao');
            if (secaoId) {
                abrirAba(event, secaoId);
            }
        });
    });

    // 3. Adiciona event listener para o botão de sair
    const btnSairProf = document.querySelector('button[title="Sair"]');
    if (btnSairProf) {
        btnSairProf.addEventListener('click', function() {
            if (confirmarSaida()) {
                // CORREÇÃO CRÍTICA: Caminho para o logout deve ser relativo à área do professor
                // Se script_professor.js está em FrontEnd/js/ e logout.php em FrontEnd/
                // O caminho de FrontEnd/professor/ para FrontEnd/logout.php é ../logout.php
                window.location.href = '../logout.php'; // Caminho corrigido para o logout
            }
        });
    }

    // 4. Adiciona event listener para o botão "Cadastrar Novo Aluno"
    const btnCadastrarAluno = document.querySelector('button[data-action="abrirFormularioCadastro"]');
    if (btnCadastrarAluno) {
        btnCadastrarAluno.addEventListener('click', abrirFormularioCadastro);
    }
});
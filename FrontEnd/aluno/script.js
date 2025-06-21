function mostrarSecao(id) {
  // Esconde todas as seções
  const secoes = document.querySelectorAll('.conteudo');
  secoes.forEach(secao => secao.style.display = 'none');

  // Mostra a seção clicada
  const ativa = document.getElementById(id);
  if (ativa) {
    ativa.style.display = 'block';
  }
}

//mostra as mensagens de vaca cadastrada com sucesso ou com falha
document.addEventListener('DOMContentLoaded', function () {
  if (mensagemCadastro && mensagemCadastro.tipo && mensagemCadastro.secao) {
    mostrarSecao(mensagemCadastro.secao);

    const alvo = document.getElementById(mensagemCadastro.secao);
    if (alvo) {
      const p = document.createElement('p');
      p.id = 'mensagem-status'; // Damos um ID para facilitar
      p.style.color = mensagemCadastro.tipo === 'sucesso' ? 'green' : 'red';
      p.textContent = mensagemCadastro.tipo === 'sucesso'
        ? '✅ Vaca cadastrada com sucesso!'
        : '❌ Erro ao cadastrar vaca.';
      alvo.appendChild(p);

      // ⏱️ Remove a mensagem após 5 segundos
      setTimeout(() => {
        p.remove();
      }, 5000);
    }

    // Limpa os parâmetros da URL
    const novaURL = window.location.pathname;
    window.history.replaceState({}, document.title, novaURL);
  }
});

// 💨 Remove a mensagem se mudar de seção
function mostrarSecao(id) {
  const secoes = document.querySelectorAll('.conteudo');
  secoes.forEach(secao => {
    secao.style.display = 'none';

    // Remove a mensagem se existir
    const msg = secao.querySelector('#mensagem-status');
    if (msg) msg.remove();
  });

  const ativa = document.getElementById(id);
  if (ativa) {
    ativa.style.display = 'block';
  }
}

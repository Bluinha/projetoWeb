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

//faz com que fiquemos na mesma sessão, mesmo após uma mensagem de erro ou bem sucedido
window.addEventListener('DOMContentLoaded', () => {
  const urlParams = new URLSearchParams(window.location.search);
  const secao = urlParams.get('secao');
  if (secao) {
    mostrarSecao(secao);
  }
});

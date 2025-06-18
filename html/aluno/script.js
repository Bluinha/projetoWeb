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



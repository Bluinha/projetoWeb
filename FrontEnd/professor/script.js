function abrirAba(evt, nomeAba) {
  const secoes = document.querySelectorAll("main > section");
  const botoes = document.querySelectorAll("nav .tablink");

  secoes.forEach(secao => secao.style.display = "none");
  botoes.forEach(botao => botao.classList.remove("ativo"));

  document.getElementById(nomeAba).style.display = "block";
  evt.currentTarget.classList.add("ativo");
}

const botaoPerfil = document.getElementById('btnPerfil');
const menuPerfil = document.getElementById('menuPerfil');

botaoPerfil.addEventListener('click', function (e) {
  e.stopPropagation(); // impede que o clique feche a caixa imediatamente
  menuPerfil.style.display = (menuPerfil.style.display === 'block') ? 'none' : 'block';
});

document.addEventListener('click', function (e) {
  if (!menuPerfil.contains(e.target) && e.target !== botaoPerfil) {
    menuPerfil.style.display = 'none';
  }
});



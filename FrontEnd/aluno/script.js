
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

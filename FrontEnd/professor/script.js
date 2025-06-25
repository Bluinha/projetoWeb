function abrirAba(evt, nomeAba) {
    const secoes = document.querySelectorAll("main > section");
    const botoes = document.querySelectorAll("nav .tablink");

    secoes.forEach(secao => secao.style.display = "none");
    botoes.forEach(botao => botao.classList.remove("ativo"));

    document.getElementById(nomeAba).style.display = "block";
    evt.currentTarget.classList.add("ativo");
  }
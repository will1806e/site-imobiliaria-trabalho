(function () {
    const chave = "tema-imobiliaria";
    const raiz = document.documentElement;
    const botoes = document.querySelectorAll("[data-theme-toggle]");

    function aplicarTema(tema) {
        raiz.setAttribute("data-theme", tema);
        localStorage.setItem(chave, tema);
        botoes.forEach((botao) => {
            botao.textContent = tema === "dark" ? "Tema claro" : "Tema escuro";
            botao.setAttribute("aria-pressed", tema === "dark" ? "true" : "false");
        });
    }

    const temaSalvo = localStorage.getItem(chave);
    const temaInicial = temaSalvo || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");

    aplicarTema(temaInicial);

    botoes.forEach((botao) => {
        botao.addEventListener("click", () => {
            aplicarTema(raiz.getAttribute("data-theme") === "dark" ? "light" : "dark");
        });
    });
})();

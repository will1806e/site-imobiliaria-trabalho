(function () {
    const chave = "tema-imobiliaria";
    const raiz = document.documentElement;
    const botoes = document.querySelectorAll("[data-theme-toggle]");
    const loader = document.createElement("div");

    loader.className = "page-loader";
    loader.setAttribute("aria-hidden", "true");
    loader.innerHTML = `
        <div class="page-loader-box" role="status" aria-live="polite">
            <span class="loader-mark"></span>
            <span class="loader-text">Carregando</span>
            <span class="loader-bar"><span></span></span>
        </div>
    `;

    function aplicarTema(tema) {
        raiz.setAttribute("data-theme", tema);
        localStorage.setItem(chave, tema);
        botoes.forEach((botao) => {
            botao.textContent = tema === "dark" ? "Tema claro" : "Tema escuro";
            botao.setAttribute("aria-pressed", tema === "dark" ? "true" : "false");
        });
    }

    function mostrarLoader() {
        loader.classList.add("is-visible");
        loader.setAttribute("aria-hidden", "false");
    }

    function esconderLoader() {
        loader.classList.remove("is-visible");
        loader.setAttribute("aria-hidden", "true");
    }

    const temaSalvo = localStorage.getItem(chave);
    const temaInicial = temaSalvo || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");

    aplicarTema(temaInicial);

    botoes.forEach((botao) => {
        botao.addEventListener("click", () => {
            aplicarTema(raiz.getAttribute("data-theme") === "dark" ? "light" : "dark");
        });
    });

    document.body.appendChild(loader);
    window.addEventListener("pageshow", esconderLoader);
    window.addEventListener("load", esconderLoader);

    document.querySelectorAll("a[href]").forEach((link) => {
        link.addEventListener("click", (evento) => {
            const href = link.getAttribute("href") || "";
            const destino = new URL(href, window.location.href);
            const novaPagina = destino.origin === window.location.origin && destino.pathname !== window.location.pathname;
            const deveCarregar = novaPagina || destino.search !== window.location.search;

            if (
                evento.defaultPrevented ||
                link.target === "_blank" ||
                href.startsWith("#") ||
                href.startsWith("javascript:") ||
                evento.ctrlKey ||
                evento.metaKey ||
                evento.shiftKey ||
                evento.altKey
            ) {
                return;
            }

            if (deveCarregar) {
                evento.preventDefault();
                mostrarLoader();
                window.setTimeout(() => {
                    window.location.href = destino.href;
                }, 450);
            }
        });
    });

    document.querySelectorAll("form").forEach((formulario) => {
        formulario.addEventListener("submit", (evento) => {
            if (formulario.dataset.enviando === "true") {
                return;
            }

            evento.preventDefault();
            formulario.dataset.enviando = "true";
            mostrarLoader();
            window.setTimeout(() => {
                formulario.submit();
            }, 450);
        });
    });
})();

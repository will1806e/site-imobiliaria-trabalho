<?php
require_once "../php/conexao.php";
require_once "../php/funcoes.php";

$imoveis = buscar_imoveis($c);
$busca = trim($_GET["busca"] ?? "");
$finalidadeFiltro = trim($_GET["finalidade"] ?? "");
$tipoFiltro = trim($_GET["tipo"] ?? "");
$tiposDisponiveis = [];

foreach ($imoveis as $imovel) {
    if (!empty($imovel["tipo_imovel"]) && !in_array($imovel["tipo_imovel"], $tiposDisponiveis, true)) {
        $tiposDisponiveis[] = $imovel["tipo_imovel"];
    }
}

sort($tiposDisponiveis);

$imoveisFiltrados = array_values(array_filter($imoveis, function ($imovel) use ($busca, $finalidadeFiltro, $tipoFiltro) {
    $textoBusca = strtolower($busca);
    $textoImovel = strtolower($imovel["titulo"] . " " . $imovel["descricao"] . " " . $imovel["bairro"] . " " . $imovel["cidade"]);

    if ($textoBusca !== "" && strpos($textoImovel, $textoBusca) === false) {
        return false;
    }

    if ($finalidadeFiltro !== "" && $imovel["finalidade"] !== $finalidadeFiltro) {
        return false;
    }

    if ($tipoFiltro !== "" && $imovel["tipo_imovel"] !== $tipoFiltro) {
        return false;
    }

    return true;
}));

$totalImoveis = count($imoveis);
$totalVenda = count(array_filter($imoveis, fn($imovel) => strtolower($imovel["finalidade"]) === "venda"));
$totalAluguel = count(array_filter($imoveis, fn($imovel) => strtolower($imovel["finalidade"]) === "aluguel"));
$destaque = $imoveis[0] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliaria Lar Ideal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css?v=footer">
    <link rel="stylesheet" href="../css/index.css?v=home">
</head>
<body>
    <header class="cabecalho">
        <a href="index.php" class="marca">
            <img class="logo" src="../icones/logo.png" alt="Logo">
        </a>
        <nav class="navegacao">
            <a href="#imoveis">Imoveis</a>
            <a href="admin.php">Administrativo</a>
            <button class="tema-toggle" type="button" data-theme-toggle aria-label="Alternar tema">Tema</button>
        </nav>
    </header>

    <main>
        <section class="hero hero-home">
            <img src="../imagens/image.png" alt="Sala planejada de um imovel">
            <div class="hero-conteudo hero-home-conteudo">
                <span class="hero-etiqueta">Imobiliaria Lar Ideal</span>
                <h1>Imoveis escolhidos com clareza, bairro e valor na primeira olhada.</h1>
                <p class="hero-texto">Uma vitrine simples para comparar casas, apartamentos e oportunidades de aluguel ou venda sem perder tempo.</p>

                <div class="hero-acoes">
                    <a class="botao-principal" href="#imoveis">Ver catalogo</a>
                    <a class="botao-secundario botao-hero" href="admin.php">Area admin</a>
                </div>

                <div class="hero-metricas" aria-label="Resumo dos imoveis">
                    <div>
                        <strong><?= $totalImoveis ?></strong>
                        <span>imoveis ativos</span>
                    </div>
                    <div>
                        <strong><?= $totalVenda ?></strong>
                        <span>para venda</span>
                    </div>
                    <div>
                        <strong><?= $totalAluguel ?></strong>
                        <span>para aluguel</span>
                    </div>
                </div>
            </div>

            <aside class="hero-busca" aria-label="Buscar imoveis">
                <div class="busca-topo">
                    <span>Busca rapida</span>
                    <strong>Encontre pelo que importa</strong>
                </div>
                <form action="#imoveis" method="get" class="form-busca">
                    <label>
                        <span>Local, titulo ou bairro</span>
                        <input type="text" name="busca" value="<?= limpar_texto($busca) ?>" placeholder="Centro, casa, apartamento">
                    </label>
                    <div class="busca-grid">
                        <label>
                            <span>Finalidade</span>
                            <select name="finalidade">
                                <option value="">Todas</option>
                                <option value="Venda" <?= $finalidadeFiltro === "Venda" ? "selected" : "" ?>>Venda</option>
                                <option value="Aluguel" <?= $finalidadeFiltro === "Aluguel" ? "selected" : "" ?>>Aluguel</option>
                            </select>
                        </label>
                        <label>
                            <span>Tipo</span>
                            <select name="tipo">
                                <option value="">Todos</option>
                                <?php foreach ($tiposDisponiveis as $tipo): ?>
                                    <option value="<?= limpar_texto($tipo) ?>" <?= $tipoFiltro === $tipo ? "selected" : "" ?>><?= limpar_texto($tipo) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </div>
                    <button class="botao-principal" type="submit">Filtrar imoveis</button>
                    <?php if ($busca !== "" || $finalidadeFiltro !== "" || $tipoFiltro !== ""): ?>
                        <a class="limpar-filtro" href="index.php#imoveis">Limpar filtros</a>
                    <?php endif; ?>
                </form>
            </aside>
        </section>

        <section class="faixa-editorial" aria-label="Diferenciais">
            <article>
                <span>01</span>
                <h2>Catalogo direto</h2>
                <p>Cards com foto, preco, finalidade e localizacao logo no primeiro contato.</p>
            </article>
            <article>
                <span>02</span>
                <h2>Detalhes completos</h2>
                <p>Pagina individual para cada imovel com descricao, galeria e dados essenciais.</p>
            </article>
            <article>
                <span>03</span>
                <h2>Gestao protegida</h2>
                <p>O painel administrativo fica separado e protegido por senha.</p>
            </article>
        </section>

        <?php if ($destaque): ?>
        <section class="destaque-home">
            <div class="destaque-foto">
                <img src="<?= limpar_texto(caminho_imagem($destaque["imagem"])) ?>" alt="<?= limpar_texto($destaque["titulo"]) ?>">
            </div>
            <div class="destaque-texto">
                <span class="finalidade"><?= limpar_texto($destaque["finalidade"]) ?></span>
                <h2><?= limpar_texto($destaque["titulo"]) ?></h2>
                <p><?= limpar_texto($destaque["descricao"]) ?></p>
                <div class="destaque-dados">
                    <strong><?= formatar_moeda($destaque["valor"]) ?></strong>
                    <span><?= limpar_texto($destaque["bairro"]) ?>, <?= limpar_texto($destaque["cidade"]) ?></span>
                </div>
                <a class="botao-principal" href="imovel.php?id=<?= (int) $destaque["id"] ?>">Abrir destaque</a>
            </div>
        </section>
        <?php endif; ?>

        <section id="imoveis" class="secao-imoveis">
            <div class="titulo-secao">
                <span>Catalogo</span>
                <h2><?= count($imoveisFiltrados) ?> imovel<?= count($imoveisFiltrados) === 1 ? "" : "is" ?> encontrado<?= count($imoveisFiltrados) === 1 ? "" : "s" ?></h2>
            </div>

            <?php if (!tabela_imoveis_existe($c)): ?>
                <div class="alert alert-warning mx-auto aviso-banco" role="alert">
                    Importe o arquivo <strong>banco.sql</strong> no banco <strong>imobiliaria</strong> para ativar o cadastro real.
                </div>
            <?php endif; ?>

            <div class="banners-container">
                <?php if (empty($imoveisFiltrados)): ?>
                    <div class="sem-resultados">
                        <h3>Nenhum imovel nesse filtro</h3>
                        <p>Tente buscar por outro bairro, tipo ou finalidade.</p>
                        <a class="botao-principal" href="index.php#imoveis">Ver todos</a>
                    </div>
                <?php endif; ?>
                <?php foreach ($imoveisFiltrados as $imovel): ?>
                    <a class="banner-link" href="imovel.php?id=<?= (int) $imovel["id"] ?>" aria-label="Abrir detalhes de <?= limpar_texto($imovel["titulo"]) ?>">
                    <article class="banner-imoveis">
                        <img class="banner-imagem" src="<?= limpar_texto(caminho_imagem($imovel["imagem"])) ?>" alt="<?= limpar_texto($imovel["titulo"]) ?>">
                        <div class="banner-div">
                            <div class="preco-titulo">
                                <span class="finalidade"><?= limpar_texto($imovel["finalidade"]) ?></span>
                                <h3><?= limpar_texto($imovel["titulo"]) ?></h3>
                                <strong><?= formatar_moeda($imovel["valor"]) ?></strong>
                            </div>
                            <p><?= limpar_texto($imovel["descricao"]) ?></p>
                            <div class="banner-rodape">
                                <span><?= limpar_texto($imovel["tipo_imovel"]) ?></span>
                                <span><?= limpar_texto($imovel["bairro"]) ?>, <?= limpar_texto($imovel["cidade"]) ?></span>
                            </div>
                            <span class="ver-detalhes">Ver detalhes</span>
                        </div>
                    </article>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer>
        <img src="../icones/logo.png" alt="Logo" width="150">
        <div>
            <h3>Contatos</h3>
            <ul>
                <li>Whatsapp</li>
                <li>Instagram</li>
                <li>Facebook</li>
            </ul>
        </div>
        <p>Todos os Direitos Reservados &copy;</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/tema.js?v=loading"></script>
</body>
</html>

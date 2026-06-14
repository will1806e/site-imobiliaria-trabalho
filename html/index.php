<?php
require_once "../php/conexao.php";
require_once "../php/funcoes.php";

$imoveis = buscar_imoveis($c);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliaria Lar Ideal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/index.css">
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
        <section class="hero">
            <img src="../imagens/image.png" alt="Sala planejada de um imovel">
            <div class="hero-conteudo">
                <p>Compra, venda e aluguel</p>
                <h1>Transformando imoveis em lares e sonhos em realidade.</h1>
                <a class="botao-principal" href="#imoveis">Ver imoveis</a>
            </div>
        </section>

        <section class="carrossel-section" aria-label="Ambientes dos imoveis">
            <div id="carouselImoveis" class="carousel slide carrossel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../imagens/modern-childrens-room.png" class="d-block w-100 imagem-carrossel" alt="Quarto moderno">
                    </div>
                    <div class="carousel-item">
                        <img src="../imagens/mid-century-modern-dining-area.png" class="d-block w-100 imagem-carrossel" alt="Sala de jantar">
                    </div>
                    <div class="carousel-item">
                        <img src="../imagens/interior-of-living-room.png" class="d-block w-100 imagem-carrossel" alt="Sala de estar">
                    </div>
                    <div class="carousel-item">
                        <img src="../imagens/interior-of-living-room-at-night-with-illuminated-tv-and-ceiling.png" class="d-block w-100 imagem-carrossel" alt="Sala iluminada">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselImoveis" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselImoveis" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Proximo</span>
                </button>
            </div>
        </section>

        <section id="imoveis" class="secao-imoveis">
            <div class="titulo-secao">
                <span>Catalogo</span>
                <h2>Imoveis cadastrados</h2>
            </div>

            <?php if (!tabela_imoveis_existe($c)): ?>
                <div class="alert alert-warning mx-auto aviso-banco" role="alert">
                    Importe o arquivo <strong>banco.sql</strong> no banco <strong>imobiliaria</strong> para ativar o cadastro real.
                </div>
            <?php endif; ?>

            <div class="banners-container">
                <?php foreach ($imoveis as $imovel): ?>
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
    <script src="../js/tema.js"></script>
</body>
</html>

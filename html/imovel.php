<?php
require_once "../php/auth.php";
require_once "../php/conexao.php";
require_once "../php/funcoes.php";

$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
$imovel = buscar_imovel_por_id($c, $id);
$galeria = $imovel ? imagens_galeria_imovel($c, $imovel) : [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $imovel ? limpar_texto($imovel["titulo"]) : "Imovel nao encontrado" ?> - Imobiliaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css?v=footer">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <header class="cabecalho">
        <a href="index.php" class="marca">
            <img class="logo" src="../icones/logo.png" alt="Logo">
        </a>
        <nav class="navegacao">
            <a href="index.php#imoveis">Imoveis</a>
            <a href="admin.php">Administrativo</a>
            <?php if (admin_logado()): ?>
                <a href="logout.php">Sair</a>
            <?php endif; ?>
            <button class="tema-toggle" type="button" data-theme-toggle aria-label="Alternar tema">Tema</button>
        </nav>
    </header>

    <main class="detalhe-layout">
        <?php if (!$imovel): ?>
            <section class="detalhe-card detalhe-vazio">
                <span class="finalidade">Ops</span>
                <h1>Imovel nao encontrado</h1>
                <p>Esse imovel nao existe ou foi removido do cadastro.</p>
                <a class="botao-principal" href="index.php#imoveis">Voltar para os imoveis</a>
            </section>
        <?php else: ?>
            <section class="detalhe-hero">
                <div class="detalhe-foto-principal">
                    <img src="<?= limpar_texto(caminho_imagem($imovel["imagem"])) ?>" alt="<?= limpar_texto($imovel["titulo"]) ?>">
                </div>

                <div class="detalhe-resumo">
                    <span class="finalidade"><?= limpar_texto($imovel["finalidade"]) ?></span>
                    <h1><?= limpar_texto($imovel["titulo"]) ?></h1>
                    <strong><?= formatar_moeda($imovel["valor"]) ?></strong>
                    <p><?= limpar_texto($imovel["bairro"]) ?>, <?= limpar_texto($imovel["cidade"]) ?></p>
                    <div class="detalhe-acoes">
                        <?php if (admin_logado()): ?>
                            <a class="botao-principal" href="admin.php?id=<?= (int) $imovel["id"] ?>">Editar imovel</a>
                        <?php endif; ?>
                        <a class="botao-secundario" href="index.php#imoveis">Voltar</a>
                    </div>
                </div>
            </section>

            <section class="detalhe-grid">
                <article class="detalhe-card">
                    <div class="titulo-secao alinhado-esquerda">
                        <span>Descricao</span>
                        <h2>Sobre o imovel</h2>
                    </div>
                    <p><?= nl2br(limpar_texto($imovel["descricao"])) ?></p>
                </article>

                <aside class="detalhe-card">
                    <div class="titulo-secao alinhado-esquerda">
                        <span>Informacoes</span>
                        <h2>Resumo</h2>
                    </div>
                    <dl class="lista-detalhes">
                        <div>
                            <dt>Tipo</dt>
                            <dd><?= limpar_texto($imovel["tipo_imovel"]) ?></dd>
                        </div>
                        <div>
                            <dt>Finalidade</dt>
                            <dd><?= limpar_texto($imovel["finalidade"]) ?></dd>
                        </div>
                        <div>
                            <dt>Valor</dt>
                            <dd><?= formatar_moeda($imovel["valor"]) ?></dd>
                        </div>
                        <div>
                            <dt>Cidade</dt>
                            <dd><?= limpar_texto($imovel["cidade"]) ?></dd>
                        </div>
                        <div>
                            <dt>Bairro</dt>
                            <dd><?= limpar_texto($imovel["bairro"]) ?></dd>
                        </div>
                    </dl>
                </aside>
            </section>

            <section class="detalhe-card">
                <div class="titulo-secao alinhado-esquerda">
                    <span>Galeria</span>
                    <h2>Imagens do imovel</h2>
                </div>
                <div class="galeria-imovel">
                    <?php foreach ($galeria as $imagem): ?>
                        <img src="<?= limpar_texto(caminho_imagem($imagem["imagem"])) ?>" alt="Imagem do imovel">
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <script src="../js/tema.js?v=loading"></script>
</body>
</html>

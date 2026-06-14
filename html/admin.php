<?php
require_once "../php/conexao.php";
require_once "../php/funcoes.php";

$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
$imovel = $id > 0 ? buscar_imovel_por_id($c, $id) : null;
$imoveis = buscar_imoveis($c);
$mensagem = $_GET["msg"] ?? "";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrativo - Imobiliaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="admin-body">
    <header class="cabecalho">
        <a href="index.php" class="marca">
            <img class="logo" src="../icones/logo.png" alt="Logo">
        </a>
        <nav class="navegacao">
            <a href="index.php">Inicio</a>
            <a href="admin.php">Administrativo</a>
        </nav>
    </header>

    <main class="admin-layout">
        <section class="formulario-admin">
            <div class="titulo-secao alinhado-esquerda">
                <span><?= $imovel ? "Edicao" : "Cadastro" ?></span>
                <h1><?= $imovel ? "Editar imovel" : "Cadastrar imovel" ?></h1>
            </div>

            <?php if (!conexao_disponivel($c) || !tabela_imoveis_existe($c)): ?>
                <div class="alert alert-danger" role="alert">
                    Banco indisponivel. Importe o arquivo <strong>banco.sql</strong> no MySQL antes de cadastrar.
                </div>
            <?php endif; ?>

            <?php if ($mensagem): ?>
                <div class="alert alert-success" role="alert"><?= limpar_texto($mensagem) ?></div>
            <?php endif; ?>

            <form action="salvar_imovel.php" method="post" enctype="multipart/form-data" class="form-grid">
                <input type="hidden" name="id" value="<?= $imovel ? (int) $imovel["id"] : 0 ?>">
                <input type="hidden" name="imagem_atual" value="<?= $imovel ? limpar_texto($imovel["imagem"]) : "" ?>">

                <label>
                    Titulo
                    <input type="text" name="titulo" required value="<?= $imovel ? limpar_texto($imovel["titulo"]) : "" ?>">
                </label>

                <label>
                    Tipo do imovel
                    <select name="tipo_imovel" required>
                        <?php foreach (["Casa", "Apartamento", "Sobrado", "Terreno", "Comercial"] as $tipo): ?>
                            <option value="<?= $tipo ?>" <?= $imovel && $imovel["tipo_imovel"] === $tipo ? "selected" : "" ?>><?= $tipo ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <fieldset class="radio-box">
                    <legend>Finalidade</legend>
                    <?php $finalidade = $imovel["finalidade"] ?? "Venda"; ?>
                    <label><input type="radio" name="finalidade" value="Venda" <?= $finalidade === "Venda" ? "checked" : "" ?>> Venda</label>
                    <label><input type="radio" name="finalidade" value="Aluguel" <?= $finalidade === "Aluguel" ? "checked" : "" ?>> Aluguel</label>
                </fieldset>

                <label>
                    Valor
                    <input type="number" name="valor" step="0.01" min="0" required value="<?= $imovel ? limpar_texto($imovel["valor"]) : "" ?>">
                </label>

                <label>
                    Cidade
                    <input type="text" name="cidade" required value="<?= $imovel ? limpar_texto($imovel["cidade"]) : "" ?>">
                </label>

                <label>
                    Bairro
                    <input type="text" name="bairro" required value="<?= $imovel ? limpar_texto($imovel["bairro"]) : "" ?>">
                </label>

                <label class="campo-inteiro">
                    Descricao
                    <textarea name="descricao" rows="4" required><?= $imovel ? limpar_texto($imovel["descricao"]) : "" ?></textarea>
                </label>

                <label>
                    Imagem principal
                    <input type="file" name="imagem" accept="image/*" <?= $imovel ? "" : "required" ?>>
                </label>

                <label>
                    Imagens adicionais
                    <input type="file" name="imagens_adicionais[]" accept="image/*" multiple>
                </label>

                <div class="acoes-form campo-inteiro">
                    <button class="btn btn-primary" type="submit">Salvar imovel</button>
                    <a class="btn btn-outline-secondary" href="admin.php">Limpar</a>
                </div>
            </form>
        </section>

        <section class="lista-admin">
            <div class="titulo-secao alinhado-esquerda">
                <span>Gerenciamento</span>
                <h2>Imoveis</h2>
            </div>

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imagem</th>
                            <th>Titulo</th>
                            <th>Finalidade</th>
                            <th>Valor</th>
                            <th>Localizacao</th>
                            <th>Acoes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($imoveis as $item): ?>
                            <tr>
                                <td><?= (int) $item["id"] ?></td>
                                <td><img class="thumb-admin" src="<?= limpar_texto(caminho_imagem($item["imagem"])) ?>" alt=""></td>
                                <td><?= limpar_texto($item["titulo"]) ?></td>
                                <td><?= limpar_texto($item["finalidade"]) ?></td>
                                <td><?= formatar_moeda($item["valor"]) ?></td>
                                <td><?= limpar_texto($item["bairro"]) ?>, <?= limpar_texto($item["cidade"]) ?></td>
                                <td class="acoes-tabela">
                                    <a class="btn btn-sm btn-outline-primary" href="admin.php?id=<?= (int) $item["id"] ?>">Editar</a>
                                    <a class="btn btn-sm btn-outline-danger" href="excluir_imovel.php?id=<?= (int) $item["id"] ?>" onclick="return confirm('Excluir este imovel?')">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>

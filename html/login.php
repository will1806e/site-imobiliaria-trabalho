<?php
require_once "../php/auth.php";
require_once "../php/funcoes.php";

$erro = "";
$destino = destino_login_seguro($_GET["destino"] ?? "admin.php");

if (admin_logado()) {
    header("Location: " . $destino);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $senha = $_POST["senha"] ?? "";
    $destino = destino_login_seguro($_POST["destino"] ?? "admin.php");

    if (autenticar_admin($senha)) {
        header("Location: " . $destino);
        exit;
    }

    $erro = "Senha incorreta.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login administrativo - Imobiliaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css?v=logo">
</head>
<body class="admin-body">
    <header class="cabecalho">
        <a href="index.php" class="marca">
            <img class="logo" src="../icones/logo.png" alt="Logo">
        </a>
        <nav class="navegacao">
            <a href="index.php">Inicio</a>
            <button class="tema-toggle" type="button" data-theme-toggle aria-label="Alternar tema">Tema</button>
        </nav>
    </header>

    <main class="login-layout">
        <section class="formulario-admin login-card">
            <div class="titulo-secao alinhado-esquerda">
                <span>Restrito</span>
                <h1>Acesso administrativo</h1>
            </div>

            <?php if ($erro): ?>
                <div class="alert alert-danger" role="alert"><?= limpar_texto($erro) ?></div>
            <?php endif; ?>

            <form method="post" class="form-grid">
                <input type="hidden" name="destino" value="<?= limpar_texto($destino) ?>">

                <label class="campo-inteiro">
                    Senha
                    <input type="password" name="senha" required autofocus autocomplete="current-password">
                </label>

                <div class="acoes-form campo-inteiro">
                    <button class="btn btn-primary" type="submit">Entrar</button>
                    <a class="btn btn-outline-secondary" href="index.php">Voltar</a>
                </div>
            </form>
        </section>
    </main>

    <script src="../js/tema.js?v=loading"></script>
</body>
</html>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

const ADMIN_SENHA_HASH = '$2y$10$GtBOBIv2wAhAL.d1DKzQhO38lSYxMNX97gdi04mFWmdoc0LnjKuhu';

function admin_logado(): bool
{
    return !empty($_SESSION["admin_logado"]);
}

function autenticar_admin(string $senha): bool
{
    if (!password_verify($senha, ADMIN_SENHA_HASH)) {
        return false;
    }

    session_regenerate_id(true);
    $_SESSION["admin_logado"] = true;
    return true;
}

function exigir_admin(): void
{
    if (admin_logado()) {
        return;
    }

    $destino = $_SERVER["REQUEST_URI"] ?? "admin.php";
    header("Location: login.php?destino=" . urlencode($destino));
    exit;
}

function destino_login_seguro(string $destino): string
{
    if ($destino === "" || preg_match('/^https?:\/\//i', $destino)) {
        return "admin.php";
    }

    if (strpos($destino, "..") !== false) {
        return "admin.php";
    }

    return $destino;
}

function sair_admin(): void
{
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }

    session_destroy();
}
?>

<?php
declare(strict_types=1);
// Saved as bootstrap.php. Part of the login system (bootstrap, register, login, dashboard, logout).

session_set_cookie_params([
    "httponly" => true,
    "samesite" => "Lax",
    // "secure" => true, // enable on HTTPS
]);
session_start();

// One shared PDO connection. SQLite needs no server; for MySQL change the DSN.
function db(): PDO
{
    static $pdo = null;
    if ($pdo === null) {
        $pdo = new PDO("sqlite:" . __DIR__ . "/auth.sqlite", null, null, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        $pdo->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL UNIQUE,
            password_hash TEXT NOT NULL
        )");
    }
    return $pdo;
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

function csrf_token(): string
{
    return $_SESSION["csrf"] ??= bin2hex(random_bytes(32));
}

function csrf_check(): void
{
    if (!hash_equals($_SESSION["csrf"] ?? "", (string) ($_POST["csrf"] ?? ""))) {
        http_response_code(403);
        exit("Invalid CSRF token.");
    }
}

function current_user(): ?array
{
    if (empty($_SESSION["user_id"])) {
        return null;
    }
    $stmt = db()->prepare("SELECT id, username FROM users WHERE id = ?");
    $stmt->execute([$_SESSION["user_id"]]);
    return $stmt->fetch() ?: null;
}

function require_login(): void
{
    if (current_user() === null) {
        header("Location: login.php");
        exit;
    }
}

<?php
session_start();
require_once __DIR__ . '/../Database.php';
class AccessModel extends Database
{
    public static function loginUser($username, $password): bool
    {
        if (!isset($username) || !isset($password)) {
            return false;
        }

        $database = new Database();
        $stmt = $database->run('SELECT password FROM login WHERE username = ?', [$username]);
        $user = $stmt->fetch();

        if (!$user) {
            session_abort();
            return false;
        }

        $userPassword = $user['password'];

        if (password_verify($password, $userPassword)) {
            $_SESSION['username'] = $username;
            return true;
        } else {
            session_abort();
            return false;
        }
    }

    public static function logoutUser(): void {
        setcookie(session_id(), '', time() - 42000);

        $_SESSION = [];

        session_unset();

        session_destroy();
    }

    public static function isLoggedIn(): bool {
        return isset($_SESSION['username']);
    }
}
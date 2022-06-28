<?php
class Utility {
    static function redirect($location) {
        header('Location: ' . $location);
        exit();
    }

    static function redirectIfNotLoggedIn() {
        if (!isset($_SESSION['username']) && $_SERVER['PHP_SELF'] != '/index.php') {
            header('Location: ../../../index.php');
        }
    }

    static function checkIfLoggedIn(): bool {
        return isset($_SESSION['username']);
    }

    static function calculateLastPage(int $amountOfDbResults, int $amountPerPage): int {
        return ceil($amountOfDbResults / $amountPerPage);
    }
}
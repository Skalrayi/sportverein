<?php
class Utility {

    static function redirect($location) {
        header('Location: ' . $location);
        exit();
    }

    static function checkLoggedIn(): bool {
        if (isset($_SESSION['username'])) {
            return true;
        }
        return false;
    }
}
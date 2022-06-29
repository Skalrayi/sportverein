<?php
require_once __DIR__ . '/../Utility.php';
require_once __DIR__ . '/../model/AccessModel.php';

class AccessController
{
    public function login($username, $password): void {
        // Wenn der Login funktioniert, wird direkt zur Liste weitergeleitet
        if (AccessModel::loginUser($username, $password)) {
            Utility::redirect('../list.php');
        }
        // wenn der Login nicht funktioniert wird einfach auf index mit der Fehlermeldung weitergeleitet
        Utility::redirect('../index.php?login=false');
    }

    public function logout() {
        // User wird ausgeloggt
        AccessModel::logoutUser();
        // beim Logout wird auf die Startseite weitergeleitet
        Utility::redirect('../../index.php');
    }

    public function isLoggedIn(): bool {
        // gibt wahr zurück, wenn Nutzer angemeldet ist.
        return AccessModel::isLoggedIn();
    }
}
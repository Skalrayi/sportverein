<?php
require_once __DIR__ . '/php/controller/AccessController.php';

$accessController = new AccessController();
// Wenn man angemeldet ist, dann wird man direkt zur Liste weitergeleitet
if ($accessController->isLoggedIn()) {
    Utility::redirect('./php/list.php');
}
// ansonsten wird die normale Loginseite angezeigt
include __DIR__ . '/php/pages/index.php';
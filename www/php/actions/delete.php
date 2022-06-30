<?php
//TODO entweder im anderen Controller rein oder immer selbständig bei den actions???
require_once __DIR__ . '/../controller/AccessController.php';
require_once __DIR__ . '/../controller/CRUDController.php';
$accessController = new AccessController();
// Wenn man nicht angemeldet ist, darf man nicht löschen
if (!$accessController->isLoggedIn()) {
    die();
}
$crudController = new CRUDController();
$crudController->delete();
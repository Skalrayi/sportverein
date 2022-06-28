<?php
include __DIR__ . '/controller/AccessController.php';
$accessController = new AccessController();

if ($accessController->isLoggedIn()) {
    include __DIR__ . '/pages/list.php';
} else {
    Utility::redirect('../index.php');
}
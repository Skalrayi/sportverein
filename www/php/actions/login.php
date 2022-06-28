<?php
include __DIR__ . '/../controller/AccessController.php';
$loginController = new AccessController();
$loginController->login($_POST['username'], $_POST['password']);




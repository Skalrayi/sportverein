<?php
require_once __DIR__ . '/../controller/AccessController.php';
require_once __DIR__ . '/../controller/CRUDController.php';

$crudController = new CRUDController();
$crudController->delete();
<?php
session_start();

setcookie(session_id(), '', time() - 42000);

$_SESSION = [];

session_destroy();

header('Location: ../index.php');

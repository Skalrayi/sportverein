<?php
session_id();
session_start();
include __DIR__ . "/../Utility.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    include __DIR__ . "/../Database.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $database = new Database();

    $stmt = $database->run('SELECT password FROM login WHERE username = ?', [$username]);
    $user = $stmt->fetch();

    if (!$user) {
        session_abort();
        Utility::redirect('./../../index.php?login=false');
    }

    $userPassword = $user['password'];

    if (password_verify($password, $userPassword)) {
        $_SESSION['username'] =  $username;
        Utility::redirect('./../pages/list.php');
    } else {
        session_abort();
        Utility::redirect('./../../index.php?login=false');
    }
    return;
} else {
    Utility::redirect('./../../index.php?login=false');
    session_abort();
}




<?php
session_id();
session_start();
include "Utility.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    include "Database.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = Database::getInstance()->prepare('SELECT password FROM login WHERE username = ?');
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if (!$user) {
        session_abort();
        Utility::redirect('./../index.php?login=false');
    }

    $userPassword = $user['password'];

    if (password_verify($password, $userPassword)) {
        $_SESSION['username'] =  $username;
        Utility::redirect('./pages/list.php');
        return;
    } else {
        session_abort();
        Utility::redirect('./../index.php?login=false');
        return;
    }
} else {
    Utility::redirect('./../index.php?login=false');
    session_abort();
}




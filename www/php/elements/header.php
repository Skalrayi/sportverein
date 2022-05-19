<?php
    session_start();
    if (!isset($_SESSION['username']) && $_SERVER['PHP_SELF'] != '/index.php') {
        header('Location: ../../../index.php');
    }
?>
<html>
<head>
    <title>Sportverein</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../layout/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<?php
session_start();
include __DIR__ . "/../Utility.php";

if (!Utility::checkIfLoggedIn()) {
    // Wenn man nicht angemeldet ist, soll das Skript sterben, falls man die URL so aufruft.
    die();
}

include __DIR__ . "/../MemberRepository.php";

$id = $_POST['id'];

$memberRepository = new MemberModel();
$memberRepository->deleteMemberById($id);

Utility::redirect('./../pages/list.php');
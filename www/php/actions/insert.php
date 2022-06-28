<?php
session_start();
require_once __DIR__ . "/../Utility.php";

if (!Utility::checkIfLoggedIn()) {
    // Wenn man nicht angemeldet ist, soll das Skript sterben, falls man die URL so aufruft.
    die();
}

$forename = $_POST['forename'] ?? null;
$surname = $_POST['surname'] ?? null;
$zip = $_POST['zip'] ?? null;
$city = $_POST['city'] ?? null;
$gender = $_POST['gender'] ?? null;
$sportarten = $_POST['sport'] ?? null;
//TODO sportarten
include __DIR__ . "/../MemberRepository.php";

if (!$forename || !$surname || !$zip || !$city || !$gender) {
    Utility::redirect('./../pages/list.php?missingParameters=true');
}

$memberRepository = new MemberModel();
$memberRepository->insertNewUser([$forename, $surname, $zip, $city, $gender, 1, 1]);

Utility::redirect('./../pages/list.php');
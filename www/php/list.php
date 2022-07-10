<?php
include __DIR__ . '/controller/AccessController.php';
include __DIR__ . '/model/MemberModel.php';

$accessController = new AccessController();

// Wenn man angemeldet ist, wird die liste eingebunden, wenn nicht, dann wird zurück zum index weitergeleitet
if ($accessController->isLoggedIn()) {
    $memberModel = new MemberModel();

    // Variablen für die View vorbelegen
    $page = $_GET['page'] ?? null;
    $userData = $memberModel->getAllMembers(null, $page) ?? [];
    $countOfAllMembers = $memberModel->getCountOfAllMembers();
    $lastPage = Utility::calculateLastPage($countOfAllMembers, 15);

    // wenn edit gesetzt ist, dann wird das Modal ausgefahren und braucht seine Variablen.
    if (isset($_GET['edit'])) {
        $editMember = $memberModel->findById($_GET['edit']);
        $forename = $editMember['vorname'];
        $surname = $editMember['nachname'];
        $zip = $editMember['plz'];
        $city = $editMember['ort'];
        $gender = $editMember['geschlecht'];
    }

    if (isset($_GET['search'])) {
        $userData = $memberModel->getAllMembersWithSearchParameter($_GET['search']) ?? [];
        $countOfAllMembers = count($userData);
        $lastPage = Utility::calculateLastPage($countOfAllMembers, 15);
    }

    // Seite einbinden;
    include __DIR__ . '/pages/list.php';
} else {
    Utility::redirect('../index.php');
}
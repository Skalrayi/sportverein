<?php
include __DIR__ . '/controller/AccessController.php';
include __DIR__ . '/model/MemberModel.php';

$accessController = new AccessController();

if ($accessController->isLoggedIn()) {
    $memberModel = new MemberModel();

    // Variablen für die View vorbelegen
    $page = $_GET['page'] ?? null;
    $userData = $memberModel->getAllMembersWithGrundbeitrag(null, $page);
    $countOfAllMembers = $memberModel->getCountOfAllMembers();
    $lastPage = Utility::calculateLastPage($memberModel->getCountOfAllMembers(), 15);
    //
    include __DIR__ . '/pages/list.php';
} else {
    Utility::redirect('../index.php');
}
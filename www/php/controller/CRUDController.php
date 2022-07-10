<?php
require_once __DIR__ . '/../Utility.php';
require_once __DIR__ . '/AccessController.php';
require_once __DIR__ . '/../model/MemberModel.php';

class CRUDController
{
    /**
     * Insert Action
     *
     * @return void
     */
    public function insert() {
        // Wenn man nicht angemeldet ist, soll man auch nichts in die Datenbank einfügen dürfen
        if (!AccessModel::isLoggedIn()) {
            die();
        }

        // alle Variablen aus dem Request ziehen und schauen, ob sie da sind, ansonsten mit null belegen
        $forename = trim($_POST['forename']) ?? null;
        $surname = trim($_POST['surname']) ?? null;
        //TODO plz prüfen
        $zip = trim($_POST['zip']) ?? null;
        $city = trim($_POST['city']) ?? null;
        //TODO prüfen, ob "w" oder "m"
        $gender = trim($_POST['gender']) ?? null;
        $sportarten = $_POST['sport'] ?? null;
        $page = $_GET['page'] ?? null;
        //TODO sportarten

        $memberModel = new MemberModel();
        // Wenn der Insert nicht geht, dann fehlt ein Post Parameter und somit redirect auf ?missingParameter
        if (!$memberModel->insertNewUser([$forename, $surname, $zip, $city, $gender, 1, 1])) {
               Utility::redirect('../list.php?missingParameters=true');
        }
        // Wenn alles geklappt hat wieder auf die Seite weiterleiten, von der das Mitglied eingefügt wurde
        Utility::redirect('../list.php');
    }

    /**
     * Löschen Action
     *
     * @return void
     */
    public function delete() {
        // Wenn man nicht angemeldet ist, dann darf man nicht löschen!
        if (!AccessModel::isLoggedIn()) {
            die();
        }

        // Intcast, da die Sachen im POST array als string gespeichert sind
        $id = (int)$_POST['id'];

        $memberModel = new MemberModel();
        $memberModel->deleteMemberAndLinkedSportartByMemberId($id);

        //redirect zur Liste
        Utility::redirect('../list.php');
    }

    /**
     * Bearbeiten Action
     *
     * @return void
     */
    public function edit() {
        if (!AccessModel::isLoggedIn()) {
            die();
        }

        $id = (int)$_POST['id'] ?? null;
        // Wenn keine ID da ist, dann kann auch nichts gemacht werden, also abbrechen
        if (!$id) {
            die();
        }
        $surname = $_POST['surname'] ?? null;
        $forename = $_POST['forename'] ?? null;
        $zip = $_POST['zip'] ?? null;
        $city = $_POST['city'] ?? null;
        $gender = $_POST['gender'] ?? null;

        $memberModel = new MemberModel();
        // TODO sportarten
        $memberModel->updateMember($id, ['surname' => $surname, 'forename' => $forename, 'zip' => $zip, 'city' => $city, 'gender' => $gender]);
        // zurück zur Liste
        Utility::redirect('../list.php');
    }
}
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
        $forename = htmlspecialchars(trim($_POST['forename'] ?? ''));
        $surname = htmlspecialchars(trim($_POST['surname'] ?? ''));
        $zip = trim($_POST['zip'] ?? '');
        // redirecten wenn PLZ mehr als 6 ist, da die Datenbank nur 6 Zeichen erlaubt.
        if (strlen($zip) > 6) {
            Utility::redirect('../list.php?missingParameters=true');
        }
        $city = htmlspecialchars(trim($_POST['city'] ?? ''));
        $gender = htmlspecialchars(trim($_POST['gender'] ?? ''));
        // nur m oder w ist erlaubt
        if ($gender != 'm' && $gender != 'w') {
            Utility::redirect('../list.php?missingParameters=true');
        }
        $sportarten = $_POST['sport'] ?? null;

        // wenn eines dieser Daten nicht da ist dann wurden ungültige Daten übertragen und somit redirect auf missingParameter
        if (!$forename || !$surname || !$zip || !$city || !$gender) {
            Utility::redirect('../list.php?missingParameters=true');
        }

        $memberModel = new MemberModel();
        // Wenn der Insert nicht geht, dann fehlt ein Post Parameter und somit redirect auf ?missingParameter
        if (!$memberModel->insertNewUserWithSportarten([$forename, $surname, $zip, $city, $gender, 1, 1, 'sport' => $sportarten])) {
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
        // test

        $id = (int)$_POST['id'] ?? null;
        // Wenn keine ID da ist, dann kann auch nichts gemacht werden, also abbrechen
        if (!$id) {
            die();
        }

        $surname = htmlspecialchars(trim($_POST['surname'] ?? ''));
        $forename = htmlspecialchars(trim($_POST['forename'] ?? ''));
        $zip = htmlspecialchars(trim($_POST['zip'] ?? ''));
        // Wenn irgendwie eine Postleitzahl größer 6 eingefügt wird, einfach redirecten, da es nicht erlaubt ist.
        if (strlen($zip) > 6) {
            Utility::redirect('../list.php?missingParameters=true');
        }
        $city = htmlspecialchars(trim($_POST['city'] ?? ''));
        $gender = htmlspecialchars(trim($_POST['gender'] ?? ''));
        // Nur m oder w ist erlaubt
        if ($gender != 'm' && $gender != 'w') {
            Utility::redirect('../list.php?missingParameters=true');
        }
        $sportarten = $_POST['sport'] ?? null;

        // wenn eines dieser Daten nicht da ist dann wurden ungültige Daten übertragen und somit redirect auf missingParameter
        if (!$forename || !$surname || !$zip || !$city || !$gender) {
            Utility::redirect('../list.php?missingParameters=true');
        }

        $memberModel = new MemberModel();

        $memberModel->updateMember($id, ['surname' => $surname, 'forename' => $forename, 'zip' => $zip, 'city' => $city, 'gender' => $gender, 'sport' => $sportarten]);
        // zurück zur Liste
        Utility::redirect('../list.php');
    }
}
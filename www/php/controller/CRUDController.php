<?php

class CRUDController
{


    public function insert() {
        // Wenn man nicht angemeldet ist, soll man auch nichts in die Datenbank einfügen dürfen
        if (!AccessModel::isLoggedIn()) {
            die();
        }

        $forename = $_POST['forename'] ?? null;
        $surname = $_POST['surname'] ?? null;
        $zip = $_POST['zip'] ?? null;
        $city = $_POST['city'] ?? null;
        $gender = $_POST['gender'] ?? null;
        $sportarten = $_POST['sport'] ?? null;
        //TODO sportarten

        $memberModel = new MemberModel();
        // Wenn der Insert nich geht, dann fehlt ein Post Parameter und somit redirect auf ?missingParameter
        if (!$memberModel->insertNewUser([$forename, $surname, $zip, $city, $gender, 1, 1])) {
               Utility::redirect('../list.php?missingParameters=true');
        }
    }

}
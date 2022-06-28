<?php

class CRUDController
{


    public function insert() {
        // Wenn man nicht angemeldet ist, soll man auch nichts in die Datenbank einfügen dürgen
        if (!AccessModel::isLoggedIn()) {
            die();
        }



        $memberModel = new MemberModel();
        $memberModel->insertNewUser();
    }

}
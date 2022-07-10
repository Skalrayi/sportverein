<?php
require_once __DIR__ . '/../Database.php';

class MemberModel extends Database
{
    // TODO sportarten müssen hier gemacht werden, dann kann hier auch sport rein!
    private const REQUIRED_FIELDS = ['forename', 'surname', 'zip', 'city', 'gender'];
    private const DEFAULT_AMOUNT_PER_PAGE = 15;

    public function findById(int $id) {
        return $this->run('SELECT * FROM mitglied WHERE mi_id = ?', [$id])->fetch();
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateMember(int $id, array $data): bool {
        // Überprüfen, ob alle notwendigen Daten im array vorhanden sind
        foreach (self::REQUIRED_FIELDS as $field) {
            if ($data[$field] === null) {
                return false;
            }
        }

        $vorname = $data['forename'];
        $nachname = $data['surname'];
        $plz = $data['zip'];
        $ort = $data['city'];
        $geschlecht = $data['gender'];
        // TODO sportarten

        $stmt = 'UPDATE mitglied SET vorname = ?, nachname = ?, plz = ?, ort = ?, geschlecht = ? WHERE id = ?';

        $this->run($stmt, [$vorname, $nachname, $plz, $ort, $geschlecht, $id]);
        return true;
    }

    /**
     * Fügt einen neuen User in die Datenbank ein
     *
     * @param array $data
     * @return bool gibt wahr zurück, wenn ein User eingefügt wurde, ansonsten false
     */
    public function insertNewUser(array $data): bool {
        // Wenn bei den übergebenen Daten nicht alle benötigten Felder dabei sind, dann wird nichts inserted und false returned
//        foreach (self::REQUIRED_FIELDS as $field) {
//            if (!array_key_exists($field, $data)) {
//                echo $field;
//                return false;
//            }
//        }

        $stmt = 'INSERT INTO mitglied (vorname, nachname, plz, ort, geschlecht, or_id, gb_id)
                 VALUES (?, ?, ?, ?, ?, ?, ?)';
        $this->run($stmt, $data);
        return true;
    }

    // TODO sportarten vielleicht noch gleich mit hier rein????
    public function getAllMembers(int $amount = null, int $page = null): array {
        $stmt = 'SELECT * FROM mitglied';

        if (!$amount) {
            $stmt .= ' LIMIT ' . self::DEFAULT_AMOUNT_PER_PAGE;
        } else {
            $stmt .= ' LIMIT ' . $amount;
        }

        // Berechnung für die Anzahl je nach Seite und eingegebenem Amount
        if ($page && $amount) {
            $stmt .= ' OFFSET ' . ($amount * $page);
        } else if ($page && !$amount) {
            $stmt .= ' OFFSET ' . (($page - 1) * self::DEFAULT_AMOUNT_PER_PAGE);
        }

        return $this->run($stmt)->fetchAll();
    }

    /**
     * Löscht ein Mitglied und die dazugehörigen Verknüpfungen zur Sportart
     *
     * @param int $id
     * @return void
     */
    public function deleteMemberAndLinkedSportartByMemberId(int $id) {
        $this->deleteLinkedSportartByMemberId($id);
        $this->deleteMemberById($id);
    }

    /**
     * Löscht ein Mitglied anhand der übergebenen ID
     * @param int $id
     */
    private function deleteMemberById(int $id) {
        $stmt = 'DELETE FROM mitglied WHERE mi_id = ?';
        $this->run($stmt, [$id]);
    }

    /**
     * Löscht in der Beziehungstabelle die Verknüpfungen zwischen Sportart und Mitglied
     * @param int $id
     */
    private function deleteLinkedSportartByMemberId(int $id) {
        $stmt = 'DELETE FROM mitglied_sportart WHERE mi_id = ?';
        $this->run($stmt, [$id]);
    }

    /**
     * gibt die Anzahl aller in der Datenbank vorhandenen Mitglieder an
     *
     * @return int
     */
    public function getCountOfAllMembers(): int {
        $stmt = 'SELECT * FROM mitglied';
        return $this->run($stmt)->rowCount();
    }

    public function getAllMembersWithSearchParameter(string $searchParameter): array
    {
        $stmt = 'SELECT * FROM mitglied
         WHERE vorname LIKE ? 
           OR nachname LIKE ?
           OR plz LIKE ?
           OR ort LIKE ?';

        //überall wildcards
       return $this->run($stmt, [
            '%' . $searchParameter . '%',
            '%' . $searchParameter . '%',
            '%' . $searchParameter . '%',
            '%' . $searchParameter . '%'
        ])->fetchAll();
    }

}
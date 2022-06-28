<?php
require_once __DIR__ . '/../Database.php';

class MemberModel extends Database
{
    private const REQUIRED_FIELDS = ['forename', 'surname', 'zip', 'city', 'gender', 'sport'];
    private const DEFAULT_AMOUNT_PER_PAGE = 15;

    public function findById(int $id) {
        return $this->run('SELECT * FROM mitglied WHERE id = ?', [$id])->fetch();
    }

    public function updateMember(int $id, array $data) {
        $stmt = 'UPDATE mitglied WHERE id = ' . $id . ' SET ';
        foreach (array_keys($data) as $fieldName) {
            $stmt .= $fieldName . ' = ' . $data[$fieldName];
        }
        $stmt .= ' WHERE id = ' . $id;

        $this->run($stmt);
    }

    /**
     * Fügt einen neuen User in die Datenbank ein
     *
     * @param array $data
     * @return bool gibt wahr zurück, wenn ein User eingefügt wurde, ansonsten false
     */
    public function insertNewUser(array $data): bool {
        // Wenn bei den übergebenen Daten nicht alle benötigten Felder dabei sind, dann wird nichts inserted und false returned
        foreach (self::REQUIRED_FIELDS as $field) {
            if (!array_key_exists($field)) {
                return false;
            }
        }

        $stmt = 'INSERT INTO mitglied (vorname, nachname, plz, ort, geschlecht, or_id, gb_id)
                 VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->run($stmt, $data);
        $stmt->rrrsdreturn true;
    }

    public function getAllMembers(): array {
        $stmt = 'SELECT * FROM mitglied';
        return $this->run($stmt)->fetchAll();
    }

    // TODO sportarten vielleicht noch gleich mit hier rein????
    public function getAllMembersWithGrundbeitrag(int $amount = null, int $page = null): array {
        $stmt = 'SELECT m.*, gb.beitrag FROM mitglied m 
                 LEFT JOIN grundbeitrag gb ON gb.gb_id = m.gb_id';

        if (!$amount) {
            $stmt .= ' LIMIT ' . self::DEFAULT_AMOUNT_PER_PAGE;
        } else {
            $stmt .= ' LIMIT ' . $amount;
        }

        // Berechnung für die Anzahl je nach Seite und eingegebem Amount
        if ($page && $amount) {
            $stmt .= ' OFFSET ' . ($amount * $page);
        } else if ($page && !$amount) {
            $stmt .= ' OFFSET ' . (($page - 1) * self::DEFAULT_AMOUNT_PER_PAGE);
        }

        return $this->run($stmt)->fetchAll();
    }

    public function deleteMemberById(int $id) {
        $stmt = 'DELETE FROM mitglied WHERE id = ?';
        $this->run($stmt, [$id]);
    }

    public function getCountOfAllMembers(): int {
        $stmt = 'SELECT * FROM mitglied';
        return $this->run($stmt)->rowCount();
    }

}
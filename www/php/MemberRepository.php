<?php
include __DIR__ . '/Database.php';

class MemberRepository extends Database
{
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

    public function insertNewUser(array $data) {
        $stmt = 'INSERT INTO mitglied (vorname, nachname, plz, ort, geschlecht, or_id, gb_id)
                 VALUES (?, ?, ?, ?, ?, ?, ?)';
        $this->run($stmt, $data);
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
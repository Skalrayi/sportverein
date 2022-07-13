<?php
require_once __DIR__ . '/../Database.php';

class MemberModel extends Database
{
    private const REQUIRED_FIELDS = ['forename', 'surname', 'zip', 'city', 'gender'];
    private const DEFAULT_AMOUNT_PER_PAGE = 15;

    public function findById(int $id) {
        return $this->run('SELECT * FROM mitglied WHERE mi_id = ?', [$id])->fetch();
    }

    public function getSportartenByMemberId(int $memberId): array {
        $stmt = 'SELECT s.sa_id, s.abteilung 
                FROM mitglied_sportart ms 
                INNER JOIN sportart s
                ON s.sa_id = ms.sa_id WHERE ms.mi_id = ?';
        return $this->run($stmt, [$memberId])->fetchAll();
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

        // die sportarten, die man vor dem Edit hat
        $sportarten = $this->getSportartenByMemberId($id);

        // sportarten aus dem Post Array
        $postSportarten = $data['sport'];
        var_dump($postSportarten);
        var_dump($sportarten);

        // checken was nicht mehr vorhanden ist
        $sportartenRemoved = [];
        $idsOfSportarten = [];

        foreach ($sportarten as $sportart) {
            // mappen der ids für den unteren loop
            $idsOfSportarten[] = $sportart['sa_id'];
            if (!in_array($sportart['sa_id'], $postSportarten)) {
                $sportartenRemoved[] = $sportart;
            }
        }

        // checken was neu dazu kommt
        $sportartenAdded = [];
        foreach ($postSportarten as $postSportart) {
            if (!in_array($postSportart, $idsOfSportarten)) {
                $sportartenAdded[] = $postSportart;
            }
        }

        var_dump($sportartenRemoved, $sportartenAdded);

        $vorname = $data['forename'];
        $nachname = $data['surname'];
        $plz = $data['zip'];
        $ort = $data['city'];
        $geschlecht = $data['gender'];

        $stmt = 'UPDATE mitglied SET vorname = ?, nachname = ?, plz = ?, ort = ?, geschlecht = ? WHERE mi_id = ?';

        $this->run($stmt, [$vorname, $nachname, $plz, $ort, $geschlecht, $id]);
        return true;
    }

    /**
     * Fügt einen neuen User in die Datenbank ein
     *
     * @param array $data
     * @return bool gibt wahr zurück, wenn ein User eingefügt wurde, ansonsten false
     */
    public function insertNewUserWithSportarten(array $data): bool {
        //sportarten aus dem datenarray holen
        $sportarten = $data['sport'];
        // dann für den insert des users, die Sportarten aus dem Datenarray raushauen
        unset($data['sport']);

        $stmt = 'INSERT INTO mitglied (vorname, nachname, plz, ort, geschlecht, or_id, gb_id)
                 VALUES (?, ?, ?, ?, ?, ?, ?)';
        // erst den neuen User inserten
        $this->run($stmt, $data);

        // letzte Id raussuchen, die gerade insertet wurde, ist das neueste Mitglied
        $lastInsertId = (int)$this->pdo->lastInsertId();

        // für die Sportarten, jeweils einen beziehungseintrag
        foreach ($sportarten as $sportart) {
            $this->insertMemberSportart($lastInsertId, (int)$sportart);
        }

        return true;
    }

    /**
     * Fügt in die Beziehungstabelle memberid und sportartid ein
     * @param int $memberId
     * @param int $sportartId
     * @return bool
     */
    private function insertMemberSportart(int $memberId, int $sportartId): bool
    {
        $stmt = 'INSERT INTO mitglied_sportart (mi_id, sa_id) VALUES(?, ?)';
        $this->run($stmt, [$memberId, $sportartId]);
        return true;
    }

    /**
     * Gibt alle Member aus mit allen nötigen Informationen
     *
     * @param int|null $page
     * @return array
     */
    public function getAllMembers(int $page = null): array {
        $stmt = 'SELECT m.*, GROUP_CONCAT(s.abteilung) as abteilung FROM mitglied m 
                LEFT JOIN mitglied_sportart ms ON m.mi_id = ms.mi_id
                LEFT JOIN sportart s ON ms.sa_id = s.sa_id
                GROUP BY m.mi_id';

        // limit immer auf default amount
        $stmt .= ' LIMIT ' . self::DEFAULT_AMOUNT_PER_PAGE;

        // Berechnung für die Anzahl je nach Seite
        if ($page) {
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

    /**
     * Gibt Member zurück, die dem Suchkriterium entsprechen
     * @param string $searchParameter
     * @return array
     */
    public function getAllMembersWithSearchParameter(string $searchParameter): array
    {
        $stmt = 'SELECT m.*, GROUP_CONCAT(s.abteilung) as abteilung FROM mitglied m 
                LEFT JOIN mitglied_sportart ms ON m.mi_id = ms.mi_id
                LEFT JOIN sportart s ON ms.sa_id = s.sa_id
         WHERE vorname LIKE ? 
           OR nachname LIKE ?
           OR plz LIKE ?
           OR ort LIKE ?
           GROUP BY m.mi_id';

        //überall wildcards
       return $this->run($stmt, [
            '%' . $searchParameter . '%',
            '%' . $searchParameter . '%',
            '%' . $searchParameter . '%',
            '%' . $searchParameter . '%'
        ])->fetchAll();
    }

    public function getSportarten(): array
    {
        $stmt = 'SELECT sa_id, abteilung FROM sportart';
        return $this->run($stmt)->fetchAll();
    }

}
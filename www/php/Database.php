<?php
class Database {
    protected $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=db;dbname=2021sportverein', 'root', 'root');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    // vereinfachte Funktion für prepared statements
    public function run(string $sql, array $args = null) {
        if (!$args) {
            return $this->pdo->query($sql);
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}

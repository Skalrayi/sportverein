<?php
class Database {
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            try {
                self::$instance = new PDO('mysql:host=db;dbname=2021sportverein', 'root', 'root');
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage();
                die();
            }
        }
        return self::$instance;
    }
}

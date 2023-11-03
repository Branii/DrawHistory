<?php 

class Database {
    private static $pdo;

    public function openConnection() : Mixed {
        try {
            self::$pdo = new PDO(
                Config::getBase(), 
                Config::getUser(), 
                Config::getPass()
            );
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$pdo;
        } catch (PDOException $th) {
             return $th->getMessage();
        }
    }

    public function closeConnection() {
        self::$pdo = null;
    }
}

?>
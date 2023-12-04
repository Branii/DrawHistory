<?php 
class Database {
    private static $pdo;
    public static function openConnection(String $databaseName) : PDO | STRING {
        try {
            self::$pdo = new PDO (
                Config::getBase($databaseName), 
                Config::getUser(), 
                Config::getPass()
            );
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$pdo;
        } catch (PDOException $th) {
             return $th->getMessage();
        }
    }

    public static function closeConnection() {
        self::$pdo = null;
    }
}

?>
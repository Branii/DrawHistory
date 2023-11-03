<?php 

class Config {
    
    private static $user = "root";
    private static $pass = "";
    private static $base = "mysql:host=localhost;dbname=drawhistory";

    public static function getUser() {
        return self::$user;
    }

    public static function getPass() {
        return self::$pass;
    }

    public static function getBase() {
        return self::$base;
    }
    
}

?>
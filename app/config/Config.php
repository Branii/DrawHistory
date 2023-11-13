<?php 

class Config {
    
    private static $user = "root";
    private static $pass = "";

    public static function getUser() {
        return self::$user;
    }

    public static function getPass() {
        return self::$pass;
    }

    public static function getBase(String $database = null) {
        return "mysql:host=localhost;dbname={$database}";
    }
    
}

?>
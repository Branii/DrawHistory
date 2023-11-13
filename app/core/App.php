<?php 

class App {

    protected static $game = "game";
    protected static $action = 'index';
    protected static $params = [];
    
    public static function run() {
        self::getUrl();
        self::controllerExists();
    }

    public static function getUrl(){
        $publicUrl = trim($_SERVER['REQUEST_URI'], '/') ?? null;
        $publicUrl = explode('/', $publicUrl);
        self::$game = isset($publicUrl[2]) ? $publicUrl[2] : "post";
        self::$action = isset($publicUrl[3]) ? $publicUrl[3] : "index";
        self::$params = [!empty($publicUrl[4]) ? $publicUrl[4] : null];
    }

    public static function controllerExists() {

        if(file_exists(CORE . self::$game . ".php")) {
            self::$game = new self::$game;
            if(method_exists(self::$game, self::$action)) {
                call_user_func_array([self::$game, self::$action], self::$params);
            } else {
                echo json_encode(["code"=> 404, "message"=>"Resource not found"]);
            }
        } else {
            echo json_encode(["code"=> 404, "message"=>"Resource not found"]);
        }
    }  
}

?>
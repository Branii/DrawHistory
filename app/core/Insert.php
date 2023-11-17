<?php

use function PHPSTORM_META\type;

class Insert extends App { // http://localhost/drawhistory/v1/post/5d/all5/

    public function index($params = null){
     echo ($params == null) ?? "Draw History 5D Services v1.0.1"; 
    }

    public function fived($params = null){

        if($params == null){
            echo json_encode(["code"=> 404, "message"=>"Draw number not found"]);
        }elseif (count(str_split($params)) < 5) {
            echo json_encode(["code"=> 401, "message"=>"Draw number < 5 digits"]);
        }elseif (count(str_split($params)) > 5) {
            echo json_encode(["code"=> 401, "message"=>"Draw number > 5 digits"]);
        }else{

            $drawNumber = array_map('intval', str_split($params));
            $data = InsertData::render($drawNumber);
            Model::standardModel($data,(string)$params);
            echo Utils::Message($params);
        }
    }

    public function others($params = null){
        // handle other games here
    }
}
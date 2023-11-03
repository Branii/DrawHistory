<?php

class FiveD extends App { // http://localhost/drawhistory/v1/post/5d/all5/

    public function index($params = null){
     echo ($params == null) ?? "Draw History 5D Services v1.0.1"; 
    }

    public function all5($params = null){
        $params = array_map('intval', str_split($params));
        $data = Executor::render($params);
        echo json_encode($data);
    }

    public function all4(){
        echo "Royal5 All4";
    }

    public function all3(){
        echo "Royal5 All3";
    }

    public function all2(){
        echo "Royal5 All2";
    }

    public function bsoe(){
        echo "Royal5 BSOE";
    }

    public function dragontiger(){
        echo "Royal5 DragonTiger";
    }

    public function stud(){
        echo "Royal5 Stud";
    }

    public function threecard(){
        echo "Royal5 ThreeCard";
    }

    public function notfount(){
        echo "Not Found!";
    }

}
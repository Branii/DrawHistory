<?php

class Post extends App { // http://localhost/drawhistory/v1/post/5d/all5/

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
             $data = Executor::render($drawNumber);
            // Model::InsertAll($data['all5'],$params, "all5_tbl", "drawhistory", true); // all5
            // Model::InsertAll($data['all4']['first4'],$params, "first4_tbl", "drawhistory", true); //all4 [first4]
            // Model::InsertAll($data['all4']['last4'],$params, "last4_tbl", "drawhistory", true);
            // Model::InsertAll($data['all3']['first3'],$params, "first3_tbl", "drawhistory", false);
            // Model::InsertAll($data['all3']['mid3'],$params, "mid3_tbl", "drawhistory", false);
            // Model::InsertAll($data['all3']['last3'],$params, "last3_tbl", "drawhistory", false);
            // Model::InsertAll($data['all2']['first2'], $params, "first2_tbl", "drawhistory", false);
            // Model::InsertAll($data['all2']['last2'], $params, "last2_tbl", "drawhistory",false);
            // $ThreeCard = Utils::InsertThreeCard(Utils::findWinner($data['threecard']['first3']), Utils::findWinner($data['threecard']['mid3']), Utils::findWinner($data['threecard']['last3']));
            // Model::InsertAll($ThreeCard, $params, "threecard_tbl", "drawhistory",false);
            // $BSOE = Utils::InsertBSOE($data['bsoe']['firstBsoe'],$data['bsoe']['secondBsoe']);
            // Model::InsertAll($BSOE , $params, "bsoe_tbl", "drawhistory",false);
            // Model::InsertAll($data['stud'],$params, "stud_tbl", "drawhistory", true); // stud
            // Model::InsertAll($data['dragontiger'] , $params, "dratig_tbl", "drawhistory",false); 
            // echo json_encode(["code"=> 200, "message"=>"History updated"]);

           echo json_encode($data);
        }

    }
}
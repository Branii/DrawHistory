<?php

class Select extends App { // http://localhost/drawhistory/v1/select/fived

    public function index($params = null){
     echo ($params == null) ?? "Draw History 5D Services v1.0.1"; 
    }

    public function fived($params = null){

     $data = SelectData::render("drawhistory");
     echo json_encode($data);
     //Model::InsertAll($data['all5'],$params, "all5_tbl", "drawhistory", true); // all5

    }
}
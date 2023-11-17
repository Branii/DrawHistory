<?php 

class Model{

    public static function InsertAll(Array $array, String $drawNumber, String $table, String $databaseName, bool $flag){
        Query::updateHitory($array, $drawNumber, $table, $databaseName, $flag);
    }

    public static function SelectAll(String $table, String $databaseName){
        return Query::selectHistory($table,$databaseName);
    }

    public static function standardModel(Array $data, String $params) {

        return[
            Model::InsertAll($data['all5'],$params, "all5_tbl", "drawhistory", true), // all5
            Model::InsertAll($data['all4']['first4'],$params, "first4_tbl", "drawhistory", true), //all4 [first4]
            Model::InsertAll($data['all4']['last4'],$params, "last4_tbl", "drawhistory", true),
            Model::InsertAll($data['all3']['first3'],$params, "first3_tbl", "drawhistory", false),
            Model::InsertAll($data['all3']['mid3'],$params, "mid3_tbl", "drawhistory", false),
            Model::InsertAll($data['all3']['last3'],$params, "last3_tbl", "drawhistory", false),
            Model::InsertAll($data['all2']['first2'], $params, "first2_tbl", "drawhistory", false),
            Model::InsertAll($data['all2']['last2'], $params, "last2_tbl", "drawhistory",false),
            Model::InsertAll(Query::queryParams($data)['threecard'], $params, "threecard_tbl", "drawhistory",false),
            Model::InsertAll(Query::queryParams($data)['BSOE_first2'] , $params, "bsoe_first2_tbl", "drawhistory",false),
            Model::InsertAll(Query::queryParams($data)['BSOE_last2'] , $params, "bsoe_last2_tbl", "drawhistory",false),
            Model::InsertAll(Query::queryParams($data)['BSOE_first3'] , $params, "bsoe_first3_tbl", "drawhistory",false),
            Model::InsertAll(Query::queryParams($data)['BSOE_last3'] , $params, "bsoe_last3_tbl", "drawhistory",false),
            Model::InsertAll(Query::queryParams($data)['BSOE_sumAll3'] , $params, "bsoe_sumall3_tbl", "drawhistory",false),
            Model::InsertAll(Query::queryParams($data)['BSOE_sumAll5'] , $params, "bsoe_sumall5_tbl", "drawhistory",false),
            Model::InsertAll($data['stud'],$params, "stud_tbl", "drawhistory", true), // stud
            Model::InsertAll($data['dragontiger'] , $params, "dratig_tbl", "drawhistory",false),
            Model::InsertAll(Query::queryParams($data)['twosides'] , $params, "twosides_tbl", "drawhistory",false)
        ];
    }
}




?>
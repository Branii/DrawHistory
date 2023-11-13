<?php 

class Model{

    public static function InsertAll(Array $array, String $drawNumber, String $table, String $databaseName, bool $flag){
        Query::updateHitory($array, $drawNumber, $table, $databaseName, $flag);
    }

    
}




?>
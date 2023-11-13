<?php
 
class Query {

    public static function generateInsertQuery(String $table, Array $data) { 
        $columns = array_keys($data); 
        $values = array_values($data); 
        $placeholders = "?". str_repeat(",?", count($values) - 1); // add ? for each value (except last
        $query = "INSERT INTO $table (" . implode(', ', $columns) . ") VALUES ($placeholders)"; 
        return $query; 
    } 

    public static function getLastList(String $table, String $databaseName, bool $flag) : Mixed {

        if($flag){
            $sql = "SELECT * FROM $table ORDER BY hid DESC LIMIT 1";
            $stmt = Database::openConnection($databaseName)->prepare($sql);
            $stmt->execute();
            $lastRowList = $stmt->fetch(PDO::FETCH_ASSOC);
            return $lastRowList;
        }else{
            return false;
        }

    }

    public static function updateHitory(Array $array, String $drawNumber, String $table,  String $databaseName, bool $flag){

         $lastRowList = self::getLastList($table, $databaseName, $flag);
         $winner = Utils::getWinner($array);
         if($lastRowList != false){
            $newList = Utils::updateWinner1($lastRowList, $winner, $drawNumber);
            $query = self::generateInsertQuery($table, $newList);
            Database::openConnection($databaseName)->prepare($query)->execute(array_values($newList));
            //echo $query;
         }else{
            $array['date_created'] = Utils::getTodaysDate(); 
            $array['winning'] = implode(",", str_split($drawNumber));
            unset($array['hid']);
            $query = self::generateInsertQuery($table, $array);
            Database::openConnection($databaseName)->prepare($query)->execute(array_values($array));
         }
    }
}
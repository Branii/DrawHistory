<?php
class Query {
    public static function generateInsertQuery(String $table, Array $data) { 
        $columns = array_keys($data); 
        $values = array_values($data); 
        $placeholders = str_repeat("?,", count($values) - 1) . "?"; // add ? for each value (except last
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

            $newList = Utils::updateWinner($lastRowList, $winner, $drawNumber);
            $query = self::generateInsertQuery($table, $newList);
            Database::openConnection($databaseName)->prepare($query)->execute(array_values($newList));

         }else{
            $array['date_created'] = Utils::getTodaysDate(); 
            $array['winning'] = implode(",", str_split($drawNumber));
            unset($array['hid']);
            $query = self::generateInsertQuery($table, $array);
            Database::openConnection($databaseName)->prepare($query)->execute(array_values($array));
         }
    }

    public static function selectHistory(String $table, String $databaseName) : Mixed {
        $sql = "SELECT * FROM $table ORDER BY hid DESC LIMIT 10";
        $stmt = Database::openConnection($databaseName)->prepare($sql);
        $stmt->execute();
        $RowList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $RowList;
    }

    public static function InsertThreeCard(String $first, String $mid, String $last) {  //  1 winner

        $data = array(
            "first3" => $first,
            "mid3" => $mid,
            "last3" => $last
        );
        return $data; 

    }

    public static function InsertBSOE(String $param1 = null, String $param2 = null, String $param3 = null, Int $len) {  //  

        if($len == 2){

            $data1 = explode(" ", $param1);
            $data = array(
                "num1" => $data1[0] . " " . $data1[1],
                "num2" => $data1[2] . " " . $data1[3]
            );return $data; 

        }elseif($len == 3){

            $data1 = explode(" ", $param1);
            $data = array(
                'sum' => $data1[0],
                "num1" => $data1[1] . " " . $data1[2],
                "num2" => $data1[3] . " " . $data1[4],
                "num3" => $data1[5] . " " . $data1[6]
            );return $data;

        }elseif($len == 4){

            $data1 = explode(" ", $param1);
            $data2 = explode(" ", $param2);
            $data3 = explode(" ", $param3);
            $data = array(
                "first3sum"   => $data1[0],
                "first3form"  => $data1[1].  " " . $data1[2],
                "mid3sum"     => $data2[0],
                "mid3form"    => $data2[1] . " " . $data2[2],
                "last3sum"    => $data3[0],
                "last3form"   => $data3[1] . " " . $data3[2],
            );
            return $data;

        }elseif($len == 5){
            $data1 = explode(" ", $param1);
            $data = array(
                "sum"   => $data1[0],
                "param"  => $data1[1].  " " . $data1[2]
            );
            return $data;
        }

    }

    public static function Insert2Sides(String $sum, String $dragontigertie, String $first, String $mid, String $last) {  //  1 winner

        $data = array(
            'sum' => $sum,
            "dragontigertie" => $dragontigertie,
            "first3" => $first,
            "mid3" => $mid,
            "last3" => $last
        );
        return $data; 

    }

    public static function queryParams(Array $data){
        return [
            'BSOE_first2' => Query::InsertBSOE($data['bsoe']['first2'],null, null, 2),
            'BSOE_last2' => Query::InsertBSOE($data['bsoe']['last2'],null, null, 2),
            'BSOE_first3' => Query::InsertBSOE($data['bsoe']['first3'],null, null, 3),
            'BSOE_last3' => Query::InsertBSOE($data['bsoe']['last3'],null, null, 3),
            'BSOE_sumAll3' => Query::InsertBSOE($data['bsoe']['sumall3']['first3'],$data['bsoe']['sumall3']['mid3'],$data['bsoe']['sumall3']['last3'],4),
            'BSOE_sumAll5' => Query::InsertBSOE($data['bsoe']['sumall5'],null,null,5),
            'threecard' => Query::InsertThreeCard(Utils::findWinner($data['threecard']['first3']), Utils::findWinner($data['threecard']['mid3']), Utils::findWinner($data['threecard']['last3'])),
            'twosides' => Query::Insert2Sides($data['twosides']['sum'],$data['twosides']['dragontigertie'], Utils::findWinner($data['twosides']['first3']), Utils::findWinner($data['twosides']['mid3']), Utils::findWinner($data['twosides']['last3']))
        ];
    }
}
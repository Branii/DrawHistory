<?php
 
class Utils {

    public static function findPattern(Array $pattern, Array $drawNumbers, Int $index, Int $slice) : Bool {  // find patterns in drawsNumbers
        $drawNumbers = array_count_values(array_slice($drawNumbers, $index, $slice));
        sort($drawNumbers);sort($pattern);
        return $drawNumbers === $pattern;
    }

    public static function sumPattern(Array $drawNumbers, Int $index, Int $slice) : Int {  // sum pattern
        $drawNumber = array_slice($drawNumbers, $index, $slice);
        return array_sum($drawNumber);
    }

    public static function spanPattern(Array $drawNumber, Int $index, Int $slice) : Int { // subtract max and min pattern
        $drawNumbers = array_slice($drawNumber, $index, $slice);
        sort($drawNumbers);
        return max($drawNumbers) - min($drawNumbers);
    }

    public static function bigSmallOddEvenPattern(Array $drawNumber, Int $slice, Int $index) : String { // small|big even|odd pattern
        $part = explode(",", implode(",",  array_slice($drawNumber, 0, $slice))); 
        $num1 = intval($part[$index]);
        return ($num1 < 5) ? ($num1 % 2 == 0 ? "S E" : "S O") : ($num1 > 4 ? ($num1 % 2 == 0 ? "B E" : "B O") : "not found");
    }

    public static function dragonTigerTiePattern(Int $idx1, Int $idx2, Array $drawNumber) : String { // dragon|tiger|tie pattern
        $drawNumber = explode(",", implode(",",$drawNumber));
        $v1 = $drawNumber[$idx1];
        $v2 = $drawNumber[$idx2];
        return ($v1 > $v2) ? "D" : (($v1 == $v2) ? "Tie" : "T");
    }

    public static function findStreakPattern(Array $drawNumber, Int $index, Int $slice, Int $streakCount) : Bool { // streak pattern
        $drawNumber = array_slice($drawNumber, $index, $slice);
        $count = 0; $n = count($drawNumber); 
        sort($drawNumber);
        if (($drawNumber[0] == 0 && $drawNumber[$n - 1] == 9) || ($drawNumber[0] == 9 && $drawNumber[$n - 1] == 0)) { 
            $count++; 
        } 
        for ($i = 0; $i < $n - 1; $i++) { 
            if ($drawNumber[$i] == $drawNumber[$i + 1] - 1) { 
                $count++; 
            } 
        }return $count == $streakCount; 
    }

    //mess with db samll below
    public static function getCurrentRowValues(Array $DBvalue, String $Gameresult, String $gameType) : String { // get current row values
        $result = ($DBvalue[$gameType] == $gameType && $Gameresult == $gameType) ? $gameType :
        (($DBvalue[$gameType] == $gameType && $Gameresult != $gameType) ? "1" :
        (($DBvalue[$gameType] != $gameType && $Gameresult == $gameType) ? $gameType :
        (intval($DBvalue[$gameType]) + 1)));
        return $result;
    }

    public static function updateWinner1(Array $array, String $winner, String $drawNumber) {  //  1 winner
        foreach ($array as $key => $value) { 
            if (is_numeric($value)) { 
                $array[$key] = (int)$value + 1; 
            } else { 
                $array[$key] = 1; 
            } 
        } 
        $array[$winner]  = $winner; 
        $array['date_created'] = Utils::getTodaysDate(); 
        $array['winning'] = implode(",", str_split($drawNumber));
        unset($array['hid']);
        return $array; 
    }

    public static function updateRaw(Array $array, String $drawNumber) {  //  1 winner
        $array['date_created'] = Utils::getTodaysDate(); 
        $array['winning'] = implode(",", str_split($drawNumber));
        unset($array['hid']);
        return $array; 
    }

    public static function getTodaysDate() : String { // get todays date
        return date("Y-m-d");
    }

    public static function getWinner(Array $array) : String { // get todays time
        return implode(",", array_keys(array_filter($array, function($value) {return $value !== 1;})));
       
    }

    public static function findWinner($functions) { 
        foreach ($functions as $key => $function) { 
            if ($functions[$key]) { 
                return $key; 
            } 
        } 
    } 

    public static function InsertThreeCard(String $first, String $mid, String $last) {  //  1 winner

        $data = array(
            "threefirst" => $first,
            "threemid" => $mid,
            "threelast" => $last
        );
        return $data; 

    }

    public static function InsertBSOE(String $param1, String $param2) {  //  

        $data1 = explode(" ", $param1);
        $data2 = explode(" ", $param2);
        $data = array(
            "param1" => $data1[0],
            "param2" => $data1[1],
            "param3" => $data2[0],
            "param4"  => $data2[1],
        );
        return $data; 

    }

}
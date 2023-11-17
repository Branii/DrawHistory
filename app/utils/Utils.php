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

    public static function bigSmallOddEvenPattern(Array $drawNumber, Int $start, Int $slice, Int $index1, Int $index2) : String { // small|big even|odd pattern
        $part = explode(",", implode(",",  array_slice($drawNumber, $start, $slice))); 
        $num1 = intval($part[$index1]);
        $num2 = intval($part[$index2]);
        $first2 =  ($num1 < 5) ? ($num1 % 2 == 0 ? "S E" : "S O") : ($num1 > 4 ? ($num1 % 2 == 0 ? "B E" : "B O") : "not found");
        $last2 =  ($num2 < 5) ? ($num2 % 2 == 0 ? "S E" : "S O") : ($num2 > 4 ? ($num2 % 2 == 0 ? "B E" : "B O") : "not found");
        return $first2 . " " . $last2;
    }

    public static function bigSmallOddEvenPattern3(Array $drawNumber, Int $start, Int $slice, Int $index1, Int $index2, String $index3) : String { // small|big even|odd pattern
        
        $Number  = array_slice($drawNumber, $start, $slice);
        $sum = array_sum($Number);
        $part = explode(",", implode(",",  array_slice($drawNumber, $start, $slice))); 
        $num1 = intval($part[$index1]);
        $num2 = intval($part[$index2]);
        $num3 = intval($part[$index3]);
        $first2 = ($num1 < 5) ? ($num1 % 2 == 0 ? "S E" : "S O") : ($num1 > 4 ? ($num1 % 2 == 0 ? "B E" : "B O") : "not found");
        $last2 =  ($num2 < 5) ? ($num2 % 2 == 0 ? "S E" : "S O") : ($num2 > 4 ? ($num2 % 2 == 0 ? "B E" : "B O") : "not found");
        $last3 =  ($num3 < 5) ? ($num3 % 2 == 0 ? "S E" : "S O") : ($num3 > 4 ? ($num3 % 2 == 0 ? "B E" : "B O") : "not found");
        return $sum . " " .$first2 . " " . $last2 . " " . $last3;

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

    public static function updateWinner(Array $array, String $winner, String $drawNumber) {  //  1 winner
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

    // public static function updateWinner1($array, $winner) { 
    //     foreach ($array as $key => $value) { 
    //         if (is_numeric($value)) { 
    //             $array[$key] = (int)$value + 1; 
    //         } else { 
    //             $array[$key] = 1; 
    //         } 
    //     } 
    //     $array[$winner]  = $winner; 
    //     return $array; 
    // } 

    public static function updateRaw(Array $array, String $drawNumber) {  //  1 winner
        $array['date_created'] = Utils::getTodaysDate(); 
        $array['winning'] = implode(",", str_split($drawNumber));
        unset($array['hid']);
        return $array; 
    }

    public static function getTodaysDate() : String { // get todays date
        return date("Y-m-d H:i:s");
    }

    public static function getWinner(Array $array) { // get winnter

        foreach ($array as $key => $function) { 
            if ($array[$key]) { 
                return $key; 
            } 
        } 
       
    }

    public static function findWinner($functions) { 
        foreach ($functions as $key => $function) { 
            if ($functions[$key]) { 
                return $key; 
            } 
        } 
    } 
 

    public static function SumAndFindPattern(Array $drawNumber, Int $index, Int $slice, Array $range) : Mixed { // 
        $Number  = array_slice($drawNumber, $index, $slice);
        $sum = array_sum($Number);
        $pattern = ($sum < $range[0]) ? ($sum % 2 == 0 ? "Small Even" : "Small Odd") : ($sum > $range[1] ? ($sum % 2 == 0 ? "Big Even" : "Big Odd") : "not found");
        return $sum . " " . $pattern;
    }

    public static function SumAndFindPattern1(Array $drawNumber, Int $index, Int $slice, Array $range) : Mixed { // 
        $Number  = array_slice($drawNumber, $index, $slice);
        $sum = array_sum($Number);
        $pattern = ($sum < $range[0]) ? ($sum % 2 == 0 ? "S E" : "S O") : ($sum > $range[1] ? ($sum % 2 == 0 ? "B E" : "B O") : "not found");
        return $sum . " " . $pattern;
    }

    public static function Message(String $params){

        return json_encode([
            "code"=> 200, 
            "message"=>"History updated",
            "date_created"=> Utils::getTodaysDate(),
            "drawNumber"=> $params]);

    }

}
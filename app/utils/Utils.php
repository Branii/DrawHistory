<?php
 
class Utils {

    public static function findPattern(Array $pattern, Array $drawNumbers, Int $slice) : Bool {  // find patterns in drawsNumbers
        $drawNumbers = array_count_values(array_slice($drawNumbers, 0, $slice));
        sort($drawNumbers);sort($pattern);
        return $drawNumbers === $pattern ? true : false;
    }

    public static function sumPattern(Array $drawNumbers, Int $slice) : Int {  // sum pattern
        $drawNumber = array_slice($drawNumbers, 0, $slice);
        return array_sum($drawNumber);
    }

    public static function spanPattern(Array $drawNumber, Int $slice) : Int { // subtract max and min pattern
        $drawNumbers = array_slice($drawNumber, 0, $slice);
        return max($drawNumbers) - min($drawNumber);
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

    public static function findStreakPattern(Array $drawNumber,Int $slice, Int $streakCount) : Bool { // streak pattern
        $drawNumber = array_slice($drawNumber, 0, $slice);
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

}
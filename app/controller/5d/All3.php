<?php 

class All3 {

    public function first3sum(Array $drawNumber, Int $slice) : Int {
        return Utils::sumPattern($drawNumber, 0, $slice); // sum first 3
    }

    public function first3minmax(Array $drawNumber, Int $len) : Int {
        return Utils::spanPattern($drawNumber, 0 ,$len); // subtract max and min
    }

    public function first3group3(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([2,1], $drawNumber, 0, $slice); // 1 pair
    }

    public function first3group6(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([1,1,1], $drawNumber, 0,  $slice); // 3 diff
    }

}

?>
<?php 

class All4 {

    public function group24(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([1,1,1,1], $drawNumber, 0, $slice); // no repeat
    }

    public function group12(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([2,1,1], $drawNumber, 0, $slice); // 1 pair, 2 diff
    }

    public function group6(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([2,2], $drawNumber, 0, $slice); // 2 pair
    }

    public function group4(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([3,1], $drawNumber, 0, $slice); // 1 triple, 1 diff
    }

}

?>
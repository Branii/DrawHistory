<?php 

class All5 { 

    public function group120(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([1,1,1,1,1], $drawNumber, 0, $slice); // no repeat
    }

    public function group60(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([2,1,1,1], $drawNumber, 0, $slice); // 1 pair, 3 diff
    }

    public function group30(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([2,2,1], $drawNumber, 0, $slice); // 2 pair, 1 diff
    }

    public function group20(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([3,1,1], $drawNumber, 0, $slice); // 1 triple, 2 diff
    }

    public function group10(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([3,2], $drawNumber, 0, $slice); // 1 triple, 1 pair
    }

    public function group5(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([4,1], $drawNumber, 0, $slice); // 1 quad, 1 diff
    }

}

?>
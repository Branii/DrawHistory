<?php 

class Stud {

    public function studHighCard(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([1,1,1,1,1], $drawNumber, $slice); // stud high card
    }

    public function studOnePair(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([2,1,1,1], $drawNumber, $slice); // stud one pair
    }

    public function studTwoPair(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([2,2,1], $drawNumber, $slice); // stud two pair
    }

    public function studThreeOfAKind(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([3,1,1], $drawNumber, $slice); // stud three of a kind
    }

    public function studFourOfAKind(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([4,1], $drawNumber, $slice); // stud four of a kind
    }

    public function StudStreak(Array $drawNumber, Int $slice, Int $len) : Bool {
         return Utils::findStreakPattern($drawNumber,  $slice, $len); // stud streak
    }   

    public function studGuard(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([3,2], $drawNumber, $slice); // stud guard
    }

}

?>


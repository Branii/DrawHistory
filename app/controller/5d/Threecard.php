<?php 

class Threecard {

    public function Toak(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([3], $drawNumber, 0, $slice); // 3 of a kind
    }

    public function Streak(Array $drawNumber, Int $slice, Int $streakCount) : Bool {
        return Utils::findStreakPattern($drawNumber, 0, $slice, $streakCount); // stud streak 4
    }
    public function Pair(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([2,1], $drawNumber, 0, $slice); // 2 of a kind
    }

    public function Mixed(Array $drawNumber, Int $slice) : Bool {
        return Utils::findPattern([1,1,1], $drawNumber, 0, $slice); // 3 diff
    }

    public function HalfStreak(Array $drawNumber, Int $slice, Int $streakCount) : Bool {
        return Utils::findStreakPattern($drawNumber, 0, $slice, $streakCount); // stud half streak 3
    }

}

?>


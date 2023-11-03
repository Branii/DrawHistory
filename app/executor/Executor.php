<?php 

class Executor {
    public static function render (Array $drawNumber) : Mixed {
        return [
            'all5' => [
                'group120' => Utils::findPattern([1,1,1,1,1], $drawNumber, 5) ? "group120" : 1, // no repeat
                'group60' => Utils::findPattern([2,1,1,1], $drawNumber, 5) ? "group60"   : 1, // 1 pair, 3 diff
                'group30' => Utils::findPattern([2,2,1], $drawNumber, 5) ? "group30"   : 1, // 2 pair, 1 diff
                'group20' => Utils::findPattern([3,1,1], $drawNumber, 5) ? "group20" : 1, // 1 triple, 2 diff
                'group10' => Utils::findPattern([3,2], $drawNumber, 5) ? "group10" : 1, // 1 triple, 1 pair
                'group5' => Utils::findPattern([4,1], $drawNumber, 5) ? "group5" : 1  // 1 quad, 1 diff
            ],
            'all4' => [
                'group24' => Utils::findPattern([1,1,1,1], $drawNumber, 4) ? "group24" : 1, // no repeat
                'group12' => Utils::findPattern([2,1,1], $drawNumber, 4) ? "group12" : 1, // 1 pair, 2 diff
                'group6' => Utils::findPattern([2,2], $drawNumber, 4) ? "group6" :   1, // 2 pair
                'group4' => Utils::findPattern([3,1], $drawNumber, 4) ? "group4" : 1  // 1 triple, 1 diff
            ],
            'all3' => [
                'first3sum' => Utils::sumPattern($drawNumber, 3), // sum first 3
                'first3span' => Utils::spanPattern($drawNumber, 3), // subtract max and min
                'first3group3' => Utils::findPattern([2,1], $drawNumber, 3) ? "group3"   :   1, // 1 pair
                'first3group6' => Utils::findPattern([1,1,1], $drawNumber, 3) ? "group6" : 1 // 3 diff
            ],
            'all2' => [
                'first2sum' => Utils::sumPattern($drawNumber, 2), // sum first 2
                'first2span' => Utils::spanPattern($drawNumber, 2) // span first 2
            ],
            'threecard' => [
                'toak' => Utils::findPattern([3], $drawNumber, 3) ? "" : "", // 3 of a kind
                'streak' => Utils::findStreakPattern($drawNumber, 3, 4) ? "" : "", // stud streak 4
                'pair' => Utils::findPattern([2,1], $drawNumber, 3) ? "" : "", // 2 of a kind
                'mixed' => Utils::findPattern([1,1,1], $drawNumber, 3) ? "" : "", // 3 diff
                'halfStreak' => Utils::findStreakPattern($drawNumber, 3, 3) ? "" : "", // stud half streak 3
            ],
            'bsoe' => [
                'firstBsoe' => Utils::bigSmallOddEvenPattern($drawNumber, 2, 0) ? "" : "", // bis|small|odd|even [0]
                'secondBsoe' => Utils::bigSmallOddEvenPattern($drawNumber, 2, 1) ? "" : "", // bis|small|odd|even [1]
            ],
            'stud' => [
                'highcard' => Utils::findPattern([1,1,1,1,1], $drawNumber, 5) ? "High Card" : 1, // high card [0]
                'onepair' => Utils::findPattern([2,1,1,1], $drawNumber, 5) ? "One Pair" : 1, // pair [1]
                'twopair' => Utils::findPattern([2,2,1], $drawNumber, 5) ? "Two Pair" : 1, // 2 pair [2]
                'threeofakind' => Utils::findPattern([3,1,1], $drawNumber, 5) ? "Three of a Kind" : 1, // 3 of a kind [3]
                'fourcard' => Utils::findPattern([4,1], $drawNumber, 5) ? "Four of A Kind" : 1, // 4 of a kind [4]
                'streak' => Utils::findStreakPattern($drawNumber, 5, 4) ? "Streak" : 1, // streak 4 [5]
                'gourd' => Utils::findPattern([3,2], $drawNumber, 5) ? "Gourd" : 1, // gourd [6]
            ],
            'dragontiger' => [
                '1x2' =>  Utils::dragonTigerTiePattern(0, 1, $drawNumber), // 0 x 1
                '1x3' =>  Utils::dragonTigerTiePattern(0, 2, $drawNumber), // tiger [1]
                '1x4' =>  Utils::dragonTigerTiePattern(0, 3, $drawNumber), // tiger [2]
                '1x5' =>  Utils::dragonTigerTiePattern(0, 4, $drawNumber), // tiger [2]
                '2x3' =>  Utils::dragonTigerTiePattern(1, 2, $drawNumber), // tiger [3]
                '2x4' =>  Utils::dragonTigerTiePattern(1, 3, $drawNumber), // tiger [4]
                '2x5' =>  Utils::dragonTigerTiePattern(1, 4, $drawNumber), // tiger [4]
                '3x4' =>  Utils::dragonTigerTiePattern(2, 3, $drawNumber), // tiger [5]
                '3x5' =>  Utils::dragonTigerTiePattern(2, 4, $drawNumber), // tiger [5]
                '4x5' =>  Utils::dragonTigerTiePattern(3, 4, $drawNumber) // tiger [5]
            ],
        ];
    }
}

?>
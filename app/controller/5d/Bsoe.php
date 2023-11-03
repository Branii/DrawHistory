<?php 

class Bsoe {

    public function firstBsoe(Array $drawNumber, Int $index) : String {
        return Utils::bigSmallOddEvenPattern($drawNumber, 2, $index); // bis|small|odd|even [0]
    }

    public function secondBsoe(Array $drawNumber, Int $index) : String {
        return Utils::bigSmallOddEvenPattern($drawNumber, 2,  $index); // bis|small|odd|even [1]
    }

}

?>


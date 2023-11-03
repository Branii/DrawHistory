<?php 

class All2 {

    public function first2sum(Array $drawNumber, Int $slice) : Bool {
        return Utils::sumPattern($drawNumber, $slice); // sum first 2
    }

    public function first2span(Array $drawNumber, Int $slice) : Bool {
        return Utils::spanPattern($drawNumber, $slice); // span first 2
    }

}

?>


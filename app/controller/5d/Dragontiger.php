<?php 

class Dragontiger {

    public function _1x2(Array $drawNumber) : String {
        return Utils::dragonTigerTiePattern(0, 1, $drawNumber); // 0 x 1
    }

    public function _1x3(Array $drawNumber) : String {
        return Utils::dragonTigerTiePattern(0, 2, $drawNumber); // 0 x 2
    }

    public function _1x4(Array $drawNumber) : String {
        return Utils::dragonTigerTiePattern(0, 3, $drawNumber); // 0 x 3
    }

    public function _1x5(Array $drawNumber) : String {
        return Utils::dragonTigerTiePattern(0, 4,$drawNumber); // 0 x 4
    }

    public function _2x3(Array $drawNumber) : String {
        return Utils::dragonTigerTiePattern(1, 2, $drawNumber); // 1 x 2
    }

    public function _2x4(Array $drawNumber) : String {
        return Utils::dragonTigerTiePattern(1, 3, $drawNumber); // 1 x 3
    }

    public function _2x5(Array $drawNumber) : String {
        return Utils::dragonTigerTiePattern(1, 4, $drawNumber); // 1 x 4
    }

    public function _3x4(Array $drawNumber) : String {
        return Utils::dragonTigerTiePattern(2, 3, $drawNumber); // 2 x 3
    }

    public function _3x5(Array $drawNumber) : String {
        return Utils::dragonTigerTiePattern(2, 4, $drawNumber); // 2 x 4
    }

    public function _4x5(Array $drawNumber) : String {
        return Utils::dragonTigerTiePattern(3, 4, $drawNumber); // 3 x 4
    }

}

?>


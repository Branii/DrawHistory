<?php 

$g120 = ($value['g120'] == "g120" && $drawNumber == "g120") ? "g120" :
(($value['g120'] == "g120" && $drawNumber != "g120") ? "1" :
(($value['g120'] != "g120" && $drawNumber == "g120") ? "g120" :
(intval($value['g120']) + 1)));

$g60 = ($value['g60'] == "g60" && $drawNumber == "g60") ? "g60" :
(($value['g60'] == "g60" && $drawNumber != "g60") ? "1" :
(($value['g60'] != "g60" && $drawNumber == "g60") ? "g60" :
(intval($value['g60']) + 1)));

$g30 = ($value['g30'] == "g30" && $drawNumber == "g30") ? "g30" :
(($value['g30'] == "g30" && $drawNumber != "g30") ? "1" :
(($value['g30'] != "g30" && $drawNumber == "g30") ? "g30" :
(intval($value['g30']) + 1)));

$g20 = ($value['g20'] == "g20" && $drawNumber == "g20") ? "g20" :
(($value['g20'] == "g20" && $drawNumber != "g20") ? "1" :
(($value['g20'] != "g20" && $drawNumber == "g20") ? "g20" :
(intval($value['g20']) + 1)));

$g10 = ($value['g10'] == "g10" && $drawNumber == "g10") ? "g10" :
(($value['g10'] == "g10" && $drawNumber != "g10") ? "1" :
(($value['g10'] != "g10" && $drawNumber == "g10") ? "g10" :
(intval($value['g10']) + 1)));

$g5 = ($value['g5'] == "g5" && $drawNumber == "g5") ? "g5" :
(($value['g5'] == "g5" && $drawNumber != "g5") ? "1" :
(($value['g5'] != "g5" && $drawNumber == "g5") ? "g5" :
(intval($value['g5']) + 1)));



if($stmt->rowCount() > 0){
    $data  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $params = array();
    foreach ($data as $value) {

       $g120 = Utils::getCurrentRowValues($value, $result, "g120");
       $g60  = Utils::getCurrentRowValues($value, $result, "g60");
       $g30  = Utils::getCurrentRowValues($value, $result, "g30");
       $g20  = Utils::getCurrentRowValues($value, $result, "g20");
       $g10  = Utils::getCurrentRowValues($value, $result, "g10");
       $g5   = Utils::getCurrentRowValues($value, $result, "g5");
       $params = [$g120,$g60,$g30,$g20,$g10,$g5];

    }
}else{

}




?>
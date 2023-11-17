<?php 

class SelectData {
    public static function render ($databaseName) : Mixed {
        return [
            'all5' => Query::selectHistory("all5_tbl",$databaseName),
            'all4' => [
               'first4' => Query::selectHistory("first4_tbl",$databaseName),
               'last4' => Query::selectHistory("last4_tbl",$databaseName),
            ],
            'all3' => [
               'first3' => Query::selectHistory("first3_tbl",$databaseName),
               'mid3' => Query::selectHistory("mid3_tbl",$databaseName),
               'last3' => Query::selectHistory("last3_tbl",$databaseName)
            ], 
            'all2' => [
                'first2' => Query::selectHistory("first2_tbl",$databaseName),
                'last2' => Query::selectHistory("last2_tbl",$databaseName)
            ],
            'threecard' => [
                'first3' => Query::selectHistory("threecard_tbl",$databaseName),
                'mid3' => Query::selectHistory("threecard_tbl",$databaseName),
                'last3' => Query::selectHistory("threecard_tbl",$databaseName)
            ],
            'bsoe' => [
                "first2" => Query::selectHistory("bsoe_first2_tbl",$databaseName),
                "last2" => Query::selectHistory("bsoe_last2_tbl",$databaseName),
                'first3' => Query::selectHistory("bsoe_first3_tbl",$databaseName),
                'last3' => Query::selectHistory("bsoe_last3_tbl",$databaseName),
                'sumall3' => Query::selectHistory("bsoe_sumall3_tbl",$databaseName),
                'sumall5' => Query::selectHistory("bsoe_sumall5_tbl",$databaseName)
            ],
            'stud' => Query::selectHistory("stud_tbl",$databaseName),
            'dragontiger' => Query::selectHistory("dratig_tbl",$databaseName),
            'twosides' => Query::selectHistory("twosides_tbl",$databaseName)
        ];
    }
}

?>
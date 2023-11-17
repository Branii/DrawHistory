
<?php 

    class Exceptions { // extend Exception class if needed
        public function HandleException(Throwable $th){

            $code = $th->getCode() ?? 500;
            if($code != 404){
                echo json_encode([
                    "code"=> $code, 
                    "message"=>$th->getMessage(),
                    "file"=>$th->getFile(),
                    "line"=>$th->getLine(),
                    "trace"=>$th->getTrace(),
                    "traceString"=>$th->getTraceAsString(),
                    "previous"=>$th->getPrevious(),
                    "string"=>$th->__toString()
                ]);
            }

        } // end of handle exception class
    }

?>
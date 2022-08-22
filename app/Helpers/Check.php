<?php
    class Check {
        public static function ChecarNome($nome){
            if(!preg_match('/[a-zA-Z]+/m', $nome)){
                 /* ^([áÁàÀâÂâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇAa-zZ]+)+((\s[áÁàÀâÂâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇAa-zZ]+)+)?$ */ 
                return true;        
            }else{
                return false;
            }
        }

        public static function ChecarEmail($email){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return true;         
            }else{
                return false;
            }
        }
    }

?>
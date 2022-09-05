<?php 

    class Url {
        public static function rediricionar($url){
            header("Location:".URL.DIRECTORY_SEPARATOR.$url);
        }
    }


?>
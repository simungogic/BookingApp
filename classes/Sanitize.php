<?php

class Sanitize {  
    public static function escape($string = null){
        if($string)
            return htmlentities($string, ENT_QUOTES);
}
}

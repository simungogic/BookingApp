<?php

class Hash {
    
    public static function make($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
    public static function verify($password, $field){
        return password_verify($password, $field);
    }
}

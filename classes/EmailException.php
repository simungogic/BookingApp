<?php

class EmailException extends Exception {
    private $_message;
    
    public function __construct($message){
        $this->_message = $message;
    }
    
    public function getMessage(){
        return $this->_message;
    }
}

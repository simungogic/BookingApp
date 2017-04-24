<?php

class Validation{
    private $_passed = false,
            $_messages = array('errorRegister' => array(), 'inputNames' => array()),
            $_emailData = array('email' => '', 'emailCode' => '', 'name' => ''),
            $_db = null;
            
    public function __construct() {
        $this->_db = Database::getInstance();
    }
            
    public function check($source, $items = array()){
         foreach($items as $item => $rules){
             foreach($rules as $rule => $ruleValue){
                 if($rule === 'name')
                     $name = $ruleValue;
                 $value = trim($source[$item]);
                 if($rule === 'required' && empty($value)){
                     $this->addInputName($item);
                 }
                 else if(!empty($value)){
                        if($rule == "min"){
                             if(strlen($value) < $ruleValue)
                                 $this->addError("'{$name}' mora sadržavati minimalno {$ruleValue} znakova!");
                         }
                         if($rule == "max"){
                             if(strlen($value) > $ruleValue)
                                 $this->addError("'{$name}' mora sadržavati maximalno {$ruleValue} znakova!");
                         }
                         if($rule == "matches"){
                             if($value != $source[$ruleValue])
                                 $this->addError("'{$name}' se ne poklapa!");
                         }
                         if($rule == "unique"){
                             $check = $this->_db->query("SELECT * FROM User WHERE {$item}=?", array($value));
                             if($check->count())
                                 $this->addError("'{$name}' već postoji u bazi!");
                         }
                         if($rule == "size"){
                             if(strlen($value) != 11)
                                 $this->addError("'{$name}' mora sadržavati točno {$ruleValue} znakova!");
                         }
                         if($rule == "digits"){
                             if(!ctype_digit($value))
                                  $this->addError("'{$name}' mora sadržavati samo znamenke!");
                         }
                         if($rule == "regex"){
                             if(!filter_var($value, FILTER_VALIDATE_EMAIL))
                                  $this->addError("'{$name}' nije u valjanom formatu!");
                         }
                     }
                 }
             }
         if(empty($this->_messages['errorRegister']) && empty($this->_messages['inputNames'])){
             $this->_passed = true;
         }
         return $this;
    }
    
    private function addError($error){
       $this->_messages['errorRegister'][] = $error; 
    }
    
    private function addInputName($name){
        $this->_messages['inputNames'][] = $name;
    }
    
    public function getEmailData(){
        return $this->_emailData;
    }
    
    public function setEmailData($email, $emailCode, $name) {
        $this->_emailData['email'] = $email;
        $this->_emailData['emailCode'] = $emailCode;
        $this->_emailData['name'] = $name;
    }
    
    public function getMessages(){
        return $this->_messages;
    }
    
    public function passed(){
        return $this->_passed;
    }
}


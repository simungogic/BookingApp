<?php
require '../includes/PhpMailer/PHPMailerAutoload.php';

class Email {
    private $_phpMailer,
            $_db;
    
    public function __construct(){
        $this->_phpMailer = new PHPMailer();
        $this->_phpMailer->isSMTP();                                    
        $this->_phpMailer->Host = 'smtp.gmail.com';  
        $this->_phpMailer->SMTPAuth = true;                               
        $this->_phpMailer->Username = 'simun.gogic@gmail.com';            
        $this->_phpMailer->Password = '270293sS';                  
        $this->_phpMailer->SMTPSecure = 'tls';                            
        $this->_phpMailer->Port = 587;
        $this->_phpMailer->setFrom('simun.gogic@gmail.com', 'noReply');
        $this->_phpMailer->CharSet = 'UTF-8';
        $this->_db = Database::getInstance();
    }
    
    public function addAdress($address){
        $this->_phpMailer->addAddress($address);
        return $this;
    }
    
    public function setSubject($subject){
        $this->_phpMailer->Subject = $subject;
        return $this;
    }
    
    public function setBody($body){
       $this->_phpMailer->Body = $body;
       return $this;
    }
    
    public function send(){
        if(!$this->_phpMailer->send())
            throw new EmailException ("Došlo je do pogreške prilikom slanja e-maila potvrde!");
    }
    
    public function activate($email, $emailCode){
        $count = $this->_db->query("SELECT * FROM User WHERE Email=? AND EmailCode=? AND Confirmed=?", array($email, $emailCode, 0))->count();
        
        if($count == 1){
            $this->_db->query("UPDATE User SET Confirmed=? WHERE Email=?", array(1, $email));
        }
        else{
            return false;
        }
        
        return true;
    }
}

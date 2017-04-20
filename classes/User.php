<?php

class User {
    private $_db,
            $_resultSet,
            $_isLoggedIn = false,
            $_sessionName,
            $_messages = array('errorLogin' => array(), 'passed' => false, 'admin' => false);
    
    public function __construct() {
        $this->_db = Database::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        
        if(Session::exists($this->_sessionName)){
            $user = Session::get($this->_sessionName);
            
            if($this->find($user))
                $this->_isLoggedIn = true;
        }       
    }
    
    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }
    
    public function create($fields = array()){
        if(!$this->_db->query("INSERT INTO User(Name, OIB, Email, Password, EmailCode) VALUES(?,?,?,?,?)", $fields)){
            throw new InsertException("Došlo je do pogreške prilikom izrade korisničkog računa!");
        } 
    }
    
    private function isAdmin(){
        $roleID = $this->getResultSet()->getRoleID();
        if($roleID == 2)
            return true;
        
        return false;
    }
    
    private function find($email){ 
        $result = $this->_db->query("SELECT * FROM User WHERE Email=?", array($email));

        if($result->count()){
            $this->_resultSet = $result->getFirstResult();
            return true;
        } 

        return false;
    }
    
    private function checkPassword($password){
        if(Hash::verify($password, $this->getResultSet()->getPassword()))
              return true;
        
        return false;
    }
    
    private function isConfirmed(){
        if($this->getResultSet()->getConfirmed() == 1)
            return true;
        
        return false;
    }
    
    private function setPassed($passed = true){
        $this->_messages['passed'] = $passed;
    }
    
    public function hasPassed(){
        return $this->_messages['passed'];
    }
    
    public function login($email, $password){

        if(!$this->find($email))
            $this->addError("Niste registrirani!");

        if($this->find($email) && !$this->isConfirmed())
            $this->addError("Niste potvrdili e-mail adresu!");

        if($this->find($email) && $this->isConfirmed() && !$this->checkPassword($password))
            $this->addError("Unijeli ste netočnu lozinku!"); 
        
        if($this->find($email) && $this->isConfirmed() && $this->checkPassword($password) && $this->isAdmin())
            $this->setAdminStatus();

        if(empty($this->getErrors()))
            $this->setPassed();

        return $this;
    }
    
    private function setAdminStatus($status = true){
        $this->_messages['admin'] = $status;
    }
    
    private function getResultSet(){
        return $this->_resultSet;
    }
    
    private function getErrors(){
        return $this->_messages['errorLogin'];
    }
    
    public function getMessages(){
        return $this->_messages;
    }
    
    private function addError($error){
        $this->_messages['errorLogin'][] = $error;
    }
    
    public function hasPermission($key){
        $role = $this->_db->query("SELECT * FROM Role WHERE RoleID=?", array($this->getResultSet()->getRoleID()));
        
        $permissions = json_decode($role->getFirstResult()->getPermissions(), true);
        
        if($permissions[$key] == 1)
            return true;
        
        return false;
    }
    
    public function logout(){
        Session::delete($this->_sessionName);
    }
}

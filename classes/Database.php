<?php

class Database{
    private static $_instance = null; // _ kod varijable označava private, instanca baze
    private $_pdo, // kada instanciramo pdo objekt tu ćemo ga pohraniti
            $_query, // zadnji query koji je izvršen
            $_error = false, // flag koji pokazuje dal je query uspio ili ne
            $_resultSet, // result set
            $_count = 0; // služi za ispitivanje dal result set uopće postoji ili ne(0)
    
    private function __clone() {} // private da ga ne možemo klonirati objekt van klase
    
    private function __construct() { // private da ne može pozvati new Database izvan klase
        try{
            $this->_pdo = new PDO('mysql:host=' .Config::get('mysql/host') .'; dbname=' .Config::get('mysql/db') .';charset=utf8', Config::get('mysql/username'), Config::get('mysql/password'));
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    
    public static function getInstance(){ // singleton, kreira Database objekt samo ako već nije kreiran(samo jednom)i vraća ga
        if(!isset(self::$_instance))   
            self::$_instance = new Database();
        
        return self::$_instance;
    }
    
    public function query($sql, $params = array()){
        $this->_error = false; // ako radimo više query-a, zbog prethodnog moramo uvijek postaviti error na false
        if($this->_query = $this->_pdo->prepare($sql)){
            $i = 1;
                if(count($params)){
                    foreach ($params as $param){
                        $this->_query->bindValue($i, $param);
                        $i++;
                    }
                }
                if($this->_query->execute()){
                    $this->_resultSet = $this->_query->fetchAll(PDO::FETCH_CLASS, 'ResultSet');
                    $this->_count = $this->_query->rowCount();
                }
                else{
                    $this->_error = true;
                }
        }       
        return $this;
    }
    
    public function error(){
        return $this->_error;
    }
    
    public function count(){
        return $this->_count;
    }
    
    public function getFirstResult(){
        return $this->getResultSet()[0];
    }
    
    public function getResultSet(){
        return $this->_resultSet;
    }
}




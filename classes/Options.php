<?php

class Options {
    private $_startTime,
            $_endTime,
            $_activity,
            $_db;
    
    public function __construct(){
        $this->_db = Database::getInstance();
    }
    
    public function checkOrders($startTime, $endTime){
        $count = Database::getInstance()->query("SELECT * FROM Book WHERE Date > NOW()"
                . "AND Validated=? AND Valid=? AND (? > TimeBegin OR ? < TimeEnd)",
                array(1, 1, $startTime, $endTime))->count();
        
        if($count>0){
            return false;
        }
        
        return true;
    }
    
    public function setActivity($activity){
        $this->_activity = $activity;
    }
    
    public function setTime($startTime, $endTime){
        $this->_startTime = $startTime;
        $this->_endTime = $endTime;
    }
    
    public function insertWorkingTime(){
        if(!$this->timeExists())
            $this->_db->query("INSERT INTO Options(StartTime, EndTime) VALUES(?,?)", array($this->_startTime, $this->_endTime));
        else
            $this->_db->query("UPDATE Options SET StartTime=?, EndTime=?", array($this->_startTime, $this->_endTime));
    }
    
    public function insertActivity(){
        if(!$this->activityExists($this->_activity)){
            $this->_db->query("INSERT INTO Activity(ActivityName) VALUES(?)", array($this->_activity));
            return true;
        }
        
        return false;
    }

    private function timeExists(){
        $count = $this->_db->query("SELECT * FROM Options")->count();
        
        if($count > 0){
            return true;
        }
        
        return false;
    }
    
    private function activityExists($activityName){
        $count = $this->_db->query("SELECT * FROM Activity WHERE ActivityName=?", array($activityName))->count();
        
        if($count > 0){
            return true;
        }
        
        return false;
    }
}

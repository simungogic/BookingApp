<?php

class ResultSet {
    private $Email,
            $Name,
            $Password,
            $RoleID,
            $OIB,
            $UserID,
            $Confirmed,
            $Permissions,
            $StartTime,
            $EndTime,
            $ActivityName,
            $ActivityID,
            $Date,
            $TimeBegin,
            $TimeEnd,
            $BookID;
    
    public function getEmail() {
        return $this->Email;
    }
    
    public function getPermissions(){
        return $this->Permissions;
    }

    public function getName() {
        return $this->Name;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function getRoleID() {
        return $this->RoleID;
    }

    public function getOIB() {
        return $this->OIB;
    }

    public function getUserID() {
        return $this->UserID;
    }

    public function getConfirmed() {
        return $this->Confirmed;
    }
    
    public function getStartTime() {
        return $this->StartTime;
    }

    public function getEndTime() {
        return $this->EndTime;
    }

    public function getActivityName() {
        return $this->ActivityName;
    }
    
    public function getActivityID() {
        return $this->ActivityID;
    }
    
    public function getDate() {
        return $this->Date;
    }
    
    public function getTimeBegin() {
        return $this->TimeBegin;
    }
    
    public function getTimeEnd() {
        return $this->TimeEnd;
    }
    
    public function getBookID() {
        return $this->BookID;
    }
}

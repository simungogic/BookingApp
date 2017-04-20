<?php

require_once('../core/init.php');

$activityID = Input::get('activityID');
$timeBegin = Input::get('timeBegin');
$timeEnd = Input::get('timeEnd');
$date = Input::get('date');

$userID = Database::getInstance()->query("SELECT * FROM User WHERE Email=?", 
        array(Session::get('email')))->getFirstResult()->getUserID();

Database::getInstance()->query("INSERT INTO Book(UserID, ActivityID, Date, TimeBegin, TimeEnd) "
        . "VALUES(?,?,?,?,?)", array($userID, $activityID, $date, $timeBegin, $timeEnd));




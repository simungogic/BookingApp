<?php

require_once('../core/init.php');
$toEncode = array('start' => array(), 'end' => array(), 'username' => array(), 'oib' => array(), 'activity' => array());
$result = Database::getInstance()
        ->query("SELECT * FROM Book "
                . "JOIN User ON Book.UserID = User.UserID "
                . "JOIN Activity ON Book.ActivityID = Activity.ActivityID "
                . "WHERE Validated=? AND Valid=?", array(1, 1))
        ->getResultSet();

for($i = 0; $i < sizeof($result); $i++){
    $date = $result[$i]->getDate();
    $timeBegin = $result[$i]->getTimeBegin();
    $timeEnd = $result[$i]->getTimeEnd();
    $dateTimeStart = date('Y-m-d H:i:s', strtotime("$date $timeBegin"));
    $dateTimeEnd = date('Y-m-d H:i:s', strtotime("$date $timeEnd"));
    $toEncode['start'][] = $dateTimeStart;    
    $toEncode['end'][] = $dateTimeEnd; 
    $toEncode['username'][] = $result[$i]->getName();
    $toEncode['activity'][] = $result[$i]->getActivityName();
    $toEncode['oib'][] = $result[$i]->getOIB();
}

echo json_encode($toEncode);


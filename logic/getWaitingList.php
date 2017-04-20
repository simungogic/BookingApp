<?php

require_once('../core/init.php');
$booking = array('userName' => array(), 'activityName' => array(), 
    'date' => array(), 'timeBegin' => array(), 'bookID' => array(), 'email' => array());
$result = Database::getInstance()
        ->query("SELECT * FROM Book "
                . "JOIN User ON Book.UserID = User.UserID "
                . "JOIN Activity ON Book.ActivityID = Activity.ActivityID "
                . "WHERE Validated=? AND Valid=?", array(0, 0))
        ->getResultSet();

for($i = 0; $i < sizeof($result); $i++){
    $date = $result[$i]->getDate();
    $date = date('d.m.Y.', strtotime($date));
    $time = $result[$i]->getTimeBegin();
    $time = date('H:i', strtotime($time));
    $booking['userName'][] = $result[$i]->getName();
    $booking['activityName'][] = $result[$i]->getActivityName();
    $booking['date'][] = $date;
    $booking['timeBegin'][] = $time;
    $booking['bookID'][] = $result[$i]->getBookID();
    $booking['email'][] = $result[$i]->getEmail();
}

echo json_encode($booking);


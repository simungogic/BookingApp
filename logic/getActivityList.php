<?php

require_once('../core/init.php');

$booking = array('activity' => array(), 'activityID' => array());

$result = Database::getInstance()
        ->query("SELECT * FROM Activity")
        ->getResultSet();

for($i = 0; $i < sizeof($result); $i++){
    $booking['activity'][] = $result[$i]->getActivityName();
    $booking['activityID'][] = $result[$i]->getActivityID();
}

echo json_encode($booking);


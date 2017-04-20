<?php

require_once('../core/init.php');
$date = Input::get('date');
$selectedID = Input::get('selectedID');
$timeBegin = Input::get('timeBegin').':00';
$durations = array('29', '59', '89', '119');
$toEncode = array('disabledDuration' => array());

foreach($durations as $duration){
    $count = Database::getInstance()->query("SELECT *
        FROM book WHERE Date=? AND ActivityID=? AND Valid=? AND Validated=? AND
        TimeBegin BETWEEN ? AND DATE_ADD(CAST(? AS TIME), INTERVAL ? MINUTE)", 
            array($date, $selectedID, 1, 1, $timeBegin, $timeBegin, $duration))->count();
    
    if($count > 0)
        $toEncode['disabledDuration'][] = $duration;
}

echo json_encode($toEncode);


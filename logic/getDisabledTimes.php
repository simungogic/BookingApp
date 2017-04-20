<?php

require_once('../core/init.php');
$date = Input::get('date');
$selectedID = Input::get('selectedID');
$toEncode = array('timeBegin' => array(), 'timeEnd' => array());

$result = Database::getInstance()->query("SELECT * FROM book WHERE ActivityID=? AND Date=? AND Validated=? AND Valid=?", 
        array($selectedID, $date, 1, 1))->getResultSet();

for($i = 0; $i < sizeof($result); $i++){
    $toEncode['timeBegin'][] = $result[$i]->getTimeBegin();   
    $toEncode['timeEnd'][] = $result[$i]->getTimeEnd();
}

echo json_encode($toEncode);





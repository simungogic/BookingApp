<?php

require_once('../core/init.php');
$selectedID = Input::get('selectedID');
$workingDuration = Input::get('workingDuration');
$toEncode = array('dates' => array());
$result = Database::getInstance()->query("SELECT * FROM Book "
        . "WHERE ActivityID=? AND Validated=? AND Valid=? "
        . "GROUP BY Date HAVING CAST(SUM(TimeEnd - TimeBegin) as TIME)=?", 
        array($selectedID, 1, 1, $workingDuration))->getResultSet();

for($i = 0; $i < sizeof($result); $i++){
    $toEncode['dates'][] = $result[$i]->getDate();    
}

echo json_encode($toEncode);


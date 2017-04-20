<?php

require_once('../core/init.php');

$result = Database::getInstance()->query("SELECT * FROM activity")->getResultSet();
$toEncode = array('activityName' => array(), 'activityID' => array());

for($i = 0; $i < sizeof($result); $i++){
    $toEncode['activityName'][] = $result[$i]->getActivityName();    
    $toEncode['activityID'][] = $result[$i]->getActivityID();  
}
    
echo json_encode($toEncode);


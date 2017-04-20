<?php

require_once('../core/init.php');

$result = Database::getInstance()->query("SELECT * FROM Options")->getFirstResult();
$toEncode = array('startTime' => $result->getStartTime(), 'endTime' => $result->getEndTime());

echo json_encode($toEncode);




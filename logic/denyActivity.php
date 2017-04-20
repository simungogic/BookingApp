<?php

require_once('../core/init.php');

$activityID = Input::get('activityID');
Database::getInstance()->query("DELETE FROM Activity WHERE ActivityID=?", array($activityID));

echo $activityID;


<?php

require_once('../core/init.php');

$activityID = Input::get('activityID');
$count = Database::getInstance()->query("SELECT * FROM Book WHERE ActivityID=?", array($activityID))->count();

if($count > 0){
    echo "key";
}
else{
    Database::getInstance()->query("DELETE FROM Activity WHERE ActivityID=?", array($activityID));
    echo $activityID;
}




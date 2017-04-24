<?php
require_once('../core/init.php');
$timeBegin = Input::get('timeBegin');
$timeEnd = Input::get('timeEnd');
$date = Input::get('date');

$bookID = Input::get('bookID');
$count = Database::getInstance()
        ->query("SELECT * FROM Book WHERE ((TimeEnd > ?) AND (TimeBegin < ?)) "
                . "AND Date=? AND Validated=? AND Valid=?", array($timeBegin, $timeEnd, $date, 1, 1))->count();
if($count == 0){
    Database::getInstance()->query("UPDATE Book SET Validated=?, Valid=? WHERE BookID=?", array(1, 1, $bookID));
    echo $bookID;
}
else{
    Database::getInstance()->query("UPDATE Book SET Validated=?, Valid=? WHERE BookID=?", array(1, 0, $bookID));
    echo "overlap";
}

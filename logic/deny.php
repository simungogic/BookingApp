<?php

require_once('../core/init.php');

$bookID = Input::get('bookID');
Database::getInstance()->query("UPDATE Book SET Validated=?, Valid=? WHERE BookID=?", array(1, 0, $bookID));

echo $bookID;



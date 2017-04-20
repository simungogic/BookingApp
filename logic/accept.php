<?php

require_once('../core/init.php');

$bookID = Input::get('bookID');
$name = Input::get('name');
$date = Input::get('date');
$time = Input::get('time');
$activity = Input::get('activity');

Database::getInstance()->query("UPDATE Book SET Validated=?, Valid=? WHERE BookID=?", array(1, 1, $bookID));

$email = new Email();
$email->addAdress(Input::get('email'))->setSubject('Potvrda rezervacije - Booking')
        ->setBody("Pozdrav ".$name. ",\n\nVaša rezervacija je potvrđena.\n\nAktivnost: ".$activity."\nVrijeme: ". $date.", ".$time."h")
                    ->send();

echo $bookID;
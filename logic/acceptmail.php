<?php
require_once('../core/init.php');

$name = Input::get('name');
$date = Input::get('date');
$timeBegin = Input::get('timeBegin');
$timeEnd = Input::get('timeEnd');
$activity = Input::get('activity');
$mail = Input::get('email');

$email = new Email();
$email->addAdress($mail)->setSubject('Potvrda rezervacije - Booking')
        ->setBody("Pozdrav ".$name. ",\n\nVaša rezervacija je potvrđena.\n\nUsluga: "
                .$activity."\nDatum: ". $date."\nTermin: "
                .$timeBegin."h - ".$timeEnd."h")
                    ->send();


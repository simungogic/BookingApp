<?php
require_once '../core/init.php';

$emailCode = $_POST['emailCode'];
$email = $_POST['email'];
$name = $_POST['name'];

$mail = new Email();

try{
    $mail->addAdress($email)->setSubject('E-mail potvrda')
                    ->setBody("Pozdrav ".$name. ",\n\npotvrdite Vaš korisnički račun klikom na link u nastavku:\n\n"
                            . "http://localhost:82/Booking/logic/activate.php?email=".$email."&emailCode=".$emailCode)
                    ->send();
}
catch(EmailException $ex){
    echo "error";
}


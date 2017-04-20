<?php

require_once '../core/init.php';
$email = new Email();
if($email->activate(Input::get('email'), Input::get('emailCode'))){
    require_once '../layouts/activate.phtml';
}
else{
    Redirect::to('index.php');
}

   

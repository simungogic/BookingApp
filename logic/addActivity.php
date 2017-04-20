<?php

require_once '../core/init.php';

if(Input::exists()){
    $activity = new Options();
    $activity->setActivity(Input::get('activity'));
    
    if($activity->insertActivity())
        echo true;
    else
        echo false;
}


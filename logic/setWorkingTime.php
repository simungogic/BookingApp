<?php

require_once '../core/init.php';
$timePickerStart = Input::get('timePickerStart');
$timePickerEnd = Input::get('timePickerEnd');

if(Input::exists()){
    $timePicker = new Options();
    if($timePicker->checkOrders($timePickerStart, $timePickerEnd)){
        $timePicker->setTime($timePickerStart, $timePickerEnd);
        $timePicker->insertWorkingTime();
        echo "ok";
    }else{
        echo "not";
    }
}

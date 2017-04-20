<?php

require_once '../core/init.php';

if(Input::exists()){
    $timePicker = new Options();
    $timePicker->setTime(Input::get('timePickerStart'), Input::get('timePickerEnd'));
    $timePicker->insertWorkingTime();
}

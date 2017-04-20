<?php

$user = new User();
if(!$user->hasPermission($status))
    Redirect::to ('index.php');

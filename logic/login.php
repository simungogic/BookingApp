<?php

require_once('../core/init.php');

if(Input::exists()){
    $validate = new Validation();
    $validate->check($_POST, array(
        'emailLogin' => array(
            'name' => 'Email',
            'required' => true
        ),
        'passwordLogin' => array(
            'name' => 'Lozinka',
            'required' => true
        )
    ));
    
    $user = new User();
    $login = $user->login(Input::get('emailLogin'), Input::get('passwordLogin'));

    if($login->hasPassed())
        Session::put('email', Input::get('emailLogin'));
    
    echo json_encode(array_merge($validate->getMessages(), $login->getMessages()));    
}
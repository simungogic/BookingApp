<?php
require_once '../core/init.php';

if(Input::exists())
{
    $validate = new Validation();
    $validate->check($_POST, array(
        'name' => array(
            'name' => 'Ime i prezime',
            'required' => true,
        ),
        'oib' => array(
            'name' => 'OIB',
            'required' => true,
            'size' => 11,
            'digits'=> true,
            'unique' => true
        ),
        'password' => array(
            'name' => 'Lozinka',
            'required' => true,
            'min' => 6, 
            'max' => 32 
        ),
        'passwordRepeat' => array(
            'name' => 'Ponovljena lozinka',
            'required' => true,
            'matches' => 'password'
        ),
        'email' => array(
            'name' => 'Email',
            'required' => true,
            'regex' => true,
            'unique' => true
        )
    ));
    
    if($validate->passed()){
        $user = new User();
        $email = new Email();
        $emailCode = md5(Input::get('name').microtime());
        $validate->setEmailData(Input::get('email'), $emailCode, Input::get('name'));
        try{
            $user->create(array(
                   Input::get('name'), 
                   Input::get('oib'), 
                   Input::get('email'), 
                   Hash::make(Input::get('password')),
                   $emailCode
               )); 
        } catch (InsertException $ex) {
            $validate->addError($ex->getMessage());
        } 
}

    echo json_encode(array_merge($validate->getMessages(), $validate->getEmailData()));
}








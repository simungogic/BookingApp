<?php
require_once '../core/init.php';

if(Input::exists())
{
    $validate = new Validation();
    $validate->check($_POST, array(
        'name' => array(
            'name' => 'Ime i prezime',
            'required' => true,
            'max' => 50 
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
            'max' => 50,
            'regex' => true,
            'unique' => true
        )
    ));

    if($validate->passed()){
        $user = new User();
        $email = new Email();
        $emailCode = md5(Input::get('name').microtime());
        try{
            $user->create(array(
                   Input::get('name'), 
                   Input::get('oib'), 
                   Input::get('email'), 
                   Hash::make(Input::get('password')),
                   $emailCode
               )); 
            
            $email->addAdress(Input::get('email'))->setSubject('E-mail potvrda')
                    ->setBody("Pozdrav ".Input::get('name'). ",\n\npotvrdite Vaš korisnički račun klikom na link u nastavku:\n\n"
                            . "http://localhost:82/Booking/logic/activate.php?email=".Input::get('email')."&emailCode=".$emailCode)
                    ->send();
        } catch (InsertException $ex) {
            $validate->addError($ex->getMessage());
        } 
        catch(EmailException $ex){
            $validate->addError($ex->getMessage());
        }
}

    echo json_encode($validate->getMessages());
}








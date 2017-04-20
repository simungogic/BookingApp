<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'booking'
    ),
    'session' => array(
        'session_name' => 'email'
    )
);

spl_autoload_register(function($class){ 
    $path = '../classes/' .$class. '.php';
    $path2 = 'classes/' .$class. '.php';
    
    if(file_exists($path)) 
        require_once '../classes/' .$class. '.php'; 
    
    if(file_exists($path2)) 
        require_once 'classes/' .$class. '.php'; 
    
}); // run-a se svaki put kad instaciramo objekt klase, spl - standard php library

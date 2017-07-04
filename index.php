<?php
session_start();
 
//se digirar
if(sizeof($_GET) == 0){
   header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'?controller=home&action=index');
}

if (isset($_GET['controller'])) {
    include_once('Controller/' . ucfirst($_GET['controller']) . 'Controller.php');

    //TRANSFORMA A STRING URL NA FUNÇÃO
    $class = ucfirst($_GET['controller']).'Controller';
   
    eval("\$c = new $class();");     
       
    if (isset($_GET['action'])) {        
       eval("\$c->\$_GET['action']();");
    }
}



?>
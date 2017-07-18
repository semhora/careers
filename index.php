<?php
session_start();

//ARQUIVO DE CONFIGURAÇÃO
include_once('config.php');

//LOAD DAS CLASSES
function __autoload($class){
    include('Model/'.$class.'.php');
}
 
//se digirar
if(sizeof($_GET) == 0){    
   header('location:'.PASTA.'/home');
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
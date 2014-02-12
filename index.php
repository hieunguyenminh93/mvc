<?php
	
    define("VERSION","1.0.0");
    if(file_exists('config/config.php')){
        include_once('config/config.php');
    }else{
        header("Location: install/index.php");
        exit;
    }
    //Startup 
    require_once 'namespace.php';
    //registry
    $registry = new Registry();
    //database
    $db_config = array('hostname'=>DB_HOSTNAME,'username'=>DB_USER,'passwd'=>DB_PASSWD,'driver'=>DB_DRIVER,'db'=>DB_DB);
    
    $db = new Database($db_config);
    $registry->set('db',$db);
    //
    
    //language 
    $language = new Language(SYSTEM_LIB.'/language'); //this lang loading from database;
    
    //controller
    $controller = new Front($registry);
    //
    $controller->addPreAction(new Action('common'));
    $controller->dispatch(new Action('common'), 'E_ALL');
    
    
?>
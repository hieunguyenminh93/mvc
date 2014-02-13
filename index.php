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
    //loader 
    $loader = new Loader($registry);
    $registry->set("load", $loader);
    //request
    $request = new Request();
    $registry->set("request", $request);
    $route = $request->get['route'];
    if(!isset($route)){
    	$route = "common/home";
    }
    //response
    $response = new Response();
    $registry->set("response", $response);
    //language 
    $language = new Language(SYSTEM_LIB.'/language'); //this lang loading from database;
    $registry->set('language', $language);
    //document
    $document = new Document();
    $registry->set('document', $document);
    //controller
    $controller = new Front($registry);
    //
    $controller->addPreAction(new Action('common/header'));
    $controller->dispatch(new Action($route), 'E_ALL');
    $response->output();
    
    
    
?>
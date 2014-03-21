<?php
    if(file_exists("../config/config.php")){
        header("Location: ../index.php");
        //exit;
    }
    //
    $dir = dirname ( realpath ( "../index.php" ) );
   	
    define('SYSTEM_LIB',$dir.'/system/library');
    define('SYSTEM_CLASS', $dir.'/system/class');
    define('SYSTEM_DB', $dir.'/system/database');
    //define Engineer
    define('ENGINEER', $dir.'/install');
    
    //define template
    define('TEMPLATE', $dir.'/install/view');
    //define language
    define('LANGUAGE', $dir.'/install/language');
    require_once 'start.php';
    $registry = new Registry();
    //language
    $language = new Language('default');
    $registry->set('language', $language);
    //request
    $request = new Request();
    $registry->set('request',$request);
    if(isset($request->get['route'])){
    	$route = $request->get['route'];
    }
    if(!isset($route)){
    	$route = 'inputsetting';
    }
    //Loader 
    $loader = new Loader($registry);
    $registry->set('load', $loader);
    //response 
    $respone = new Response();
    $registry->set('response', $respone);
    //document
    $registry->set('document', new Document());
    //controller
    $controller = new Front($registry);
	
    $controller->dispatch(new Action($route), new Action('not_found'));
    //Respone
    
    $respone->output();
    
    
?>
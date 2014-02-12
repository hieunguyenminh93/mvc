<?php
    /* if (!file_exists("../config/config.php")) {
    	$server = $_SERVER['DOCUMENT_ROOT'];
    	$file = fopen("../config/config.php","x");
    	fwrite($file, "<?php\n");
    	//define version;
    	$ver = "define(\"VERSION\",\"1.0.0\");\n";
    	//define system class
    	$system_class = "define(\"SYSTEM_CLASS\",\"$server/mvc/system/class\");\n";
    	//define system library
    	$system_lib = "define(\"SYSTEM_LIB\",\"$server/mvc/system/library\");\n";
    	//define system database
    	$system_db = "define(\"SYSTEM_DB\",\"$server/mvc/system/database\");\n";
		/**
		 * creating const setting
		 */
    	
    	/* fwrite($file, $ver);
    	fwrite($file, $system_class);
    	fwrite($file, $system_lib);
    	fwrite($file, $system_db);
    	fwrite($file, "?>");
    }
     */ 
    if(file_exists("../config/config.php")){
        header("Location: ../index.php");
        exit;
    }
    //
    define('SYSTEM_LIB',$_SERVER['DOCUMENT_ROOT'].'/mvc/system/library');
    define('SYSTEM_CLASS', $_SERVER['DOCUMENT_ROOT'].'/mvc/system/class');
    define('SYSTEM_DB', $_SERVER['DOCUMENT_ROOT'].'/mvc/system/database');
    //define Engineer
    define('ENGINEER', $_SERVER['DOCUMENT_ROOT'].'/mvc/install');
    
    //define template
    define('TEMPALTE', $_SERVER['DOCUMENT_ROOT'].'/mvc/install/view');
    //define language
    define('LANGUAGE', $_SERVER['DOCUMENT_ROOT'].'/mvc/install/language');
    require_once 'start.php';
    $registry = new Registry();
    //language
    $language = new Language('default');
    $registry->set('language', $language);
    //request
    $request = new Request();
    $registry->set('request',$request);
    
    $route = $request->get['route'];
    
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
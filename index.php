<?php
// if(defined ( "VERSION", "1.0.0" );
if (file_exists ( 'config/config.php' )) {
	include_once ('config/config.php');
} else {
	header ( "Location: install/index.php" );
	exit ();
}
error_reporting ( '^E_NOTICE' );
// Startup
require_once 'namespace.php';
// registry
$registry = new Registry ();
// database
$db_config = array (
		'hostname' => DB_HOSTNAME,
		'username' => DB_USER,
		'passwd' => DB_PASSWD,
		'driver' => DB_DRIVER,
		'db' => DB_DB 
);

$db = new Database ( $db_config );
$registry->set ( 'db', $db );

//facebook
$config_fb = array(
    'appId' => '1390454514508590',
    'secret' => '21fc9014c169cb9baac0b97e309fc17f',
    'cookie' => true,
    'oauth' => true
);
$fb = new Facebook($config_fb);
$registry->set('fb',$fb);
$registry->set('fb_user',$fb->getUser());
// loader
$loader = new Loader ( $registry );
$registry->set ( "load", $loader );
// request
$request = new Request ();
$registry->set ( "request", $request );
$route = $request->get ['route'];
if (! isset ( $route )) {
	$route = "common/home";
}
// session create;
$session = new Session ();
$registry->set ( 'session', $session );
// customer
$customer = new Customer ( $registry );
$registry->set ( 'customer', $customer );


// document
$document = new Document ();
$registry->set ( 'document', $document );
// response
$response = new Response ();
$registry->set ( "response", $response );
// language
$language = new Language ( 'default/' ); // this lang loading from database;
$registry->set ( 'language', $language );



//

//
// controller
$controller = new Front ( $registry );
//
$controller->addPreAction ( new Action ( 'common/header' ) );


$controller->dispatch ( new Action ( $route ), new Action ( "error/not_found" ) );
$response->output ();

?>
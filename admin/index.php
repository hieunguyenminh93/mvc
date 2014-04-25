<?php
if (! file_exists ( 'config.php' )) {
	header ( "Location: ../install" );
	exit ();
}
error_reporting("^E_ALL");
include_once 'config.php';
include_once 'startup.php';
$registry = new Registry ();

$database_config = array (
		'hostname' => DB_HOSTNAME,
		'username' => DB_USER,
		'passwd' => DB_PASSWD,
		'driver' => DB_DRIVER,
		'db' => DB_DB 
);

$db  = new Database($database_config);
$registry->set('db', $db);
//loader
$loader = new Loader($registry);
$registry->set('load', $loader);
//
$request = new Request ();
$registry->set ( "request", $request );
//$route = (isset($request->get['route'])?$request->get['route']:"admin/dashboard");
// document
$document = new Document ();
$registry->set ( 'document', $document );
// response
$response = new Response ();
$registry->set ( "response", $response );
// language
$language = new Language ( SYSTEM_LIB . '/language' ); // this lang loading from database;
$registry->set ( 'language', $language );


//encrypter
$encrypter = new Encrypter();
$registry->set('encrypter',$encrypter);

// session
$session = new Session();
$registry->set('session',$session);
//



// controller
$controller = new Front ( $registry );
//
$user = new User($registry);
$registry->set('user',$user);
if($user->logged()){
    $route = isset($request->get['route'])?$request->get['route']:'admin/dashboard';
}else{
    $route = "account/login";
}
$controller->addPreAction ( new Action ( 'common/header' ) );
$controller->dispatch ( new Action ( $route ), new Action ( "not_found" ) );
$response->output ();



?>
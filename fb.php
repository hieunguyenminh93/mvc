<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/2/14
 * Time: 7:28 PM
 */
require 'system/library/facebook.php';
$config_fb = array(
    'appId' => '1390454514508590',
    'secret' => '21fc9014c169cb9baac0b97e309fc17f'
);
$fb = new Facebook($config_fb);
$user = $fb->getUser();
$post_id = array();
$post = "";
$login = "";
$message = "";
$logout = "";
if($user){
    try{
        $post_id = $fb->api("/me/feed","POST",array('message'=>'ascsacsc'));
        $logout = "<a href=".$fb->getLogoutUrl(array( 'next' => 'http://localhost/mvc/fb.php' )).">out</a> ".$pro['id'];
    }catch (FacebookApiException $e){
        echo $e->getCode().$e->getMessage();
    }
}else{
     $login = "<a href=".$fb->getLoginUrl(array(
             'scope' => 'publish_stream,read_mailbox'
         )).">login3</a>";
}
?>
<html>
<head></head>
<body>
<div><?php echo $logout.$login; ?></div>


</body>
</html>
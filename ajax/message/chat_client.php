<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/25/14
 * Time: 9:07 AM
 */
    $socket = stream_socket_client('tcp://127.0.0.1:2048');

    if(!$socket){
        echo "erro";
    }else{
        fwrite($socket,"client hello");
        while(!feof($socket)){
            $msg = fread($socket,100);
            echo $msg;
            if($msg == "hello client"){
                fwrite($socket,"i'm hacker");
            }
        }
        fclose($socket);
    }

?>
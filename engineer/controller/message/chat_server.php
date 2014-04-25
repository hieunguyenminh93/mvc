<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/25/14
 * Time: 9:07 AM
 */
    $socket = stream_socket_server('tcp://127.0.0.1:2048');

    while($connect = stream_socket_accept($socket)){
        $msg = fread($socket,100);
        if($msg == "hello server"){
            echo $msg;
            fwrite($socket,"client hello");
        }else if($msg == "i'm hacker"){
            echo $msg;
            fwrite($connect,'i have save ip and close connect');
        }
        fclose($connect);
    }
    fclose($socket);
?>
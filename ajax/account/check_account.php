<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/8/14
 * Time: 6:44 PM
 */
if(file_exists('../../config/config.php')){
    include_once '../../config/config.php';
    include_once '../../namespace.php';
    $db = new Database ( array (
        'hostname' => DB_HOSTNAME,
        'username' => DB_USER,
        'passwd' => DB_PASSWD,
        'driver' => DB_DRIVER,
        'db' => DB_DB
    ) );
    $username = $_POST['username'];
    //echo $username;
    $sql = "select * from users where username = '$username'";
    //echo $sql;
    $re = $db->query($sql);
    if($re->num_rows > 0){
        sleep(1);
        echo "0";
    }else{
        echo "1";
    }

}else{
    echo "-1";
}
?>
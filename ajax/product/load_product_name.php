<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/24/14
 * Time: 2:37 PM
 */

if (file_exists ( "../../config/config.php" )) {
    include_once '../../config/config.php';
    include_once '../../namespace.php';
    $db = new Database ( array (
        'hostname' => DB_HOSTNAME,
        'username' => DB_USER,
        'passwd' => DB_PASSWD,
        'driver' => DB_DRIVER,
        'db' => DB_DB
    ) );
    $result = new stdClass();

    if(isset($_POST ['keyword'])){
        $sql = "select product_name from product where product_name like %". $_POST ['keyword']."%";
    }else{
        $sql = "select * from product" ;//pr inner join category ca on pr.product_category = ca.category_id order by pr.product_category";
    }
    $result = $db->query($sql);
    $res = array();
    $re = '';
    foreach($result->rows as $pro){
        $res[]= $pro['product_name'];
        $re .= $pro['product_name'].',';
    }
    $re = substr($re,0,strlen($re)-1);
    echo json_encode($res);
} else {
    echo "Config error";
}


?>
<?php
if (file_exists ( "../config/config.php" )) {
	include_once '../config/config.php';
	include_once '../namespace.php';
	$db = new Database ( array (
			'hostname' => DB_HOSTNAME,
			'username' => DB_USER,
			'passwd' => DB_PASSWD,
			'driver' => DB_DRIVER,
			'db' => DB_DB 
	) );
	$result = new stdClass();
	
	if(isset($_POST ['product_id'])){
		$sql = "select *from product where product_id=". $_POST ['product_id'];
		$result = $db->query($sql);
		include_once TEMPLATE . '/default/template/ajax/load_product.tpl';
		ob_start();
		extract($result->row);
		$output = ob_get_contents();
		ob_end_flush();
		echo $output;
	}else{
		$sql = "select * from product pr inner join category ca on pr.product_category = ca.category_id order by pr.product_category";
		$result = $db->query($sql);
		$product = $result->rows;
		include_once TEMPLATE . '/default/template/ajax/load_product.tpl';
		ob_start();
		$output = ob_get_contents();
		ob_end_flush();
		echo $output;
	}
} else {
	echo "Config error";
}
?>
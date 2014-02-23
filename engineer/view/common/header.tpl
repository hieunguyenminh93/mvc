<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<?php if(count($links)>0){?>
	<?php foreach ($links as $keys){?>
	<link <?php foreach ($keys as $key => $value){ echo $key."="."$value";}?>>
	<?php }?>
	<meta charset="utf-8">
	<style type="text/css"><?php echo $style;?></style>
</head>
<body>
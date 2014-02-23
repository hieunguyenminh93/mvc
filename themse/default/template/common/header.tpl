<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
<?php if(count($links)>0){?>
<?php foreach ($links as $keys){?>
	<link <?php foreach ($keys as $key => $value){echo $key."="."\"$value\" ";}?>>
<?php }}?>
<?php if(count($script)>0){?>
<?php foreach ($script as $keys){?>
	<script <?php foreach ($keys as $key => $value){echo $key."="."\"$value\" ";}?>>
<?php }}?>
</head>
<body>
<?php echo $inputsetting;?>
<?php echo $footer;?>
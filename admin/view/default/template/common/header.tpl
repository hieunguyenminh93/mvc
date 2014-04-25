<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
<?php if(count($links)>0){?>
<?php foreach ($links as $keys){?>
	<link <?php foreach ($keys as $key => $value){echo $key."="."\"$value\" ";}?>>
<?php }}?>
<?php if(count($scripts)>0){?>
<?php foreach ($scripts as $keys){?>
	<script <?php foreach ($keys as $key => $value){echo $key."="."\"$value\" ";}?>></script>
<?php }}?>
	<meta charset="utf-8" />
</head>
<body>

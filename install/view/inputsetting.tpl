<?php echo $header;?>
<div id='content'>
	<?php echo $title;?>
	<div class='box-content'>
		<form id="form1" name="form1" method="post" action="index.php?route=install/install">
    		<div class="form_title"><label for="<?php echo $text_hostname;?>"><?php echo $text_hostname;?></label></div>
    		<div class=""><input type="text" name="<?php echo $name_hostname;?>" id="<?php echo $id_hostname;?>" /></div>
		    <div class="clr"></div>
		    <div class="form_title"><label for="<?php echo $name_username;?>"><?php echo $text_username;?></label></div>
		    <div class=""><input type="text" name="<?php echo $name_username;?>" id="<?php echo $id_username;?>" /></div>
		    <div class="clr"></div>
		    <div class='form_title'><input type="submit" value="<?php echo $text_button?>"></div>
		    <div class="clr"></div>
  		</form>
	</div>
</div>
<?php echo $footer;?>
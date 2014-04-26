<?php echo $header; ?>
<?php echo $title_bar; ?>
<?php echo $banner; ?>
<div class="box-content body">
    <?php echo $slider;?>
</div>
<div class="box-content body">
    <?php echo $product_home;?>
</div>
<div class="box-content body data">
	<div class="ui-widget">

	</div>

	<script type="text/javascript">
		$.ajax({
			url: "ajax/load_product.php",
			data: {"route":"acbcs"},
			type: "POST",
			error: function(){
				$("ui-widget").append('<div class="ui-state-error ui-corner-all">error</div>');
			},
			complete: function(event,jqXHR,option){
				
			},
			success: function(data,status,XHR){
				//$(".box-content.body.data").append(data);
			} 
		});
	</script>
</div>
<?php echo $footer;?>
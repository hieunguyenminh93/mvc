<?php echo $header; ?>
<?php echo $title_bar; ?>
<?php echo $banner; ?>
<div class="box-content body">
	<div class="ui-widget">
		<div class="ui-state-error ui-corner-all"></div>
	</div>
	<div class="load-product">
	</div>
	<script>
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
				$(".load-product").append(data);
			} 
		});
	</script>
</div>
<?php echo $footer;?>
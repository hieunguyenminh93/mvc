<div class="product">
	<div class="product">
		<?php if(!is_null($product)){
			$cat_id_old = -1;
			foreach($product as $pro){
		?>
		<?php if($cat_id_old != $pro['product_category']){
			$cat_id_old = $pro['product_category'];?>
		<div class="product-category">
		<div class="clr"></div>
		<h><?php echo $pro['category_name'];?></h></div>
		<div class="clr"></div>
		<?php }?>
		<div class="product-detail">
			<?php echo $pro['product_name'];?>
		</div>
		<?php
						 
		}
		}?>
		<div class="clr"></div>
	</div>
</div>
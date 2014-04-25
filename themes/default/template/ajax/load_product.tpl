<div class="box-content">
		<?php if(!is_null($product)){
			$cat_id_old = -1;
			foreach($product as $pro){
		?>
		<?php if($cat_id_old != $pro['product_category']){
			$cat_id_old = $pro['product_category'];
			if($cat_id_old > 1){
		?>
        </div>
        <div class="box-content">
        <?php
            }else{
        ?>
            <div class="box-content">
        <?php
         }
        ?>
            <div class="product-category">
		        <h3><a href="index.php?route=product/product&cat_id=<?php echo $pro['product_category']?>"><?php echo $pro['category_name'];?></a> </h3>
            </div>
		<?php }?>
		        <div class="product-detail">
			        <a href="index.php?route=product/product&cat_id=<?php echo $pro['product_category']?>&product_id=<?php echo $pro['product_id'];?>"> <?php echo $pro['product_name'];?></a>
		        </div>
                <div class="clr"></div>
		<?php
		    }
		}?>
                </div>
		<div class="clr"></div>
</div>
<div class="clr"></div>
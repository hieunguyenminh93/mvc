<?php echo $header; ?>
<?php echo $banner; ?>
<?php echo $menu; ?>
<?php echo $column_left;?>
<div class='product_all'><?php foreach ($product as $pro){?>
<ul>
	<li><?php echo $pro['product_id']; ?>
		<ul>
			<li><?php echo $pro['product_name'];?></li>
			<li><?php echo $pro['product_price'];?></li>
			<li><?php echo $pro['product_descript'];?></li>
			<li><?php echo $pro['product_descript'];?></li>
			<li><?php echo $pro['product_category'];?></li>
			<li><?php echo $pro['product_date_add'];?></li>
			<li><?php echo $pro['product_date_modified'];?></li>
			<li><?php echo $pro['product_status'];?></li>
		</ul>
	</li>
</ul> 
<?php } ?>
</div>

<?php echo $footer;?>
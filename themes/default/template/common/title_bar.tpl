<div class="box-content title-bar">
	<div class="menu">
		<ul class="bar-menu">
		<?php foreach($menu_button as $button){ ?>
			<li>
				<a href="<?php echo $button['href'];?>"><?php echo $button['name']?></a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<div class="wrapper">
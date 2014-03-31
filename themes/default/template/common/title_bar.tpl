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
    <div class="search">
        <ul>
            <li id="search-li">
                <input name="search" type="text" id="suggest" style="width: 568px; height: 24px; padding-left: 5px;">
            </li>

        </ul>
    </div>
</div>
<div class="wrapper">
<div class="box-content"></div>
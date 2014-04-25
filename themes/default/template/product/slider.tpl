<div id="slider">

    <div class="slider2">
        <?php if(is_array($product)){ ?>
            <?php foreach($product as $pro){ ?>
        <div class="slider">
            <div class="products">
                <a href="index.php?route=product/product&cat_id=<? echo $pro['product_category']?>&product_id=<?echo $pro['product_id'];?>"><img src="<?php echo $pro['product_image'];?>" alt="loading" title="<?php echo $pro['product_name'];?>"/></a>
            </div>
        </div>
        <?php } ?>
        <?php } ?>

    </div>

    <script >
        $(document).ready(function(){
            $(".slider2").bxSlider({
                minSlides: 2,
                maxSlides: 2,
                slideWidth: 455,
                slideMargin: 5,
                captions: true
            });
        });
    </script>
</div>
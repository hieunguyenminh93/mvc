<?php foreach($products as $product){ ?>
<div class="box-content product-category">
    <?php foreach($product as $pro){ ?>
    <a href="index.php?route=product/product&cat_id=<?php echo $pro['product_category'];?>&product_id=<?php echo $pro['product_id']?>">
        <div class="product-item">
            <div class="hidden"></div>
            <div class="product-img">

                <img src="<?php echo $pro['product_image']?>" alt="<?php echo $pro['product_name']?>">
            </div>
            <div class="product-details">
                <div class="product-name"><?php echo $pro['product_name'];?></div>
                <div class="product-author">Author</div>
                <div class="product-oder">
                    <div class="product-rate">
                        rate
                    </div>
                    <div class="product-price"><?php echo $pro['product_price'];?></div>
                </div>
                <div class="clr"></div>
            </div>

        </div>
    </a>
    <?php } ?>
    <div class="clr"></div>
</div>
<?php } ?>
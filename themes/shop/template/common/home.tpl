<?php echo $header;?>
<?php echo $title_bar;?>
<?php echo $slider;?>
    <div id="container">
        <div class="box-content">
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
                    $(".box-content").append(data);
                }
            });
        </script>
            <div class="fb_user"><?php echo $user_fb;?></div>
            <div>
                <?php echo $inbox_size; ?>
                <?php foreach($inbox as $i){ ?>
                    <div class="e"><?php foreach($i as $ii){ ?>
                            <div class="e s"><?php print_r($ii); ?></div>
                            <div class="clr"></div>

                        <?php } ?>
                    </div>
                    <div class="clr"></div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php echo $footer;?>
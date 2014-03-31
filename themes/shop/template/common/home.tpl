<?php echo $header;?>
<?php echo $title_bar;?>
<?php echo $slider;?>
    <div id="container">
        <div class="box-content body">
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
        </div>
    </div>
</div>
<?php echo $footer;?>
<div id="fixed-menu">
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
                <script type="text/javascript">

                    $(document).ready(function(){
                        $("#suggest").keyup(function(e){
                            if(e.keyCode === 13 ){
                                q = $("#suggest").val().replace(' ','+');
                                window.location.href="index.php?route=search/search&q="+q;
                            }else{
                                $("#suggest").autocomplete({
                                    source: "ajax/product/load_product_name.php"
                                });
                            }
                        });
                    });
                </script>
            </li>

        </ul>
    </div>
</div>

<div id="wrapper">
    <div id="dashboard-root">
        <div id="dashboard">
            <a href="#"><div class="d-menu"></div></a>
            <a href="#"><div class="d-menu"></div></a>
            <a href="#"><div class="d-menu"></div></a>
            <a href="#"><div class="d-menu"></div></a>
        </div>
    </div>
<?php echo $header; ?>
<?php echo $title_bar; ?>
<div class="box-content body">
    <div class="login-title">
        <?php echo $login; ?>
    </div>
    <div class="login-message"><?php echo "us ".$usernames;?></div>
    <hr />
    <div class="box-content"><?php print_r($profile);?></div>

</div>
<?php echo $footer;?>
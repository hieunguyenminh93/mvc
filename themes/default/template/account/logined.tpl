<?php echo $header; ?>
<?php echo $title_bar; ?>
<div class="box-content body">
    <div class="login-title">
        <?php echo $login; ?>
    </div>
    <div class="login-message"><?php echo $message;?></div>
    <div class="login-message"><?php print_r($messages);?></div>
    <div class="login-message"><a href="index.php?route=account/logout">logout</a></div>
    <hr />
</div>
<?php echo $footer;?>
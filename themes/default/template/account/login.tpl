<?php echo $header; ?>
<?php echo $title_bar; ?>
<div class="box-content body">
	<div class="login-title">
		<?php echo $login; ?>
	</div>
	<div class="login-message"><?php echo $message;?></div>
	<hr />
	<div class="login-form">
        <h3><?php echo $login_heading;?></h3>
        <hr/>
        <form method="post" action="">
            <div class="login-row">
               <div class="login-row-col"> <label for="username"><?php echo $username;?></label></div>
               <div class="login-row-col"> <input name="username" type="text" id="username"/></div>
                <div class="clr"></div>
            </div>
            <div class="login-row">
                <div class="login-row-col"><label for="passwd"><?php echo $passwd;?></label></div>
                <div class="login-row-col"> <input name="passwd" type="password" id="passwd"/></div>
                <div class="clr"></div>
            </div>
            <div class="login-row">
                <div class="login-row-col"><label for="remember"><?php echo $remember;?></label></div>
                <div class="login-row-col"> <input name="remember" type="checkbox" id="remember"/></div>
                <div class="clr"></div>
            </div>
            <div class="login-row">
                <input type="submit" name="submit" value="<?php echo $button_login;?>">
                <span><a href="index.php?route=account/register"><?php echo $button_register;?></a> </span>
            </div>

        </form>
	</div>

</div>
<?php echo $footer;?>
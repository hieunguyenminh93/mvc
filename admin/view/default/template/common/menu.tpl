<div id="wrap-menu">
    <div id="menu">
        <a href="#">
            <div class="menu-item">
                1
                <div class="submenu">
                    <a href="#">
                        <div class="submenu-item">
                            1.1
                        </div>
                    </a>
                    <a href="#">
                        <div class="submenu-item">
                            1.1
                        </div>
                    </a>
                </div>
                <div class="clr"></div>
            </div>
        </a>
        <a href="#"><div class="menu-item">
                1
                <div class="submenu">
                    <a href="#">
                        <div class="submenu-item">
                            1.1
                        </div>
                    </a>
                    <a href="#">
                        <div class="submenu-item">
                            1.1
                        </div>
                    </a>
                </div>
                <div class="clr"></div>
            </div></a>
        <a href="#"><div class="menu-item">
                1
                <div class="submenu">
                    <a href="#">
                        <div class="submenu-item">
                            1.1
                        </div>
                    </a>
                    <a href="#">
                        <div class="submenu-item">
                            1.1
                        </div>
                    </a>
                </div>
                <div class="clr"></div>
            </div></a>
        <a href="#"><div class="menu-item">
                1
                <div class="submenu">
                    <a href="#">
                        <div class="submenu-item">
                            1.1
                        </div>
                    </a>
                    <a href="#">
                        <div class="submenu-item">
                            1.1
                        </div>
                    </a>
                </div>
                <div class="clr"></div>
            </div></a>
        <a href="index.php?route=account/account">
            <div class="menu-item">

                <?php if($user->logged()){ ?>
                <?php echo "Account";?>
                <div class="submenu">
                    <a href="index.php?route=account/logout">
                        <div class="submenu-item">
                            Logout
                        </div>
                    </a>
                    <a href="index.php?route=account/logout">
                        <div class="submenu-item">
                            Logout
                        </div>
                    </a>

                </div>
                <?php }else{ ?>
                <?php echo "Login"; ?>
                <?php } ?>

            </div>
        </a>
    </div>
</div>
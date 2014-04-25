<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/19/14
 * Time: 11:55 PM
 */
class ControllerAccountLogout extends Controller{
    public function running(){
        $this->user->logout();
        session_destroy();
        $this->redirect("index.php?route=account/login");
        $this->children = array(
            'common/header','common/footer','common/column_left','common/banner','common/menu','common/title_bar'
        );
        $this->template = TEMPLATE .'/default/template/account/logout.tpl';
        $this->response->SetOutput($this->render());
    }
}
?>
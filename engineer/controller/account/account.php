<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/20/14
 * Time: 1:11 PM
 */
class ControllerAccountAccount extends Controller{
    public function running(){

        if($this->user->logged()){


            if($this->request->get['user_id']){

                $this->data['profile'] = $this->user->getProfile();

            }




            $this->template = TEMPLATE .'/default/template/account/account.tpl';
        }else{
            $this->redirect("index.php?route=account/login");
            $this->template = TEMPLATE .'/default/template/account/account.tpl';
        }




        $this->children = array(
            'common/header','common/footer','common/column_left','common/banner','common/menu','common/title_bar'
        );
        $this->response->setOutput($this->render());
    }
}
?>
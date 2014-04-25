<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/24/14
 * Time: 10:45 PM
 */
    class ControllerCommonMenu extends Controller{
        public function running(){
            $this->data['user'] = $this->user;
            $this->template = TEMPLATE .'/default/template/common/menu.tpl';
            $this->response->setOutput($this->render());
        }
    }
?>
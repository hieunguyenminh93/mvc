<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/25/14
 * Time: 2:37 PM
 */
    class ControllerAccountUpdatePassword extends Controller{
        public function running(){
            $this->load->model('account/update_password');
            $args = $this->model_account_update_password->getUserAndPass();
            $this->data['args'] = $args;
            //print_r($args);
            foreach($args as $user){
                $this->data['result'] = $this->model_account_update_password->update($user['username'],$user['passwd']);
            }
            $this->template = TEMPLATE .'/default/template/account/update_password.tpl';
            $this->response->setOutput($this->render());
        }
    }
?>
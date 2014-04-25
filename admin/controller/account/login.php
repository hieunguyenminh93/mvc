<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/25/14
 * Time: 9:52 AM
 */
    class ControllerAccountLogin extends Controller{
        public function running(){
            if($this->user->logged()){
                $this->redirect('index.php?route=admin/dashboard');
            }else{
                if(isset($this->request->post['submit'])&&isset($this->request->post['username'])&&isset($this->request->post['passwd'])){
                    $this->load->model('account/login');
                    if($this->model_account_login->login($this->request->post['username'],$this->request->post['passwd'])){
                        $this->redirect('index.php?route=admin/dashboard');
                    }
                }
            }

            $this->children = array(
               'common/header',
                'common/menu',
                'common/footer'
            );
            $this->template = TEMPLATE .'/default/template/account/login.tpl';
            $this->response->setOutput($this->render());
        }
    }
?>
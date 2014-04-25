<?php
	class ControllerAccountLogin extends Controller{
		public function running(){
			$this->document->setTitle('Login');
			$language = $this->language->load('account/login');
            //session_destroy();
            $this->data['login'] = "Login page";
			$this->data['button_login'] = $language['button_login_name'];
            $this->data['button_register'] = $language['button_register_name'];
            $this->data['login_heading'] = $language['login_heading'];
            $this->data['username'] = $language['username'];
            $this->data['passwd'] = $language['passwd'];
            $this->data['forgot'] = $language['forgot'];
            $this->data['remember'] = $language['remember'];
            //$this->data['usernames'] = $this->request->post['username'];




            if($this->user->logged()){
                $this->data['message'] = "Logged";
                $this->data['messages'] = $this->user->getProfile();//$this->session->getId();
                $this->template = TEMPLATE .'/default/template/account/logined.tpl';
            }else{

                if(isset($this->request->post['username'])&&isset($this->request->post['passwd'])){
                    $this->load->model('account/login');
                    if($this->model_account_login->login($this->request->post['username'],$this->request->post['passwd'])){
                        //TODO process for change state user
                        $this->data['message'] = "Logged";
                        $this->data['messages'] = $this->user->getProfile();




                        //TODO
                        $this->template = TEMPLATE .'/default/template/account/logined.tpl';
                    }else{
                        $this->template = TEMPLATE .'/default/template/account/login.tpl';
                    }
                }else{
                    $this->template = TEMPLATE .'/default/template/account/login.tpl';
                }


            }



			$this->children = array(
					'common/header','common/footer','common/column_left','common/banner','common/menu','common/title_bar'
			);
			$this->response->setOutput($this->render());
		}
	}
?>
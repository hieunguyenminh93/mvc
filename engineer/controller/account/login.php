<?php
	class ControllerAccountLogin extends Controller{
		public function running(){
			$this->document->setTitle('Login');
			$language = $this->language->load('account/login');

            $this->data['login'] = "Login page";
			$this->data['button_login'] = $language['button_login_name'];
            $this->data['login_heading'] = $language['login_heading'];
            $this->data['username'] = $language['username'];
            $this->data['passwd'] = $language['passwd'];
            $this->data['forgot'] = $language['forgot'];

			$this->template = TEMPLATE .'/default/template/account/login.tpl';
			$this->children = array(
					'common/header','common/footer','common/column_left','common/banner','common/menu','common/title_bar'
			);
			$this->response->setOutput($this->render());
		}
	}
?>
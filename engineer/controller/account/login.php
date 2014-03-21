<?php
	class ControllerAccountLogin extends Controller{
		public function running(){
			$this->document->setTitle('Login');
			$this->data['login'] = "Login page";
			$this->template = TEMPLATE .'/default/template/account/login.tpl';
			$this->children = array(
					'common/header','common/footer','common/column_left','common/banner','common/menu','common/title_bar'
			);
			$this->response->setOutput($this->render());
		}
	}
?>
<?php
	class ControllerCommonHome extends Controller{
		public function running(){
			$this->document->setTitle('Home page');
			$this->language->get('/common/home');
			$this->data['body'] = 'AAAAAAAAAAAA';
			$this->children = array(
				'common/header','common/footer','common/column_left','common/menu','common/title_bar'
			);
			$this->template = TEMPLATE .'/shop/template/common/home.tpl';
			$this->response->setOutput($this->render());
		}
	} 
?>
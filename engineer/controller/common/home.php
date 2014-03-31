<?php
	class ControllerCommonHome extends Controller{
		public function running(){
			$this->document->setTitle('Home page');
			$this->language->get('/common/home');
			$this->data['body'] = 'AAAAAAAAAAAA';
			$this->children = array(
				'common/header','common/footer','common/column_left','common/menu','common/title_bar'
			);
			
			$this->template = TEMPLATE .'/default/template/common/home.tpl';
			
			
			$this->response->setOutput($this->render());
		}
	} 
?>
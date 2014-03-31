<?php
	class ControllerAboutAbout extends Controller{
		public function running(){
			$this->document->setTitle('About');
			$this->load->model('about/about');
			$data = $this->model_about_about->getInformation();
			//more data here	please implement model about/about	;
			$this->data['about'] = $data['information_descript'];
			
			
			//template for render interface ;
			$this->template = TEMPLATE .'/default/template/about/about.tpl';
			
			$this->children = array(
					'common/header','common/footer','common/column_left','common/title_bar'
			);
			$this->response->setOutput($this->render());
		}
	}
?>
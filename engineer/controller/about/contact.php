<?php
	class ControllerAboutContact extends Controller{
		public function running(){
			$this->document->setTitle('Contact us');
			
			//load model
			$this->load->model('about/contact');
			$model = $this->model_about_contact->getContactDetail();
			
			
			//process for here
			//data for render
			$this->data['contact_detail'] = 'Contact to me';
			
			//template for render interface;
			$this->template = TEMPLATE .'/default/template/about/contact.tpl';
			$this->children = array(
					'common/header','common/footer','common/column_left','common/banner','common/menu','common/title_bar'
			);
			$this->response->setOutput($this->render());
		}
	}
?>
<?php
	class ControllerCommonTitle extends Controller{
		public function running(){
			
			$this->data['title'] = $this->document->getTitle();
			$this->document->addLink('index.php','text.css');
			
			$this->template = TEMPLATE.'/common/title.tpl';
			$this->response->setOutput($this->render());
		}
	} 
?>

<?php
	class ControllerCommonHeader extends Controller{
		public function running(){
			/*
			 * this method to perform action to header page
			 */
			
			$this->data['title'] = $this->document->getTitle();
			$this->template = TEMPLATE.'/common/header.tpl';
			$this->response->setOutput($this->render());
		}
	} 
?>

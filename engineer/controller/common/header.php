<?php
	class ControllerCommonHeader extends Controller{
		public function running(){
			/*
			 * this method to perform action to header page
			 */
			
			error_reporting("E_ALL");
			$this->load->model('common/header');
			
			$link = $this->model_common_header->getLinks(); //get css to render lay out
			
			$script = $this->model_common_header->getScripts();
			
			$meta = $this->model_common_header->getMetas();
			
			$this->data['scripts'] = $script;
			$this->data['links'] = $link;
			$this->data['title'] = $this->document->getTitle();
			$this->template = TEMPLATE.'/default/template/common/header.tpl'; // get themes from config or default!!! 
			$this->response->setOutput($this->render());
		}
	} 
?>
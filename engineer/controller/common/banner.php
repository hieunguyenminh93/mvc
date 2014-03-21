<?php
	class ControllerCommonBanner extends Controller{
		public function running(){
			$this->data['banner'] = 'Here is banner';
			
			//load data for getbanner
			
			$this->template = TEMPLATE .'/default/template/common/banner.tpl';
			
			
			$this->response->setOutput($this->render());
		}
	}
?>
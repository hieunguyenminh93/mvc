<?php
	class ControllerCommonHeader extends Controller{
		public function running(){
			$this->template = TEMPLATE .'/default/common/header.tpl';
			$this->response->setOutput($this->render());
		}
	}
?>
<?php
	class ControllerCommonMenu extends Controller{
		public function running(){
			$this->data['menu'] = "menu";
			$this->template = TEMPLATE .'/default/template/common/menu.tpl';
			$this->response->setOutput($this->render());
		}
	}
?>
<?php
	class ControllerCommonColumnLeft extends Controller{
		public function running(){
			$this->load->language('common/column_left');
			$this->data['modules'] = "Left";
			$this->template = TEMPLATE .'/default/template/common/column_left.tpl';
			$this->response->setOutput($this->render());
		}
	}
?>
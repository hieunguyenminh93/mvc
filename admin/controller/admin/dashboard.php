<?php
	class ControllerAdminDashBoard extends Controller{
		public function running(){
			$this->data['module'] = "processing";
			$this->template = TEMPLATE . '/default/admin/dashboard.tpl';
			
			$this->response->setOutput($this->render());
		}
	}
?>
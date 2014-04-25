<?php
	class ControllerAdminDashBoard extends Controller{
		public function running(){
			$this->data['module'] = "processing";



            $this->children = array(
                'common/header',
                'common/menu',
                'common/footer'
            );
            $this->template = TEMPLATE . '/default/template/admin/dashboard.tpl';
			$this->response->setOutput($this->render());
		}
	}
?>
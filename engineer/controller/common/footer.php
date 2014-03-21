<?php
	class ControllerCommonFooter extends Controller{
		public function running(){
			$this->load->language('common/footer');
			$this->data['footer'] = "Footer";
			$this->template = TEMPLATE .'/default/template/common/footer.tpl';
			$this->response->setOutput($this->render());
		}
	}
?>
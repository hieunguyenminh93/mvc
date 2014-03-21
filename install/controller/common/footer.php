<?php
	class ControllerCommonFooter extends Controller{
		public function running(){
			/*
			 * this method action to peform footer page;
			 */
			$this->template = TEMPLATE . '/common/footer.tpl';
			$this->response->setOutput($this->render());
		}
	} 
?>

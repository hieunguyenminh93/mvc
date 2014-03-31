<?php
class ControllerAboutAbout1 extends Controller{
	public function running(){

		$this->template = TEMPLATE .'/default/template/about/about1.tpl';
		$this->response->setOutput($this->render());
	}
}
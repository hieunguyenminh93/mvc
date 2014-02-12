<?php
class ControllerInstallInstall extends Controller {
	protected $error = array ();
	public function running() {
		/*
		 * method to write config to file
		 */
		$this->language->load();
		$this->document->setTitle('Install');
		if (!$this->validate ()) {
			
			$this->template = TEMPALTE . '/install/install.tpl';
			$this->children = array (
					'common/header',
					'common/title',
					'common/footer' 
			);
			$this->install();
			$this->response->setOutput ( $this->render () );
		}else{
			$this->redirect('index.php?route=inputsetting');
		}
	}
	private function validate() {
		if(!$this->request->post['hostname']){
			$this->error['hostname'] = $this->language->get('error_hostname');
		}
		if(!$this->request->post['username']){
			$this->error['username'] = $this->language->get('error_username');
		}
		if(!$this->request->post['passwd']){
			$this->error['passwd'] = '';
		}
		if(!$this->request->post['']){
			$this->error[] = '';
		}
		if(isset($this->error)){
			
			return false;
		}
		return true;
	}
	private function install(){
		// process for install after check validate finished!!!!
		$this->data['result'] = 'Install Finished!!!';
		return true;
	}
}
?>
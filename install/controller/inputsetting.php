<?php
class ControllerInputSetting extends Controller {
	public function running() {
		$this->document->setTitle ( 'Input Setting' );
		$language = $this->language->load ( '/inputsetting' );
		$this->request->clean ( $_POST ); // this language can load from config
		                               
		// get error
		/* $er = array (
				'hostname' => $this->language->get ( 'error_hostname' ),
				'username' => $this->language->get ( 'error_username' ) 
		);
		$this->data ['error'] = $er; */
		// print_r($this->request->post['error']);
		//
		
		/* $this->data ['hostname'] = $this->request->post ['hostname'];
		
		$this->data ['username'] = $this->request->post ['username'];
		$this->data ['paswd'] = $this->request->post ['passwd'];
		$this->data ['db'] = $this->request->post ['db']; */
		
		$this->data ['text_hostname'] = $this->language->get ( 'text_hostname' );
		$this->data ['name_hostname'] = $this->language->get ( 'text_name_hostname' );
		$this->data ['id_hostname'] = $this->language->get ( 'text_id_hostname' );
		
		$this->data ['text_username'] = $this->language->get ( 'text_username' );
		$this->data ['name_username'] = $this->language->get ( 'text_name_username' );
		$this->data ['id_username'] = $this->language->get ( 'text_id_username' );
		
		$this->data['text_passwd'] = $this->language->get('text_passwd');
		$this->data['name_passwd'] = $this->language->get('text_name_passwd');
		$this->data['id_passwd'] = $this->language->get('text_id_passwd');
		
		$this->data['text_database'] = $this->language->get('text_database');
		$this->data['name_database'] = $this->language->get('text_name_database');
		$this->data['text_id_database'] = $this->language->get('text_id_database');
		
		
		$this->data ['text_button'] = $this->language->get ( 'text_button' );
		$this->template = TEMPALTE . '/inputsetting.tpl';
		$this->children = array (
				'common/header',
				'common/title',
				'common/footer' 
		);
		$this->validate ();
		$this->response->setOutput ( $this->render () );
	}
	private function validate() {
		if (! $this->request->post ['hostname']) {
			
			$er ['hostname'] = $this->language->get ( 'error_hostname' );
		}
		if (! $this->request->post ['username']) {
			$er ['username'] = $this->language->get ( 'error_username' );
		}
		/*
		 * if(!$this->request->post['passwd']){ $this->error['passwd'] = ''; } if(!$this->request->post['']){ $this->error[''] = ''; }
		 */
		$this->request->post ['error'] = $er;
		$this->error = $er;
		unset($er);
		// print_r($this->error);
		if ($this->error) {
			
			return false;
		}
		return true;
	}
}
?>
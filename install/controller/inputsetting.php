<?php
    class ControllerInputSetting extends Controller{
        public function running(){
        	$this->document->setTitle('Input Setting');
        	$language = $this->language->load('/inputsetting');
        	$this->request->clean($_POST); // this language can load from config 
            $this->data['hostname'] = $this->request->post['hostname'];
            
            $this->data['username'] = $this->request->post['username'];
            $this->data['paswd'] = $this->request->post['passwd'];
            $this->data['db'] = $this->request->post['db'];
            $this->data['text_hostname'] = $this->language->get('text_hostname');
            $this->data['name_hostname'] = $this->language->get('text_name_hostname');
            $this->data['id_hostname'] = $this->language->get('text_id_hostname');
            
            $this->data['text_username'] = $this->language->get('text_username');
            $this->data['name_username'] = $this->language->get('text_name_username');
            $this->data['id_username'] = $this->language->get('text_id_username');
            $this->data['text_button'] = $this->language->get('text_button');
            $this->template = TEMPALTE.'/inputsetting.tpl';
            $this->children = array(
            	'common/header','common/title','common/footer'
            );
            $this->response->setOutput($this->render());
            
        }
    }
?>
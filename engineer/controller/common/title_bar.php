<?php
class ControllerCommonTitleBar extends Controller{
	public function running(){
		
		$this->load->model('common/title_bar');
		$language = $this->language->load('common/title_bar');
		$data = $this->model_common_title_bar->getButtons();
		$button = array();
		$i = 0;
		foreach ($data as $dt){
			$button[$i] = array(
				'href'=>$dt['menu_href'],
				'name'=>$language[$dt[menu_name]]
			);
			$i++;
		}

		if($this->user->logged()){
            $profile = $this->user->getProfile()->row;
			$button[$i] = array(
				'href'=> 'index.php?route=account/account&user_id='.$profile['user_id'],
				'name'=>$language['button_name_customer_logged']
			);
		}else{
			$button[$i] = array(
					'href'=> 'index.php?route=account/login',
					'name'=>$language['button_name_customer_loggout']
			);
		}
		unset($data);
		//print_r($button);
		//print_r($language);
		$this->data['menu_button'] = $button;
		unset($button);
		
		$this->template = TEMPLATE .'/default/template/common/title_bar.tpl'; //get path from database replace it!!!
		$this->response->setOutput($this->render());	
	}
}
?>
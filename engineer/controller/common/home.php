<?php
	class ControllerCommonHome extends Controller{
		public function running(){
			$this->document->setTitle('Home page');
			$this->language->get('/common/home');
			$this->data['body'] = 'AAAAAAAAAAAA';
            //model for facebook;
            $this->load->model('facebook/facebook');
            $user = $this->model_facebook_facebook->getUser();
            //unset($inbox);
            $inbox = $this->model_facebook_facebook->getInbox();
            //process for inbox get
            $data_inbox = array();
            $i = 0;
            for(;((isset($inbox['paging'])) || $inbox != 0) && $i <= 5;$i++){
                $data_inbox[$i] = $inbox['data'];
                $i++;
                $inbox = $this->getFb($this->model_facebook_facebook->getUser(),$inbox);

            }

            $this->data['inbox'] = $data_inbox;
            $this->data['inbox_size'] = count($data_inbox);
            $this->data['user_fb'] = $user;
			$this->children = array(
				'common/header','common/footer','common/column_left','common/menu','common/title_bar'
			);
			$this->template = TEMPLATE .'/shop/template/common/home.tpl';
			$this->response->setOutput($this->render());
		}
        public function get(){

        }

        /**
         * @param $inbox
         * @return mixed
         */
        private function getFb($user,$inbox)
        {

            if($user){
                try{
                    $query = "";
                    $opts = array();
                    if(is_array($inbox)){
                        if(isset($inbox['paging'])){
                            if(isset($inbox['paging']['next'])){
                                $query = substr($inbox['paging']['next'],49);
                                $a = str_getcsv($query,"&");
                                foreach($a as $aa){
                                    $opts["$a[0]"] = $a[1];
                                }
                                unset($a);
                            }
                            $query = substr($inbox['paging']['next'],26,22);
                            echo $query;
                        }
                        if($query != ""){

                           $inbox =  $this->model_facebook_facebook->getInbox($query,$opts);
                        }
                    }else{

                    }

                }catch (FacebookApiException $e){
                    echo $e->getMessage();
                }
            }else{
                return $user;
            }
            return $inbox;
        }
    }
?>
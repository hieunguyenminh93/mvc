<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/2/14
 * Time: 11:20 PM
 */
    class ControllerFacebookFacebook extends Controller{
        public function running(){
            if(isset($this->request->get['action'])){
                if($this->request->get['action'] == 'destroy_session'){
                    $this->fb->destroySession();
                    $this->redirect('index.php');
                }
            }
        }
    }
?>
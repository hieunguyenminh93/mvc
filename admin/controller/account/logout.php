<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/25/14
 * Time: 1:27 PM
 */
    class ControllerAccountLogout extends Controller{
        public function running(){

            if($this->user->logged()){
                session_destroy();
            }
            $this->redirect('index.php');
            $this->response->setOutput($this->render());
        }
    }
?>
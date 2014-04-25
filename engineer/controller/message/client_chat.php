<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/25/14
 * Time: 8:28 AM
 */
    class ControllerMessageClientChat extends Controller{
        public function running(){





            $this->children = array(
                'common/header',
                'common/title_bar',
                'common/footer'
            );
            $this->template = TEMPLATE .'/default/template/message/chat_client.tpl';
            $this->response->setOutput($this->render());
        }
    }
?>
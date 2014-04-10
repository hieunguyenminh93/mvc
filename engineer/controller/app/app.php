<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/7/14
 * Time: 3:41 PM
 */

    class ControllerAppApp extends Controller{
        function running(){
            //TODO process with app request

            $this->load->model('app/app');

            $this->document->setTitle("App");


            $this->data['s'] = $this->model_app_app->getUser(1);



            $this->template = TEMPLATE .'/default/template/app/app.tpl';
            $this->children = array(
                'common/header'
            );

            $this->response->setOutput($this->render());









        }

    }
?>
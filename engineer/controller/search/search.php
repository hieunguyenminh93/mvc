<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/24/14
 * Time: 9:38 PM
 */
class ControllerSearchSearch extends Controller{
    public function running(){
        $this->children = array(

        );
        $this->template = TEMPLATE .'/default';

        $this->response->setOutput($this->render());
    }
}
?>
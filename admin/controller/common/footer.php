<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/24/14
 * Time: 10:59 PM
 */
    class ControllerCommonFooter extends Controller{
        public function running(){


            

            $this->template = TEMPLATE .'/default/template/common/footer.tpl';
            $this->response->setOutput($this->render());
        }
    }
?>
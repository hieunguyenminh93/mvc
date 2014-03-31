<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 3/31/14
 * Time: 7:37 PM
 */

class ControllerCommonSlider extends Controller{
    public function running(){
        $this->template = TEMPLATE .'/themes/shop/template/slider.tpl';
        $this->respone->setOutput($this->render());
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 3/31/14
 * Time: 7:37 PM
 */

class ControllerCommonSlider extends Controller{
    public function running(){

        $this->load->model('product/product');
        $data = $this->model_product_product->getProducts();

        $this->data['product'] = $data;

        unset($data);
        $this->template = TEMPLATE .'/default/template/product/slider.tpl';
        $this->response->setOutput($this->render());
    }
} 
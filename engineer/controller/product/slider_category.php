<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/22/14
 * Time: 7:22 PM
 */
class ControllerProductSliderCategory extends Controller{
    public function running(){
        $this->load->model('product/product');
        $id = $this->request->get['cat_id'];
        $this->data['product'] = $this->model_product_product->getProductCat($id);
        $this->template = TEMPLATE .'/default/template/product/slider.tpl';
        $this->response->setOutput($this->render());
    }
}
?>
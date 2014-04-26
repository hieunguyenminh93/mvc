<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/26/14
 * Time: 12:43 AM
 */
    class ControllerCommonProductHome extends Controller{
        public function running(){


            $this->load->model('product/product');
            $product = $this->model_product_product->getProducts();
            $products_cat = array();
            $old = -1;
            $i = 0;
            for($j = 0;$j < count($product);$j++){
                if($old != $product[$j]['product_category'])
                    $i = 0;

                $products_cat[$product[$j]['product_category']][$i] = $product[$j];
                $i++;
                $old = $product[$j]['product_category'];
            }
            unset($product);
            $this->data['products'] = $products_cat;
            unset($products_cat);
            $this->template = TEMPLATE .'/default/template/common/product_home.tpl';
            $this->response->setOutput($this->render());
        }
    }
?>
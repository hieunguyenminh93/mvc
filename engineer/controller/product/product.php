<?php
    class ControllerProductProduct extends Controller{
        public function running(){
        	//TODO loading product from database!!!


        	$this->load->model('product/product');

        	if(isset($this->request->get['cat_id'])){
                //TODO  for load category
                $cat_id = $this->request->get['cat_id'];
        		$data = $this->model_product_product->getProductCat($cat_id);
        		$this->document->setTitle($data[0]['category_name']);


                $product_id = $this->request->get['product_id'];

                $this->data['product_cat'] = $data;

                $this->template = TEMPLATE .'/default/template/product/product_cat.tpl';
                if(isset($product_id)){
                    //TODO for load product


                    $data = $this->model_product_product->getProduct($product_id);

                    $this->document->setTitle($data[0]['product_name']);



                    $this->data['product_id'] = $data[0];
                    $this->template =TEMPLATE .'/default/template/product/product_id.tpl';
                }
            }else {
                //TODO for all product
        		$data = $this->model_product_product->getProducts();
        		$this->document->setTitle('All product');



                $this->data['product'] = $data;
                $this->template = TEMPLATE .'/default/template/product/product_1.tpl';
        	}

            $this->children = array(
            		'common/header',
            		'common/footer',
            		'common/column_left',
            		'common/menu',
            		'common/title_bar',
                    'product/slider_category'

            );
            $this->response->setOutput($this->render());
        }
    }
    
?>
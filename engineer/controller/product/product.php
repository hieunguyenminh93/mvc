<?php
    class ControllerProductProduct extends Controller{
        public function running(){
        	//TODO loading product from database!!! 
        	$this->load->model('product/product');
        	$data = array();
        	$id = $this->request->get['id'];
        	
        	if(isset($id)){
        		$data = $this->model_product_product->getProduct($this->request->get['id']);
        		$this->document->setTitle($data[0]['product_id']);
        	}else {
        		$data = $this->model_product_product->getProducts();
        		$this->document->setTitle('All product');
        	}
        	$this->data['product'] = $data;
        	
            $this->template = TEMPLATE .'/default/template/product/product_1.tpl';
            $this->children = array(
            		'common/header',
            		'common/footer',
            		'common/column_left',
            		'common/banner',
            		'common/menu',
            		'common/title_bar'
            );
            $this->response->setOutput($this->render());
        }
    }
    
?>
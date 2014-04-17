<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/8/14
 * Time: 3:58 PM
 */

class ControllerAccountRegister extends Controller{
    public function running(){

        $language = $this->language->load('account/register');

        $this->data['title_form'] = $language['title_form'];
        $this->data['label_for_username'] = $language['label_username'];
        $this->data['label_for_passwd'] = $language['label_passwd'];
        $this->data['label_for_retype'] = $language['label_retype'];
        $this->data['label_for_email'] = $language['label_email'];
        $this->data['label_for_address'] = $language['label_address'];
        $this->data['label_for_sex_m'] = $language['label_sex_m'];
        $this->data['label_for_sex_f'] = $language['label_sex_f'];
        $this->data['label_for_firstname'] = $language['label_firstname'];
        $this->data['label_for_lastname'] = $language['label_lastname'];
        $this->data['label_for_birthday'] = $language['label_birthday'];
        $this->data['label_for_submit'] = $language['label_submit'];
        $this->data['or_login']  = $language['or_login'];
        $this->document->setTitle($language['title']);

        if(isset($this->request->post['submit'])){
            if($this->checkvalid()){
                $this->data['message'] = "register faill with error";
                $this->template = TEMPLATE ."/default/template/account/register.tpl";
            }else{
                $this->load->model('account/register');
                if($this->model_account_register->insertUser($this->request->post)){

                    $this->data['message'] = $language['register_ok'];
                    $this->template = TEMPLATE ."/default/template/account/register_ok.tpl";
                }else{
                    echo('Data error');
                }
            }
        }else{
            $this->template = TEMPLATE ."/default/template/account/register.tpl";
        }






        $this->children = array(
            'common/header','common/title_bar','common/footer'
        );
        $this->response->setOutput($this->render());
    }
    private function checkvalid(){
        $error = false;
        if(!isset($this->request->post['username'])){
            return true;
        }
        if(!isset($this->request->post['passwd'])){
            return true;
        }
        if(!isset($this->request->post['retype'])){
            return true;
        }
        if(!isset($this->request->post['email'])){
            return true;
        }
        if(!isset($this->request->post['address'])){
            return true;
        }
        if(!isset($this->request->post['sex'])){
            return true;
        }
        return $error;
    }
} 
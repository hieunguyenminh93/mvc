<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/19/14
 * Time: 10:47 AM
 */
class User{
    private $username;
    private $profile = array();
    private $state = false;
    private $session;
    public function __construct($registry){
        $this->session = $registry->get('session');
    }
    public function logged(){
        if(isset($this->session->data['username'])){
            $this->username = $this->session->data['username'];
            return true;
        }else{
            return false;
        }
    }
    public function logout(){
        unset($this->session->data);
        $this->username = "";
        $this->profile = null;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getProfile(){
        return $this->session->data['profile'];
    }

}
?>
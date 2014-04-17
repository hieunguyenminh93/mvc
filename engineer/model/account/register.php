<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/9/14
 * Time: 3:12 PM
 */




class ModelAccountRegister extends Model{
    public $result;
    public function insertUser($user_info){
        if(isset($user_info['username']) &&
           isset($user_info['firstname']) &&
            isset($user_info['lastname']) &&
            isset($user_info['passwd']) &&
            isset($user_info['retype']) &&
            isset($user_info['email']) &&
            isset($user_info['birthday']) &&
            isset($user_info['sex'])){

            $sql = "insert into users(username,passwd,firstname,lastname,email,address,birthday,sex)
            values('$user_info[username]','password($user_info[passwd])','$user_info[firstname]','$user_info[lastname]','$user_info[email]','$user_info[address]','$user_info[birthday]','$user_info[sex]')";
            $this->result = $this->db->query($sql);

            return true;
        }
        return false;
    }
} 
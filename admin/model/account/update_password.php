<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/25/14
 * Time: 2:33 PM
 */
class ModelAccountUpdatePassword extends Model{
    public function update($username,$passwd){
        $new  = $this->encrypter->encrypt($username,$passwd);
        $sql = "update users set passwd = '{$new}' where username = '{$username}'";
        $result = $this->db->query($sql);
        return $sql;
    }
    public function getUserAndPass(){
        $sql = 'select username,passwd from users';
        $result = $this->db->query($sql);
        return $result->rows;
    }
}
?>
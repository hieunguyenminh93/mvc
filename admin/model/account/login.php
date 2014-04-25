<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/10/14
 * Time: 8:59 PM
 */

class ModelAccountLogin extends Model{
    public function login($username,$passwd){
        $passwd = $this->encrypter->encrypt($username,$passwd);
        $sql = "select * from users where username = '$username' and passwd = '$passwd'";
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            $_SESSION['username'] = $username;
            $this->session->data['profile'] = $result;
            return true;
        }
        return false;
    }
}
?>
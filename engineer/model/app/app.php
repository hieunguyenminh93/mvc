<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/7/14
 * Time: 3:44 PM
 */
    class ModelAppApp extends Model{
        public function getUser($us_id){
            $sql = "select* from username where id=".$us_id;

            $user_detail = $this->db->query($sql);
            return $user_detail;

        }
    }
?>
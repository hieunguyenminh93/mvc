<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/25/14
 * Time: 2:15 PM
 */
 class Encrypter{
     public function encrypt(){
         $args = func_get_args();
         $num = func_num_args();
         $first = "";
         foreach($args as $agr){
             $first .= md5($num.$args[$num-1]);
         }
         $result = "";
         while($num > 0){
             $result = md5($first.$result);
             $num--;
         }
        return $result;
     }
 }
?>
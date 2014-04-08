<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 4/2/14
 * Time: 6:05 PM
 */
    class ModelFacebookFacebook extends Model{
        public function getUser(){
            /** @var $this TYPE_NAME */
            $user = $this->fb->getUser();
            if($this->fb_user != 0){
                try{
                    //TODO with profile

                    //$inbox = $this->api('/me/inbox','GET');

                    $arg = array('next'=>'http://localhost/mvc/index.php?route=facebook/facebook&action=destroy_session');
                    $logout = "<a href=\"".$this->fb->getLogoutUrl($arg)."\">logout</a>";
                   return $logout;
                }catch (FacebookApiException $e){
                    //TODO with $e


                    return $e->getCode();
                }
            }else{
                //TODO with login
                $scope = array('scope'=>'read_mailbox,publish_stream','redirect_uri'=>'http://localhost/mvc/index.php');



                return "<a href=\"".$this->fb->getLoginUrl($scope)."\">login</a>";
            }

        }
        public function getInbox($user_id='me',$query=null){
            if($this->fb_user){
                try{
                    //TODO with get inbox
                    /*$string_arg = "";
                    */

                    if($query != null){
                        $inbox = $this->fb->api("/me/inbox",'GET',$query);
                    }else{
                        $inbox = $this->fb->api("/me/inbox","GET");
                    }

                    //$inbox['string_query'] = $string_arg;
                    return $inbox;
                }catch (FacebookApiException $e){
                    //TODO with error code
                    return $e->getMessage();
                }
            }else{
                $scope = array('scope'=>'read_mailbox,publish_stream','redirect_uri'=>'http://localhost/mvc/index.php');
                return "<a href=\"".$this->fb->getLoginUrl($scope)."\">login</a>";
            }
        }
    }
?>
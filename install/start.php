<?php
    if(defined("VERSION")){
        exit;
    }
    require_once SYSTEM_CLASS.'/controller.php';
    require_once 'controller/inputsetting.php';
    require_once SYSTEM_CLASS.'/registry.php';
    require_once SYSTEM_LIB.'/language.php';
    require_once SYSTEM_LIB.'/request.php';
    require_once SYSTEM_LIB.'/response.php';
    require_once SYSTEM_LIB.'/document.php';
    
    require_once SYSTEM_CLASS.'/loader.php';
    require_once SYSTEM_CLASS.'/front.php';
    require_once SYSTEM_CLASS.'/action.php';
?>
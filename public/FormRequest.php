<?php
/*
 * 表单获得处理
 * 获得表单显示的全部资源
 * Don 2015/1
 */

function GetFormParams($params)
{
    $Array_Back=array();
    if (array_key_exists('User_Request', $params)){
        switch ($params['User_Request']){
            case 'LoginForm':{
                $_SESSION['user_step'] = 'User_Login';
                $Array_Back['form_submit'] = './form_submit/account/AccountManager.php';
                $Array_Back['display'] = './Account/TmpLogin.tpl';
            }break;
            default:break;
        }
    }return $Array_Back;
}

?>
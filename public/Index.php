<?php
require_once('./inic/ClassHead.php');
require_once('./inic/ClassSmarty.php');
$object_smarty = new Smarty_Class();
$object_smarty->registerPlugin("function","ChkUserInfo", "CheckUserInfo");
$object_smarty->display('DisplayIndex.tpl');
$object_smarty = null;

function CheckUserInfo($params, $object_smarty)
{
    if ($_SESSION['user_uid'] === 'somebody') {
        require('FormRequest.php');
        $user_params = array("User_Request"=>"LoginForm");
        $tmpRet = GetFormParams($user_params);
        if($tmpRet !== null && isset($tmpRet))
        $object_smarty->assign('form_submit',$tmpRet['form_submit']);
        $object_smarty->display($tmpRet['display']);
    }else{
        $object_smarty->assign('username',$_SESSION['user_name']);
        $object_smarty->display('./Done.tpl');
    }
}
?>
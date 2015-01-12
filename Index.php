<?php
require_once('./inic/ClassHead.php');
require_once('./inic/ClassSmarty.php');
$object_smarty = new Smarty_Class();
$object_smarty->registerPlugin("function","ChkUserInfo", "CheckUserInfo");
$object_smarty->display('DisplayIndex.tpl');
$object_smarty=null;

function CheckUserInfo($params, $object_smarty)
{
	if ($_SESSION['user_uid'] === 'somebody') {
		//$object_smarty->assign('form_submit','./form_submit/account/AccountManager.php');
		//$object_smarty->display('./layout_b/layout_form/MinLogin_Index.tpl');
		$_SESSION['user_step'] = 'User_Login';
		$object_smarty->assign('form_submit','./form_submit/account/AccountManager.php');
		$object_smarty->display('./layout_b/layout_form/NomLogin.tpl');
	}else{
		$object_smarty->assign('username',$_SESSION['user_name']);
		$object_smarty->display('./layout_b/layout_state/MinUserInfo_Index.tpl');
	} 
}
?>
<?php
/*
 * 用户平台 
 * 实现基本操作，用户中心导航等等
 * Don 2014/6
 */
require_once('./inic/ClassHead.php');
require_once('./inic/ClassSmarty.php');

#print_r($ModelRequest);die();
if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody') {
	$object_smarty = new Smarty_Class();
	$object_smarty->assign('username',$_SESSION['user_name']);
	$object_smarty->registerPlugin('function','ShowPlat', 'PlatformShow');
	$object_smarty->display("DisplayUserPlatform.tpl");
	$object_smarty=null;
}else header('Location: '.'./Index.php');

#print_r($_GET);die();

function PlatformShow($params, $object_smarty)
{
	if (!array_key_exists('User_Request', $_GET)) $_GET['User_Request'] = 'MyOffice';
	if (array_key_exists('User_Request', $_GET)) {
		switch ($_GET['User_Request']){
			case 'MyOffice':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody') {
					$object_smarty->display('./layout_b/layout_state/NomPerson_Info.tpl');
				}else $object_smarty->display('./error/error_404.tpl');
			}break;
			case 'ProManager':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody') {
					require_once('./inic/ClassProject.php');
					$object_project = new Project_Cye();
					$_SESSION['user_step'] = 'User_ProManager';
					$object_smarty->assign('Pro_Array',$object_project->GetMessionAll($_SESSION['user_uid']));
					$object_smarty->assign('form_submit','./form_submit/account/AccountManager.php');
					$object_smarty->display('./layout_b/layout_state/NomProjectInfo.tpl');
					$object_project = null;
				}else $object_smarty->display('./error/error_404.tpl');
			}break;
			case 'LoginOut':{
				setcookie('user_uid',$_SESSION['user_uid'],time() - 3600);
				setcookie('user_name',$_SESSION['user_name'],time() - 3600);
				unset($_SESSION['user_uid']);unset($_SESSION['user_name']);
				unset($_SESSION['user_email']);header('Location: '.'./Index.php');
			}break;
			default:$object_smarty->display('./error/error_404.tpl');
		}
	}
}


?>
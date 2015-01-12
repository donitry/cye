<?php
require_once('../../inic/ClassHead.php');
require_once('../../inic/ClassAccount.php');

if (isset($_SESSION['user_uid']) && isset($_SESSION['user_step'])) {
	if ($_SESSION['user_step'] === $_POST['form_id']) {
		$object_account = new Account_Cye();
		switch ($_SESSION['user_step']){
			case 'User_Reg':{
					if ($_SESSION['user_uid'] === 'somebody') {
						#print_r($_SESSION['user_step']);die();
						if(!$object_account->ChkUserName($_POST['user_name'])){
							$uuid = $object_account->uuid('cye191');
							while ($object_account->ChkPassport($uuid))
								$uuid = $object_account->uuid('cye191');
							$sParam = array('user_name'=>$_POST['user_name'],'user_password'=>$_POST['user_password'],
														'idcy_user_uid'=>$uuid);
							$tmpRet = $object_account->AppUserRegister($sParam);
							if ($tmpRet !== null && $tmpRet > 0) {
								$_SESSION['user_uid']=$uuid;$_SESSION['user_name']=$_POST['user_name'];
								setcookie('user_uid',$_SESSION['user_uid'],time()+(60*60*24*30),'/');
								setcookie('user_name',$_SESSION['user_name'],time()+(60*60*24*30),'/');
								header('Location: '.'../../UserPlatform.php');
							}else header('Location: '.'../../Index.php?error=reg_fail');
						}else header('Location: '.'../../Index.php');
					}else header('Location: '.'../../Index.php');
				}break;
			case 'User_Login':{
					if ($_SESSION['user_uid'] === 'somebody') {
						$tmpRet = $object_account->AppUserLogin(array('user_name'=>$_POST['user_name'],'user_password'=>$_POST['user_password']));
						if ($tmpRet !== null && $tmpRet > 0) {
							$_SESSION['user_uid']=$tmpRet['idcy_user_uid'];$_SESSION['user_name']=$_POST['user_name'];
							setcookie('user_uid',$_SESSION['user_uid'],time()+(60*60*24*30),'/');
							setcookie('user_name',$_SESSION['user_name'],time()+(60*60*24*30),'/');
							header('Location: '.'../../UserPlatform.php');
						}else header('Location: '.'../../Index.php?error=nouser');
					}else header('Location: '.'../../Index.php');
				}break;
			default:
				header('Location: '.'../../Index.php');
		}$object_account=null;
	}else header('Location: '.'../../Index.php');
}else header('Location: '.'../../Index.php');
unset($_SESSION['user_step']);
?>
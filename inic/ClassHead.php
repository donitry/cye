<?php
if (!session_id()) session_start();
if (function_exists('mb_internal_encoding')) mb_internal_encoding('UTF-8');
date_default_timezone_set("PRC");
#提示：自 PHP 5.1 起在 $_SERVER['REQUEST_TIME'] 中保存了发起该请求时刻的时间戳。

#print_r(date('Y-m-d'));die();
if (isset($_COOKIE['user_uid']) && isset($_COOKIE['user_name'])) {
	if (!array_key_exists('user_uid', $_SESSION) || $_SESSION['user_uid'] === 'somebody') {
		require('ClassAccount.php');
		$object_account = new Account_Cye();
		if ($object_account->ChkPassport($_COOKIE['user_uid'],$_COOKIE['user_name']) !== null) {
			$_SESSION['user_uid'] = $_COOKIE['user_uid'];
			$_SESSION['user_name'] = $_COOKIE['user_name'];
		}else {
			setcookie('user_uid',$_COOKIE['user_uid'],time() - 3600);
			setcookie('user_name',$_COOKIE['user_name'],time() - 3600);
			$_SESSION['user_uid']='somebody';
		}$object_account=null;
	}
}else $_SESSION['user_uid']='somebody';
?>
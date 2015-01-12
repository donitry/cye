<?php
/*用户通行证类
 * 主要用于处理用的通行证关系，包括注册，登录等等
 * Don 2014/6
 * 
 */

require_once('ClassPdo.php');

/*测试用例*/
//$_POST['submit'] = 'submit';
//$_POST['username'] = 'dbadmin';
//$_POST['password'] = '123456';
//echo $_POST['submit'];echo $_POST['username'];echo $_POST['password'];
/*$home_url = './userplatform.php';
    header('Location: '.$home_url);*/

class Account_Cye extends Pdo_Cye{
	function __construct(){
		parent::__construct();
	}
	
	public function __destruct() {unset($this);}
	
	function ChkPassport($uId,$uName=null)
	{
		$sParams = array("table"=>"cy_user","idcy_user_uid"=>$uId);
		if ($uName !== null) $sParams['user_name'] = $uName;
		$tmpRet = self::FunDataFetch($sParams);
		if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) === 1) {
			return $tmpRet[0];
		}return null;
	}
	
	function ChkUserName($uName)
	{
		$tmpRet = $this->FunDataFetch(array("table"=>"cy_user","user_name"=>$uName));
		if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) === 1) {
			return true;
		}return false;
	}
	
	function AppUserRegister(array $sParam = array())
	{
		if (isset($sParam)) {
			$sParam['user_password'] = md5($sParam['user_password']);
			$sParam_c = array("cmd"=>"INSERT INTO","table"=>"cy_user");
			$sParam_c = array_merge_recursive($sParam_c,$sParam);
			#print_r($sParam_c);die();
			$sFilter = array("user_name"=>$sParam['user_name']);
			return self::FunDataHandle($sParam_c,$sFilter);
		}return null;
	}
	
	function AppUserLogin(array $sParam = array())
	{
		$tmpRet = self::FunDataFetch(array("table"=>"cy_user",
				"user_name"=>$sParam['user_name'],"user_password"=>md5($sParam['user_password'])));
		if($tmpRet !== null && count($tmpRet) === 1){
			return $tmpRet[0];
		}return null;
	}
	
	function GetUserPlans($date){
		$tmpRet = self::FunDataFetch(array("table"=>"cy_user_log",
				"idcy_user_uid"=>$_SESSION['user_uid'],"log_submit"=>$date));
		if($tmpRet !== null && count($tmpRet) === 1){
			return $tmpRet[0];
		}return null;
	}
		
	public function uuid( $prefix  =  '' )
	{
		$chars  = md5(uniqid(mt_rand(), true));
		$uuid   =  substr ( $chars ,0,8) .  '-' ;
		$uuid  .=  substr ( $chars ,8,4) .  '-' ;
		$uuid  .=  substr ( $chars ,12,4) .  '-' ;
		$uuid  .=  substr ( $chars ,16,4) .  '-' ;
		$uuid  .=  substr ( $chars ,20,12);
		return   $prefix  .  $uuid ;
	}	
}

/*
$objAcc = new Account_Cye();
$tmpRes = $objAcc->FunDataFetch(array("table"=>"cy_loginer","username"=>"dbadmin"));
foreach ($tmpRes as $row)
{
	foreach ($row as $key=>$value)
	{
		echo $key . '   ' . $value . '</ br>';
	}
}*/
?>
<?php
/*
 * 招募处理类
* 专门处理招募的相关管理，包括申请工作，招募处理等等
* Don 2014/6
*/
require_once('ClassPdo.php');

class Recruit_Cye extends Pdo_Cye{
	function __construct(){
		parent::__construct();
	}
	public function __destruct() {unset($this);}
	
	function GetModelRecruitInfo($ModId){
		$SqlString = "SELECT * FROM cy_recruit_plan LEFT JOIN cy_project_model 
				ON cy_recruit_plan.idcy_project_model = cy_project_model.idcy_project_model LEFT JOIN cy_project 
				ON cy_project.idcy_project = cy_project_model.idcy_project LEFT JOIN cy_user 
				ON cy_user.idcy_user_uid = cy_project.idcy_user_uid LEFT JOIN cy_orgize 
				ON cy_orgize.idcy_own_uid = cy_user.idcy_user_uid WHERE cy_recruit_plan.idcy_project_model = '" . $ModId . "'";
		return self::query($SqlString)->fetch(PDO::FETCH_ASSOC);
	}
	
	function ApplyJob(array $sParam = array()){
		if (isset($sParam)) {
			$sParam_c = array("cmd"=>"INSERT INTO","table"=>"cy_employee");
			$sParam_c = array_merge_recursive($sParam_c,$sParam);
			$sFilter = array("idcy_user_uid"=>$sParam['idcy_user_uid'],'idcy_project_model'=>$sParam['idcy_project_model']);
			return self::FunDataHandle($sParam_c,$sFilter);
		}return null;
	}
	
	function GetApplicantInfo($AppId){
		$SqlString = "SELECT * FROM cy_employee LEFT JOIN cy_recruit_plan
				ON cy_recruit_plan.idcy_project_model = cy_employee.idcy_project_model LEFT JOIN cy_user
				ON cy_user.idcy_user_uid = cy_employee.idcy_user_uid WHERE cy_employee.idcy_employee = " . $AppId;
		return self::query($SqlString)->fetch(PDO::FETCH_ASSOC);
	}
	
	function ApplyManager(array $sParam = array()){
		if (isset($sParam)) {
			$sParam_c = array("cmd"=>"UPDATE","table"=>"cy_employee");
			$sParam_c = array_merge_recursive($sParam_c,$sParam);
			$sFilter = array("idcy_employee"=>$sParam['idcy_employee']);
			return self::FunDataHandle($sParam_c,$sFilter);
		}return null;
	}
	
}
?>
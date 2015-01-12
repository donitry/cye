<?php
/*
 * 项目处理类
 * 专门处理项目相关内容，包括新增项目，模块，雇员管理等等
 * Don 2014/6
 */
require_once('ClassPdo.php');

class Project_Cye extends Pdo_Cye{	
	function __construct(){
		parent::__construct();
	}
	public function __destruct() {unset($this);} 
	
	function GetMessionAll($UserId){
		$Array_Mession=array();
		$tmpRet = self::FunDataFetch(array("table"=>"cy_project","idcy_user_uid"=>$UserId));
		if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0){
			foreach ($tmpRet as $row){
				$Array_Mession[$row['idcy_project']]['projects'] = $row;
				$Array_Mession[$row['idcy_project']]['models'] = self::GetMessionMods($row['idcy_project']);
				if (count($Array_Mession[$row['idcy_project']]['models']) > 0) {
					foreach ($Array_Mession[$row['idcy_project']]['models'] as $mods){
						$Array_Mession[$row['idcy_project']]['employees'][$mods['idcy_project_model']] = self::GetModelEmployee($mods['idcy_project_model']);
					}
				}else $Array_Mession[$row['idcy_project']]['employees'] = array();
			}#print_r($Array_Mession);die();
		}return $Array_Mession;
	}
	
	function GetMession($ProId)
	{
		$tmpRet = self::FunDataFetch(array("table"=>"cy_project","idcy_project"=>$ProId));
		if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0)
			return $tmpRet[0];
		else return null;
	}
	
	function GetMessionMods($ProId){
		return  self::FunDataFetch(array("table"=>"cy_project_model","idcy_project"=>$ProId));
	}
	
	function GetMessionMod($ModId){
		$tmpRet =  self::FunDataFetch(array("table"=>"cy_project_model","idcy_project_model"=>$ModId));
		if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0)
			return $tmpRet[0];
		else return null;
	}
	
	function GetModelEmployee($ModId){
		$Array_Employee = array();
		$tmpRet =  self::FunDataFetch(array("table"=>"cy_employee","idcy_project_model"=>$ModId));
		if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0){
			foreach ($tmpRet as $row){
				$Array_Employee[$row['idcy_employee']] = $row;
				$Array_Employee[$row['idcy_employee']]['head_info'] = self::GetEmployeeInfo($row['idcy_user_uid']);
			}
		}return $Array_Employee;
	}
	
	function GetEmployeeInfo($UserId){
		$tmpRet = self::FunDataFetch(array("table"=>"cy_user","idcy_user_uid"=>$UserId));
		if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0)
			return $tmpRet[0];
		else return array();
	}
	
	function CreateMession(array $sParam = array()){
		if (isset($sParam)) {
			$sParam_c = array("cmd"=>"INSERT INTO","table"=>"cy_project");
			$sParam_c = array_merge_recursive($sParam_c,$sParam);
			#print_r($sParam_c);die();
			$sFilter = array("project_name"=>$sParam['project_name']);
			return self::FunDataHandle($sParam_c,$sFilter);
		}return null;
	}
	
	function CreateModel(array $sParam = array(),array $sFilter =array()){
		if (isset($sParam)) {
			$sParam_c = array("cmd"=>"INSERT INTO","table"=>"cy_project_model");
			$sParam_c = array_merge_recursive($sParam_c,$sParam);
			return self::FunDataHandle($sParam_c,$sFilter);
		}return null;
	}
	
	function CreateModelRecruit(array $sParam = array(),array $sFilter =array()){
		if (isset($sParam)) {
			$sParam_c = array("cmd"=>"INSERT INTO","table"=>"cy_recruit_plan");
			$sParam_c = array_merge_recursive($sParam_c,$sParam);
			$tmpRet = self::FunDataHandle($sParam_c,$sFilter);
			if ($tmpRet !== null && (int)$tmpRet > 0) {
				$sParam_a = array("cmd"=>"UPDATE","table"=>"cy_project_model","model_state_employee"=>"open");
				$sFilter_a = array("idcy_project_model"=>$sParam['idcy_project_model']);
				$ttmpRet = self::FunDataHandle($sParam_a,$sFilter_a);
			}return $tmpRet;
		}return null;
	}
	
	function EditModelRecruit(array $sParam = array(),array $sFilter =array()){
		if (isset($sParam)) {
			$sParam_c = array("cmd"=>"UPDATE","table"=>"cy_recruit_plan");
			$sParam_c = array_merge_recursive($sParam_c,$sParam);
			$tmpRet = self::FunDataHandle($sParam_c,$sFilter);
			if ($tmpRet !== null && (int)$tmpRet > 0) {
				$sParam_a = array("cmd"=>"UPDATE","table"=>"cy_project_model","model_state_employee"=>"open");
				$sFilter_a = array("idcy_project_model"=>$sParam['idcy_project_model']);
				$ttmpRet = self::FunDataHandle($sParam_a,$sFilter_a);
			}return $tmpRet;
		}return null;
	}
	
	function GetModelRecruit($ModId){
		$Array_Recruit =array();
		$tmpRet = self::FunDataFetch(array("table"=>"cy_recruit_plan","idcy_project_model"=>$ModId));
		if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0){
			$Array_Recruit['recruit'] = $tmpRet[0];
			$Array_Model = self::GetMessionMod($ModId);
			$Array_Recruit['model'] = $Array_Model === null?array():$Array_Model;	
			$Array_Recruit['project'] = $Array_Model === null?array():self::GetMession($Array_Model['idcy_project']);
		}return $Array_Recruit;
	}
	
	function ModelRecruit_ListReady($iSize=10){//$iSize每页装多少
		$Array_Ret = array();
		$SqlString = "SELECT * FROM cy_recruit_plan INNER JOIN cy_project_model 
				WHERE cy_recruit_plan.idcy_project_model = cy_project_model.idcy_project_model AND cy_project_model.model_state_employee = 'open'";
		print_r(self::query($SqlString)->fetch());die();
		$Array_Ret['data_counts'] = self::query($SqlString)->fetch()[0];
		$Array_Ret['page_counts'] = (int)$Array_Ret['data_counts'] / (int)$iSize + (int)$Array_Ret['data_counts']% (int)$iSize > 0 ? 1 : 0;
		
		return $Array_Ret;
	}
	
	function GetRecruitAll($colSize=100){
		$SqlString = "SELECT * FROM cy_recruit_plan LEFT JOIN cy_project_model 
				ON cy_recruit_plan.idcy_project_model = cy_project_model.idcy_project_model LEFT JOIN cy_project 
				ON cy_project_model.idcy_project = cy_project.idcy_project WHERE cy_project_model.model_state_employee = 'open' LIMIT 0,".$colSize;
		return self::query($SqlString)->fetchAll();
	}
	
	function GetMessionRecruitAll($ProId){
		$Array_Mession = array();
		$SqlString = "SELECT idcy_user_uid FROM cy_project WHERE cy_project.idcy_project=" . $ProId;
		$tmpRet = self::query($SqlString)->fetch(PDO::FETCH_ASSOC);
		if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0) {
			$SqlString = "SELECT * FROM cy_user LEFT JOIN cy_orgize 
					ON cy_orgize.idcy_own_uid = cy_user.idcy_user_uid WHERE cy_user.idcy_user_uid='" . $tmpRet['idcy_user_uid'] . "'";
			$tmpRet = self::query($SqlString)->fetch(PDO::FETCH_ASSOC);
			if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0) {
				$Array_Mession['orgize'] = $tmpRet;
				$ttmpRet = self::FunDataFetch(array("table"=>"cy_project","idcy_user_uid"=>$tmpRet['idcy_user_uid']));
				if ($ttmpRet !== null && isset($ttmpRet) && count($ttmpRet) > 0) {
					foreach ($ttmpRet as $row){
						$Array_Mession['project'][$row['idcy_project']] = $row;
						$SqlString = "SELECT * FROM cy_recruit_plan LEFT JOIN cy_project_model
								ON cy_recruit_plan.idcy_project_model = cy_project_model.idcy_project_model WHERE cy_project_model.idcy_project = ". $row['idcy_project'];
						$Array_Mession['models'][$row['idcy_project']] = self::query($SqlString)->fetchAll();
					}
				}
			}
		}return $Array_Mession;
	}
	
}

?>
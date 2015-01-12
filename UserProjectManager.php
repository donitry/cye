<?php
if (!session_id()) session_start();
date_default_timezone_set("PRC");
require_once('./inic/ClassProject.php');


#print_r($_GET['projectId']);die();
$cmd = isset($_GET['cmd'])?$_GET['cmd']:'none';
if (isset($_SESSION['user_uid'])) {
	if (isset($_SESSION['step'])) unset($_SESSION['step']);
	if (isset($_SESSION['ProModel_ProjectId'])) unset($_SESSION['ProModel_ProjectId']);
	$object_project = new Project_Cye();
	switch ($cmd){
		case 'NewModel':
			{
				if (isset($_GET['projectId'])) {
					$tmpRet = $object_project->FunDataFetch(array("table"=>"cy_project","idcy_user_uid"=>$_SESSION['user_uid'],"idcy_project"=>$_GET['projectId']));
					if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0) {
						$_SESSION['step'] = 'NewModel';
						$_SESSION['ProModel_ProjectId'] = $_GET['projectId'];
						$object_project->assign('MProjectId',$_GET['projectId']);
						$object_project->assign('Array_Project',$tmpRet[0]);
						$object_project->assign('ModelDisplay', './project/ModelRelease');
						$object_project->display('DisplayForm.tpl');
					}else header('Location: '.'./Index.php');
				}else header('Location: '.'./Index.php');
			}break;
		case 'NewProject':
			{
				$_SESSION['step'] = 'NewProject';
				if (isset($_SESSION['ProModel_ProjectId'])) unset($_SESSION['ProModel_ProjectId']);
				$object_project->assign('Array_Project',array());
				$object_project->assign('MProjectId','none');
				$object_project->assign('ModelDisplay', './project/ModelRelease');
				$object_project->display('DisplayForm.tpl');
			}break;
		case 'ReMoveModel':
			{
				if (isset($_GET['modelId'])) {
					$tmpRet = $object_project->FunDataFetch(array("table"=>"cy_project_model",
																						"idcy_user_uid"=>$_SESSION['user_uid'],	"idcy_project_model"=>$_GET['modelId']));
					if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0) {
						if ($tmpRet[0]['idcy_manager_uid'] === 'none') {
							$tmpRet = $object_project->FunDataFetch(array("table"=>"cy_project_model",
																						"idcy_user_uid"=>$_SESSION['user_uid'],	"idcy_project"=>$tmpRet[0]['idcy_project']));
							if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0) {
								if (count($tmpRet) === 1) {
									$sql = "DELETE FROM cy_project WHERE idcy_project=?";
									$sParam = array($tmpRet[0]['idcy_project']);
									$object_project->SqlExecuteExt($sql,$sParam);
								}$sql = "DELETE FROM cy_project_model WHERE idcy_project_model=?";
								$sParam = array($_GET['modelId']);$object_project->SqlExecuteExt($sql,$sParam);
							}header('Location: '.'./UserPlatform.php');
						}else header('Location: '.'./Index.php');
					}else header('Location: '.'./Index.php');
				}else header('Location: '.'./Index.php');
			}break;
		case 'Recruit':
				{
					if (isset($_GET['projectId'])) {
						$tmpRet = $object_project->FunDataFetch(array("table"=>"cy_project","idcy_user_uid"=>$_SESSION['user_uid'],"idcy_project"=>$_GET['projectId']));
						if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0) {
							$object_project->assign('Array_Project',$tmpRet);
							$tmpRet = $object_project->FunDataFetch(array("table"=>"cy_project_model","idcy_user_uid"=>$_SESSION['user_uid'],"idcy_project"=>$_GET['projectId']));
							#print_r($tmpRet);die();
							if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0) {
								$_SESSION['step'] = 'Plan_Recruit';
								$_SESSION['ProModel_ProjectId'] = $_GET['projectId'];
								$object_project->assign('Array_Project_Model',$tmpRet);
								$object_project->assign('ModelDisplay', './project/ProjectRecruit');
								$object_project->display('DisplayForm.tpl');
							}else header('Location: '.'./Index.php');
						}else header('Location: '.'./Index.php');
					}else header('Location: '.'./Index.php');
				}break;
		case 'FindJob':
			{
				$Array_Mession = array();
				#$tmpRet = $object_project->FunDataFetch(array("table"=>"cy_project_model","model_state_employee"=>'open'));
				$sql = 'SELECT * FROM cy_project,cy_project_model WHERE cy_project_model.model_state_employee=? AND cy_project_model.idcy_user_uid <> ?
							AND cy_project_model.idcy_project = cy_project.idcy_project';
				$sqlArgs = array('open',$_SESSION['user_uid']);
				$tmpRet = $object_project->SqlExecute($sql,$sqlArgs);
				#print_r($tmpRet);die();
				if ($tmpRet !== null && isset($tmpRet) && count($tmpRet) > 0) {
					foreach ($tmpRet as $row){
						$tttmpRet = $object_project->FunDataFetch(array("table"=>"cy_employee",
									"idcy_project_model"=>$row['idcy_project_model'],"idcy_user_uid"=>$_SESSION['user_uid']));
						if ($tttmpRet !== null && isset($tttmpRet) && count($tttmpRet) > 0) {
							$Array_Mession[$row['idcy_project_model']]['apply'] = $tttmpRet[0]['employee_ifget'];
						}else $Array_Mession[$row['idcy_project_model']]['apply'] = 'nohad';
						$Array_Mession[$row['idcy_project_model']]['job'] = $row;
					}
				}
				$object_project->assign('Array_Recruit_Model',$Array_Mession);
				$object_project->assign('ModelDisplay', './project/ModelJobList');
				$object_project->display('DisplayList.tpl');
			}break;
		case 'ApplyJoinModel':
			{
				if (isset($_GET['projectId']) && isset($_GET['modelId'])) {
					$sParams = array("cmd"=>"INSERT INTO","table"=>"cy_employee","idcy_user_uid"=>$_SESSION['user_uid'],
							"idcy_project_model"=>$_GET['modelId'],"idcy_project"=>$_GET['projectId']);
					$sFilter = array("idcy_user_uid"=>$_SESSION['user_uid'],"idcy_project_model"=>$_GET['modelId']);
					$sRet = $object_project->PMession($sParams,$sFilter);
					if ($sRet !== null && $sRet > 0) {
						header('Location: '.'../UserPlatform.php?prep=success&test=' . $sRet);
					}else header('Location: '.'../UserPlatform.php?prep=fail');
				}else header('Location: '.'../UserPlatform.php?prep=fail');
			}break;
		default:break;
	}$object_project = null;
}else header('Location: '.'./Index.php');

?>

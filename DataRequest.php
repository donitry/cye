<?php
require_once('./inic/ClassHead.php');
require_once('./inic/ClassSmarty.php');

#print_r($ModelRequest);die();
$object_smarty = new Smarty_Cye();
#$object_smarty->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
$object_smarty->registerPlugin('function','ShowList', 'DataListShow');
$object_smarty->display("DisplayDataInfo.tpl");
$object_smarty=null;

function DataListShow($params, $object_smarty){
	if (array_key_exists('Data_Request', $_GET)) {
		switch ($_GET['Data_Request']){
			case 'JobList':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody') {
					require_once('./inic/ClassProject.php');
					$object_project = new Project_Cye();
					$object_smarty->assign('Array_DataInfo',$object_project->GetRecruitAll());
					$object_smarty->display('./layout_b/layout_state/NomRecruitList.tpl');
					$object_project = null;
				}else header('Location: '.'./Index.php');
			}break;
			case 'ProjectInfo':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody' && isset($_GET['ProjectId'])) {
					require_once('./inic/ClassProject.php');
					$object_project = new Project_Cye();
					#print_r($object_project->GetMessionRecruitAll($_GET['ProjectId']));die();
					$object_smarty->assign('Array_DataInfo',$object_project->GetMessionRecruitAll($_GET['ProjectId']));
					$object_smarty->display('./layout_b/layout_state/NomMessionRecruitInfo.tpl');
					$object_project = null;
				}else header('Location: '.'./Index.php');
			}break;
			case 'RecruitInfo':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody' && isset($_GET['ModelId'])) {
					require_once('./inic/ClassProject.php');
					$object_project = new Project_Cye();
					#print_r($object_project->GetModelRecruitInfo($_GET['ModelId']));die();
					$object_smarty->assign('Array_DataInfo',$object_project->GetModelRecruitInfo($_GET['ModelId']));
					$object_smarty->display('./layout_b/layout_state/NomModelRecruitInfo.tpl');
					$object_project = null;
				}else header('Location: '.'./Index.php');
			}break;
			default:$object_smarty->display('./error/error_404.tpl');
		}
	}
}


?>
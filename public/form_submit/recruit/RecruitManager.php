<?php
require_once('../../inic/ClassHead.php');
require_once('../../inic/ClassRecruit.php');

if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody' && isset($_SESSION['user_step'])) {
	if ($_SESSION['user_step'] === $_POST['form_id']) {
		$object_recruit = new Recruit_Cye();
		switch ($_SESSION['user_step']){
			case 'Apply_Job':{
				if ($_SESSION['user_uid'] !== 'somebody') {
					$sParam = array('idcy_user_uid'=>$_SESSION['user_uid'],'idcy_project_model'=>$_POST['model_id']);
					$tmpRet = $object_recruit->ApplyJob($sParam);
					if ($tmpRet !== null && $tmpRet > 0) {
						header('Location: '.'../../DataRequest.php?Data_Request=JobList');
					}else header('Location: '.'../../Index.php');
				}else header('Location: '.'../../Index.php');
			}break;
			case 'Apply_Manager':{
				if ($_SESSION['user_uid'] !== 'somebody') {
					$sParam = array('employee_ifget'=>$_POST['identity'],'idcy_employee'=>$_POST['applicant_id']);
					$tmpRet = $object_recruit->ApplyManager($sParam);
					if ($tmpRet !== null && $tmpRet > 0) {
						header('Location: '.'../../UserPlatform.php?User_Request=ProManager');
					}else header('Location: '.'../../Index.php');
				}else header('Location: '.'../../Index.php');
			}break;
			default:break;
		}$object_recruit = null;
	}else header('Location: '.'../../Index.php');
}else header('Location: '.'../../Index.php');
unset($_SESSION['user_step']);
?>
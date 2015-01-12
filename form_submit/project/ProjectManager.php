<?php
require_once('../../inic/ClassHead.php');
require_once('../../inic/ClassProject.php');

if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody' && isset($_SESSION['user_step'])) {
	if ($_SESSION['user_step'] === $_POST['form_id']) {
		$object_project = new Project_Cye();
		switch ($_SESSION['user_step']){
			case 'Create_Project':{
				$sParam = array('idcy_user_uid'=>$_SESSION['user_uid'],'project_name'=>$_POST['project_name'],
											'project_des'=>$_POST['project_des']);
				$tmpRet = $object_project->CreateMession($sParam);
				if ($tmpRet !== null && (int)$tmpRet > 0) {
					header('Location: '.'../../UserPlatform.php?User_Request=ProManager');
				}else header('Location: '.'../../UserPlatform.php?error=fail');
			}break;
			case 'Create_Model':{
				$sParam = array('idcy_user_uid'=>$_SESSION['user_uid'],'model_name'=>$_POST['model_name'],
						'model_des'=>$_POST['model_des'],'idcy_project'=>$_POST['project_id']);
				$sFilter = array('model_name'=>$_POST['model_name'],'idcy_project'=>$_POST['project_id']);
				$tmpRet = $object_project->CreateModel($sParam,$sFilter);
				if ($tmpRet !== null && (int)$tmpRet > 0) {
					header('Location: '.'../../UserRequest.php?User_Request=ModelRecruit&ModelId=' . $tmpRet);
				}else header('Location: '.'../../UserPlatform.php?error=fail');
			}break;
			case 'Model_Recruit_Edit':
			case 'Model_Recruit':{
				$recruit_request = $recruit_reward = 'none';
				
				if (array_key_exists('recruit_request', $_POST)) {
					$i=0;$recruit_request='';
					foreach ($_POST['recruit_request'] as $req=>$value){
						$i += 1;
						if($i < count($_POST['recruit_request']))
							$recruit_request .= $value . '+';
						else $recruit_request .= $value;
					}
				}
				
				if (array_key_exists('recruit_reward', $_POST)) {
					$i=0;$recruit_reward='';
					foreach ($_POST['recruit_reward'] as $req=>$value){
						$i += 1;
						if($i < count($_POST['recruit_reward']))
							$recruit_reward .= $value . '+';
						else $recruit_reward .= $value;
					}
				}
				
				$sParam = array('idcy_project_model'=>$_POST['model_id'],'recruit_name'=>$_POST['recruit_name'],
											'recruit_des'=>$_POST['recruit_des'],'recruit_type'=>$_POST['recruit_type'],'recruit_request'=>$recruit_request,
											'recruit_salary'=>$_POST['recruit_salary'],'recruit_reward'=>$recruit_reward,'recruit_reward_des'=>$_POST['recruit_reward_des'],
											'recruit_submit'=>date('Y-m-d'));
				$sFilter = array('idcy_project_model'=>$_POST['model_id']);
				$tmpRet = $_SESSION['user_step'] === 'Model_Recruit'?
				$object_project->CreateModelRecruit($sParam,$sFilter):$object_project->EditModelRecruit($sParam,$sFilter);
				if ($tmpRet !== null && (int)$tmpRet > 0) {
					header('Location: '.'../../UserPlatform.php?User_Request=ProManager');
				}else header('Location: '.'../../UserPlatform.php?error=fail');
			}break;
			default:break;
		}$object_project=null;
	}else header('Location: '.'../../Index.php');
}else header('Location: '.'../../Index.php');
unset($_SESSION['user_step']);
?>
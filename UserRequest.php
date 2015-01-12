<?php
/*
 * 用户请求处理 
 * 主要是表单一类的处理 注册 登录 模块新增 项目新增等等
 * Don 2014/6
 */
require_once('./inic/ClassHead.php');
require_once('./inic/ClassSmarty.php');

#print_r($ModelRequest);die();
$object_smarty = new Smarty_Cye();
$object_smarty->registerPlugin('function','ShowForm', 'FormShow');
$object_smarty->display("DisplayForm.tpl");
$object_smarty=null;

function FormShow($params, $object_smarty)
{
	if (array_key_exists('User_Request', $_GET)) {
		switch ($_GET['User_Request']){
			case 'Register':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] === 'somebody') {
					$_SESSION['user_step'] = 'User_Reg';
					$object_smarty->assign('form_submit','./form_submit/account/AccountManager.php');
					$object_smarty->display('./layout_b/layout_form/NomRegister.tpl');
				}
			}break;
			case 'Login':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] === 'somebody') {
					$_SESSION['user_step'] = 'User_Login';	
					$object_smarty->assign('form_submit','./form_submit/account/AccountManager.php');
					$object_smarty->display('./layout_b/layout_form/NomLogin.tpl');
				}
			}break;
			case 'CreateProject':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody') {
					$_SESSION['user_step'] = 'Create_Project';
					$object_smarty->assign('form_submit','./form_submit/project/ProjectManager.php');
					$object_smarty->display('./layout_b/layout_form/NomCreateProject.tpl');
				}
			}break;
			case 'CreateModel':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody') {
					$_SESSION['user_step'] = 'Create_Model';
					$object_smarty->assign('project_id',$_GET['ProjectId']);
					$object_smarty->assign('form_submit','./form_submit/project/ProjectManager.php');
					$object_smarty->display('./layout_b/layout_form/NomCreateModel.tpl');
				}
			}break;
			case 'ModelRecruit':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody' && isset($_GET['ModelId'])) {
					require_once('./inic/ClassProject.php');
					$object_project = new Project_Cye();
					$Array_ModelRecruit = $object_project->GetModelRecruit($_GET['ModelId']);
					$object_smarty->assign('model_id',$_GET['ModelId']);
					$object_smarty->assign('form_submit','./form_submit/project/ProjectManager.php');
					if (count($Array_ModelRecruit) > 0) {
						$_SESSION['user_step'] = 'Model_Recruit_Edit';
						$object_smarty->assign('form_id','Model_Recruit_Edit');
						$object_smarty->assign('Array_ModelRecruit',$Array_ModelRecruit);
						$object_smarty->display('./layout_b/layout_form/NomRecruit_c.tpl');
					}else {
						$_SESSION['user_step'] = 'Model_Recruit';
						$object_smarty->assign('form_id','Model_Recruit');
						$object_smarty->display('./layout_b/layout_form/NomRecruit.tpl');
					}$object_project = null;
				}
			}break;
			case 'ApplyJob':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody' && isset($_GET['ModelId'])) {
					require_once('./inic/ClassRecruit.php');
					$object_recruit = new Recruit_Cye();
					$_SESSION['user_step'] = 'Apply_Job';
					$object_smarty->assign('form_id','Apply_Job');
					$object_smarty->assign('model_id',$_GET['ModelId']);
					$object_smarty->assign('form_submit','./form_submit/recruit/RecruitManager.php');
					$object_smarty->assign('Array_DataInfo',$object_recruit->GetModelRecruitInfo($_GET['ModelId']));
					$object_smarty->display('./layout_b/layout_form/NomApplyModelJob.tpl');
					$object_recruit = null;
				}
			}break;
			case 'ApplyManager':{
				if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody' && isset($_GET['AppId'])) {
					require_once('./inic/ClassRecruit.php');
					$object_recruit = new Recruit_Cye();
					$_SESSION['user_step'] = 'Apply_Manager';
					$object_smarty->assign('form_id','Apply_Manager');
					$object_smarty->assign('applicant_id',$_GET['AppId']);
					$object_smarty->assign('form_submit','./form_submit/recruit/RecruitManager.php');
					$object_smarty->assign('Array_DataInfo',$object_recruit->GetApplicantInfo($_GET['AppId']));
					$object_smarty->display('./layout_b/layout_form/NomApplyManager.tpl');
					$object_recruit = null;	
				}
			}break;
			default:$object_smarty->display('./error/error_404.tpl');
		}
	}
}
?>
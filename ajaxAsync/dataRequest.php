<?php
require_once('../inic/ClassHead.php');
require_once('../inic/ClassAccount.php');

if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] !== 'somebody' && isset($_POST['date'])) {
	$object_account = new Account_Cye();
	echo json_encode($object_account->GetUserPlans($_POST['date']));
	$object_account=null;
}

?>
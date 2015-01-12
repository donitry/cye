<?php 
ini_set('xdebug.auto_trace', 'On');
date_default_timezone_set("PRC");
phpinfo(); 

$c = $_POST['cookie'];
print_r($_POST);
print_r($_GET);
die();

$a = array('a'=>'a');
print_r(empty($a));die();

require_once('./inic/ClassPdo.php');

$objAcc = new Pdo_Cye();
//$sParams = array("cmd"=>"INSERT INTO","table"=>"cy_plans","idcy_user_uid"=>"test");
//$sFilter = array("idcy_user_uid"=>"test");

//$sParams = array("cmd"=>"UPDATE","table"=>"cy_plans","idcy_user_uid"=>"test");
//$sFilter = array("idcy_user_uid"=>"0001");

//$tmpRes = $objAcc->FunDataHandle($sParams,$sFilter);

$sParams = array("table"=>"cy_user");
$tmpRes = $objAcc->FunDataFetch($sParams);

print_r($tmpRes);

?>

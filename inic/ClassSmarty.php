<?php
if (function_exists('mb_internal_encoding')) mb_internal_encoding('UTF-8');

define('SMARTY_RESOURCE_CHAR_SET', 'UTF-8');
define('SMARTY_DIR', '/usr/local/httpd/smarty/libs/');
#define('SMARTY_TEMPLATES_DIR', '/var/web/html');

require_once(SMARTY_DIR . 'Smarty.class.php');

class Smarty_Class extends Smarty{
	function __construct(){
		parent::__construct();
		
		$this->setTemplateDir('/var/web/html/templates/');
		$this->setCompileDir('/var/web/html/templates_c/');
		$this->setCacheDir('/var/web/html/cache/');
		$this->setConfigDir('/var/web/html/configs/');
		
		#$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
		//$this->debugging = true;
	}
	
	public function __destruct() {
		unset($this);
	}
}
?>

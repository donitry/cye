<?php 
/*Pdo_Cye 继承自PDO,主要是PDO针对本项目的外部封装
 * 处理数据库一切事务
 * Don 2014/6
 */

class Pdo_Cye extends PDO{
	private $dsn = 'mysql:host=127.0.0.1;dbname=Cye_WebDbase';
	private $username = 'wwwdba',$password='www.cye.com';
	
	public $RecordCount=0, $PageSize=0, $CurrentPage=0, $Pages=0, $Rows=0;    	// 记录集的记录总数// 每页的记录行数// 当前页// 总页数//总记录数
	public $AutoPage=false, $BOF=false, $EOF=false;   	// 启用自动分页功能 // 游标到记录集之前 // 游标到记录集之后    			   		
	private $RecordSet = null;  	// 记录集
	private $mCurrentRow = -1;  	// 记录集中当前游标位置     		
	
	function __construct($index=null){
		$options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				PDO::ATTR_EMULATE_PREPARES => false
		);
		parent::__construct($this->dsn, $this->username, $this->password, $options);
		parent::exec("set character set 'utf8'");
		parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	
	public function __destruct() {}
	
	// 分页查询
	public function QueryEx($SqlString){
		// 是否启用自动分页功能
		if($this->AutoPage){
			// 检查PageSize参数
			if ($this->PageSize <=0) die("警告：PageSize不能为负数或零.");
			try {
					// 计算总记录数
					$rs = $this->query($this->rebuildSqlString($SqlString));
					$this->Rows = $rs->fetchColumn();
					// 计算总页数
					if ($this->Rows < $this->PageSize) {$this->Pages = 1;}
					elseif ($this->Rows % $this->PageSize) {$this->Pages = intval($this->Rows/$this->PageSize)+1;}
					else {$this->Pages = intval($this->Rows/$this->PageSize);}
					// 约束CurrentPage值，使之位于1到Pages之间。
					if($this->CurrentPage < 1) {$this->CurrentPage =1;}
					if($this->CurrentPage > $this->Pages) {$this->CurrentPage = $this->Pages;}
					//计算偏移量
					$Offset = $this->PageSize * ($this->CurrentPage - 1);
					// 重组SQL语句,SqlString有分号则去掉
					$SqlString = str_replace(";","",$SqlString) . " LIMIT $Offset,$this->PageSize;";
				}catch (PDOException $e){
					die($e->getMessage());
				}
		}
	}
	
	public function FunDataFetch(array $sParams=array())
	{
		if(isset($sParams) && array_key_exists('table',$sParams)){
			$i = 0;$sArgs = array();
			$SqlString = 'SELECT * FROM ' . array_shift($sParams);
			if (count($sParams) > 0) $SqlString .= ' WHERE ';
			foreach ($sParams as $key => $value){
				$i += 1;
				if ($i < count($sParams)) {
					$SqlString .= $key . '=? AND ';
				}else $SqlString .= $key . '=? ';//GROUP BY '. $key;
				array_push($sArgs,$value);
			}return $this->SqlExecute($SqlString,$sArgs);//这里必须用$this指针,因为self是单纯的本类调用,里面的this指针肯定是空的
		}return null;
	}

	//专门处理update/insert
	protected function FunDataHandle(array $sParams=array(),array $sFilter=array())
	{
		if(isset($sParams) && array_key_exists('cmd',$sParams) && array_key_exists('table',$sParams)){
			$commend = array_shift($sParams);$table = array_shift($sParams);
			$i = 0;$account = array();$sql = $commend;
			switch ($commend){
				case 'UPDATE':{
					$sql .= ' ' . $table . ' SET ';
					foreach ($sParams as $key => $value){
						$i += 1;
						if ($i < count($sParams)) $sql .= $key . '=?, ';else $sql .= $key . '=?';
						array_push($account,$value);
					}//update table set a=b
					if (isset($sFilter) ) {
						$i = 0;$sql .= ' WHERE ';
						foreach ($sFilter as $key => $value){
							$i += 1;
							if ($i < count($sFilter)) $sql .= $key . '=? AND ';else $sql .= $key . '=?';
							array_push($account,$value);
						}
					}
				}break;
				case 'INSERT INTO':{
					$sql .= ' ' . $table . '(';
					foreach ($sParams as $key => $value){
						$i += 1;
						if ($i < count($sParams)) $sql .= $key . ',';else $sql .= $key . ')';
					}$i = 0;$sql .= ' SELECT ';
					foreach ($sParams as $key => $value){
						$i += 1;
						if ($i < count($sParams)) $sql .= '?,';else $sql .= '?';
						array_push($account,$value);
					}$i = 0;$sql .= ' FROM DUAL WHERE NOT EXISTS (SELECT ';
					foreach ($sFilter as $key => $value){
						$i += 1;
						if ($i < count($sFilter)) $sql .= $key . ',';else $sql .= $key;
					}$i = 0;$sql .= '  FROM  ' . $table . ' WHERE ';
					foreach ($sFilter as $key => $value){
						$i += 1;
						if ($i < count($sFilter)) $sql .= $key . '=? AND ';else $sql .= $key . '=?';
						array_push($account,$value);
					}$sql .= ')';			
				}break;
				default:break;
			}return $this->SqlExecuteExt($sql,$account);
		}return null;
	}
	
	protected function SqlExecute($sql,array $params = array()){
		try {
			$sth = $this->prepare($sql);
			$done = empty($params)?$sth->execute():$sth->execute($params);
			return $done?$sth->fetchAll(PDO::FETCH_BOTH):null;
		} catch (PDOException $e) {
			$this->rollBack();die($e->getMessage());
		}
	}
	
	public function SqlExecuteExt($sql,array $params = array()){
		try {
			$sth = $this->prepare($sql);
			$done = empty($params)?$sth->execute():$sth->execute($params);
			if (strpos($sql, 'UPDATE') !== false || strpos($sql, 'DELETE') !== false) 
				return $done?$sth->rowCount() : null;
			else return $done?$this->lastInsertId() : null;
		} catch (PDOException $e) {
			$sth->rollback();die($e->getMessage());
		}
	}
	
	// 重新构造SQL语句，如将"select * from tb2"改写为"select count(*) from tb2"，旨在提高查询效率。如果不是select就直接返回
	private function RebuildSqlString($SqlString){
		if(preg_match('/select[ ,./w+/*]+ from/i',$SqlString,$marr)){
			$columns = preg_replace("/select|from/","",$marr[0]);
			$columns = preg_replace("//*/","/*",$columns);
			$result = preg_replace("/$columns/"," count(*) ",$SqlString);
			return $result;
		}return $SqlString;
	}
	
}
?>
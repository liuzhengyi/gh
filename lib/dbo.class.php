<?php
/* dbo.class.php
 * 数据库类封装文件
 * 分页功能尚未实现
 */
class dbex {
	
	private $dbc;

	public function __construct($dbServs)
	{
		// construct a dbex object
		$this->dbc = new mysqli($dbServs[0], $dbServs[2], $dbServs[3], $dbServs[1]);
		if($this->dbc->connect_error) {
			if(DEBUG) {
				echo "debug: dbo.class.php, __construct, $this->dbc->connect_error.";
			} else {
				die('<script language="javascript">alert("对不起，系统暂时出现了错误，请稍候。")</script>');
			}
		}
		return $this->dbc;
	}
    public function real_escape_string($sql)
    {
        return $this->dbc->real_escape_string($sql);
    }

	public function query($sql)
	{
		return $this->dbc->query($sql);
	}

	public function checkExist($value, $field="email", $table="user")
	{
		// check 
		if(empty($table) || empty($field) || empty($value)) {
			return 0;
		} else {
			$sql = "select 1 from `$table` where `$field` = '$value' limit 1";
			$res = $this->query($sql);
			return $res->num_rows;
		}
	}

	public function checkPass($e, $p)
	{
		if(empty($e) || empty($p)) {
			return 0;
		} else {
			$sql = "select 1 from user where email = '$e' and pass = sha1('$p')";
			$res = $this->query($sql);
			return $res->num_rows;
		}
	}

	public function exeUpdate( $sql )
	{
		$this->query($sql);
		return $this->dbc->affected_rows;
	}
	
	public function getRow( $sql )
	{ 	if( DEBUG ) {
            $result=$this->query($sql); if(!$result) { echo "debug: cdbex, $sql. any error:". $this->dbc->error. "errorno: ".$this->dbc->errno."\$result = $result."; }
		} else {
    //		$result=$this->query($sql) or die('<script type="text/javascript">location.href="servtools/error.php?error_type=dberr";</script>'); // 这种错误处理方式可以参考，用error.php统一处理错误，这样所有的错误都可以跳转到这个文件。
            $result=$this->query($sql) or die('<script type="text/javascript">location.href="servtools/error.php?error_type=dberr";</script>');
		}
		return $result->fetch_array();
	}

	public function getRs($sql)
	{
		$result = $this->dbc->query($sql);
		if(!$result && DEBUG) {
			echo 'debug: getRs error, sql:'.$sql;
			exit();
		}
		$rows = array();
		while($rsRow = $result->fetch_array()) {
			$rows[] = $rsRow;
		}
		return $rows;
	}
	
	public function getPage($sql, $start, $items)
	{
		$sql = $sql." limit $start, $items";
		return $this->getRs($sql);
	}

	/*
	 * $sql 应为形如select count(1) ....
	 */
	public function getCount($sql)
	{
		$result = $this->getRow($sql);
		return $result[0];
	}

    public function lastInsertId()
    {
        return $this->dbc->insert_id;
    }

	public function lockWrite($table)
	{
		$sql = 'LOCK TABLES '.$table.' WRITE';	
		$this->query($sql);
		/*
		if(!...)
		*/
	}

	public function lockRead($table)
	{
		$sql = 'LOCK TABLES '.$table.' READ';
		$this->query($sql);
		/*
		if(!...)
		*/
	}

	public function unlockTable()
	{
		$sql = 'UNLOCK TABLES';
		$this->query($sql);
		/*
		if(!...)
		*/
	}

	public function close()
	{
		$this->dbc->close();
	}
}
?>

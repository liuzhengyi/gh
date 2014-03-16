<?php
/* dbConf.php
 * 数据库配置文件
 * 它的位置应该在系统配置文件
 * config.php中用$dbConfFile指明。
 */
	$host       = 'localhost';
	$db         = 'test';
    $charset    = 'utf8';

    $_cfg_db_dsn    = 'mysql:dbname='. $db. ';host='. $host. ';charset='. $charset;
	$_cfg_db_pwd    = '';
	$_cfg_db_user   = 'test';
?>

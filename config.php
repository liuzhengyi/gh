<?php
/*
 * author:  gipsaliu@gmail.com
 * since:   2014-03-12
 * 
 * 本文件是系统的基础配置文件
 *
 * 注意：在不同的服务器上需要指定的信息有
 *	$_cfg_webRoot
 *  $_cfg_siteRoot
 *
 **/

// debug or not
define( "DEBUG", TRUE);
//define( "DEBUG", FALSE);

if(DEBUG) {
	ini_set("display_errors", 1);
} else {
	ini_set("display_errors", 0);
}

// 本地主机名称
$_cfg_hostName = 'gh';
// 服务器上的网站根目录
$_cfg_webRoot = "/var/www/proj/gh/";
// 网站的http根目录
$_cfg_siteRoot = "http://gh/";
// 数据库配置文件位置
$_cfg_dbConfFile = $_cfg_webRoot."dbConf.php";

?>
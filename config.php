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
// define( "DEBUG", FALSE);
 define( "DEBUG", TRUE);

if(DEBUG) {
	ini_set("display_errors", 1);
} else {
	ini_set("display_errors", 0);
}

/*
// on hi-vips
// 本地主机名称
$_cfg_hostName = 'h2';
// 服务器上的网站根目录
$_cfg_webRoot = "/var/www/gh/public/";
$_cfg_webRootAdmin = "/var/www/gh/admin/";
// 网站的http根目录
$_cfg_siteRoot = "http://63.223.64.106/gh/public/";
$_cfg_siteRootAdmin = "http://63.223.64.106/gh/admin/";
*/

// on local
// 本地主机名称
$_cfg_hostName = 'gh';
// 服务器上的网站根目录
$_cfg_webRoot = "/var/www/proj/gh/public/";
$_cfg_webRootAdmin = "/var/www/proj/gh/admin/";
// 网站的http根目录
$_cfg_siteRoot = "http://gh/";
$_cfg_siteRootAdmin = "http://gha/";



// 数据库配置文件位置
$_cfg_dbConfFile = $_cfg_webRoot."/../dbConf.php";


// 图片目录
$_cfg_img_path          = $_cfg_webRoot. 'image/';
$_cfg_img_path_admin    = $_cfg_webRootAdmin. 'uploads/image/';
$_cfg_img_baseurl       = $_cfg_siteRoot. 'image/';
$_cfg_img_baseurl_admin = $_cfg_siteRootAdmin. 'uploads/image/';


// 页面变量配置
// logo image's alt
$_cfg_logo_alt    = '平安好房-海外频道';

// 分页配置
// 房产列表每页条数
$_cfg_page_size_house   = 3;
// 文章列表每页条数
$_cfg_page_size_article = 3;

?>

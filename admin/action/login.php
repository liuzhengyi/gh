<?php
session_start();
/**
 * action: update an adver
 * gipsaliu@gmail.com
 * since: 2014-03-29
 */

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);

if (empty($_POST['submit']) || empty($_POST['name']) || empty($_POST['pwd']) ) {
    output_json_error(-10001, '必填字段不全.');
}

$params['name'] = trim($_POST['name']);
$params['pwd']  = sha1(trim($_POST['pwd']));

$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = 'select user_id, is_admin from user where user_name = :name and password = :pwd limit 1';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':name',    $params['name'],    PDO::PARAM_STR);
$sth->bindParam(':pwd',     $params['pwd'],     PDO::PARAM_STR);


$result = $sth->execute();
$admin_info = $sth->fetch();

if ( FALSE === $result || empty($admin_info) ) {
    if (DEBUG) {
        var_dump($sth->errorInfo());
    }
    output_json_error(-10002, '用户名或密码错误.');
}

// update user info
$sql    = 'update user set last_login = now(), last_ip = "'. $_SERVER['REMOTE_ADDR']. '" where user_id = '. $admin_info['user_id']. ' limit 1';
$sth    = $dbh->prepare($sql);
$result = $sth->execute();
if ( FALSE === $result ) {
    var_dump($sth->errorInfo());
    output_json_error(-10001, '登录出错');
}


// logged in
$_SESSION['name']       = $params['name'];
$_SESSION['id']         = $admin_info['user_id'];
$_SESSION['admin']      = $admin_info['is_admin'];


output_json_info('欢迎回来,'. $_SESSION['name'], $_cfg_siteRootAdmin.'index.php');

?>

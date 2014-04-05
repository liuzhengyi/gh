<?php
session_start();
/**
 * action: add a user
 * gipsaliu@gmail.com
 * since: 2014-04-05
 */

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);


// permission control
require_once("../../lib/access_control.php");
check_login();
if ( empty($_SESSION['admin']) ) {
    output_json_error(-10001, '权限不足');
}

// get params
if ( empty($_POST['user_name']) || empty($_POST['password']) ) {
    output_json_error(-10001, '必填参数不全');
}

$params['name']     = trim($_POST['user_name']);
$params['password'] = sha1($_POST['password']);
$params['admin']    = intval($_POST['is_admin']);

$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = 'insert into user ( user_name, password, is_admin, create_time ) values( :name, :pass, :admin, now() )';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':name', $params['name'], PDO::PARAM_STR);
$sth->bindParam(':pass', $params['password'], PDO::PARAM_STR);
$sth->bindParam(':admin', $params['admin'], PDO::PARAM_INT);

$result = $sth->execute();

if ( FALSE === $result ) {
    if (DEBUG) {
        var_dump($sth->errorInfo());
    }
    output_json_error(-10002, '添加失败');
}

output_json_info('添加成功', $_cfg_siteRootAdmin.'index.php?content=user');

?>


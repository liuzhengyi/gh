<?php
session_start();
/**
 * action: update user info 
 * gipsaliu@gmail.com
 * since: 2014-04-05
 */

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);


// permission control
require_once("../../lib/access_control.php");
check_login();


// check password
if ( empty($_POST['password0']) || empty($_POST['password1']) ) {
    output_json_error(-10001, '必填字段不全');
}

$p0 = trim($_POST['password0']);
$p1 = trim($_POST['password1']);

if ( $p0 !== $p1 ) {
    output_json_error(-10002, '两次密码输入不一致');
}

$p = sha1($p0);

$params['id']  = $_SESSION['id'];
$params['p']   = $p;


$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = 'update user set password = :p where user_id = :id limit 1';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':p', $params['p'], PDO::PARAM_STR);
$sth->bindParam(':id', $params['id'], PDO::PARAM_INT);

$result = $sth->execute();

if ( FALSE === $result ) {
    if ( DEBUG ) {
        var_dump($sth->errorInfo() );
    }
    output_json_error(-10002, '修改失败');
}

output_json_info('修改成功', $_cfg_siteRootAdmin.'index.php');

?>

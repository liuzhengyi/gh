<?php
session_start();
/**
 * action: delete a imgad
 * gipsaliu@gmail.com
 * since: 2014-04-05
 */

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);


// permission control
require_once("../../lib/access_control.php");
check_login();


// get params
if ( empty($_GET['id']) ) {
    output_json_error(-10001, '必填参数不全');
}

// TODO 2014-04-05
// delete image file 

// get user_id
$params['user_id']  = $_SESSION['id'];

$params['imgad_id']  = intval($_GET['id']);;

$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = 'delete from imgad where imgad_id = :id limit 1';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':id', $params['imgad_id'], PDO::PARAM_INT);

$result = $sth->execute();

if ( FALSE === $result ) {
    output_json_error(-10002, '删除失败');
}

output_json_info('删除成功');

?>

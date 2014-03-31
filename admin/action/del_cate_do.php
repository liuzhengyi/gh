<?php
session_start();
/**
 * action: delete a cate
 * gipsaliu@gmail.com
 * since: 2014-03-30
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

// get user_id
$params['user_id']  = $_SESSION['id'];

$params['cate_id']  = intval($_GET['id']);;

// create DB collection
$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

// check articles under cate
$sql    = 'select count(article_id) num from article where cate_id = '. $params['cate_id'];
$sth    = $dbh->query($sql);
$result = $sth->fetch(PDO::FETCH_ASSOC);
if ( 0 < $result['num'] ) {
    output_json_error(-10002, '非空分类不允许删除!');
}


$sql    = 'delete from article_cate where cate_id = :id limit 1';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':id', $params['cate_id'], PDO::PARAM_INT);

$result = $sth->execute();

if ( FALSE === $result ) {
    output_json_error(-10002, '删除失败');
}

output_json_info('删除成功');

?>

<?php
/**
 * action: add a cate
 * gipsaliu@gmail.com
 * since: 2014-03-30
 */

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);


// TODO permission control


// get params
if ( empty($_POST['cate_name']) ) {
    output_json_error(-10001, '必填参数不全');
}

$params['cate_name']    = strval($_POST['cate_name']);
$params['remark']       = empty($_POST['remark']) ? '' : strval($_POST['remark']);

// TODO get user_id
$params['user_id']  = '-1';

$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = 'insert into article_cate ( user_id, cate_name, update_time, create_time, remark) values( :user_id, :cate_name, now(), now(), :remark)';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':user_id', $params['user_id'], PDO::PARAM_INT);
$sth->bindParam(':cate_name', $params['cate_name'], PDO::PARAM_STR);
$sth->bindParam(':remark', $params['remark'], PDO::PARAM_STR);

$result = $sth->execute();

if ( FALSE === $result ) {
    if (DEBUG) {
        var_dump($sth->errorInfo());
    }
    output_json_error(-10002, '添加失败');
}

output_json_info('添加成功');

?>

<?php
/**
 * action: update an article-city
 * gipsaliu@gmail.com
 * since: 2014-03-29
 */

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);


// TODO permission control


// get params
if ( empty($_POST['id']) || empty($_POST['name']) || empty($_POST['country_id']) ) {
    output_json_error(-10001, '必填参数不全');
}

// var_dump($_FILES); exit();
// TODO upload image

$params['name']         = strval($_POST['name']);
$params['id']           = intval($_POST['id']);
$params['country_id']   = intval($_POST['country_id']);
$params['remark']       = empty($_POST['remark']) ? '' : strval($_POST['remark']);


$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = 'update city set name = :name, country_id = :country_id, remark = :remark, update_time = now() where city_id = :id limit 1';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':name', $params['name'], PDO::PARAM_STR);
$sth->bindParam(':id', $params['id'], PDO::PARAM_INT);
$sth->bindParam(':country_id', $params['country_id'], PDO::PARAM_INT);
$sth->bindParam(':remark', $params['remark'], PDO::PARAM_STR);

$result = $sth->execute();

if ( FALSE === $result ) {
    output_json_error(-10002, '修改失败');
}

output_json_info('修改成功');

?>

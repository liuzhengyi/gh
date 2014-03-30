<?php
/**
 * action: add a city
 * gipsaliu@gmail.com
 * since: 2014-03-30
 */

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);


// TODO permission control


// get params
if ( empty($_POST['name']) || empty($_POST['country_id']) ) {
    output_json_error(-10001, '必填参数不全');
}

$params['name']         = strval($_POST['name']);
$params['country_id']   = intval($_POST['country_id']);
$params['remark']       = empty($_POST['remark']) ? '' : strval($_POST['remark']);

// TODO get user_id
$params['user_id']  = '-1';

$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = 'insert into city (city_id, user_id, country_id, name, update_time, create_time, remark) values(:city_id, :user_id, :country_id, :name, now(), now(), :remark)';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':user_id', $params['user_id'], PDO::PARAM_INT);
$sth->bindParam(':city_id', $params['city_id'], PDO::PARAM_INT);
$sth->bindParam(':country_id', $params['country_id'], PDO::PARAM_STR);
$sth->bindParam(':name', $params['name'], PDO::PARAM_STR);
$sth->bindParam(':remark', $params['remark'], PDO::PARAM_STR);

$result = $sth->execute();

if ( FALSE === $result ) {
    output_json_error(-10002, '修改失败');
}

output_json_info('修改成功');

?>

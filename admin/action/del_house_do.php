<?php
/**
 * action: delete a house
 * gipsaliu@gmail.com
 * since: 2014-03-30
 */

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);


// TODO permission control


// get params
if ( empty($_GET['id']) ) {
    output_json_error(-10001, '必填参数不全');
}

// TODO get user_id
$params['user_id']  = '-1';

$params['house_id']  = intval($_GET['id']);;

$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = 'delete from house where house_id = :id limit 1';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':id', $params['house_id'], PDO::PARAM_INT);

$result = $sth->execute();

if ( FALSE === $result ) {
    output_json_error(-10002, '修改失败');
}

output_json_info('修改成功');

?>

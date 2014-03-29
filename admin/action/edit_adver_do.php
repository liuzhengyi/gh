<?php
/**
 * action: update an adver
 * gipsaliu@gmail.com
 * since: 2014-03-29
 */

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);


// TODO permission control


// get params
if ( empty($_POST['id']) || empty($_POST['title']) || empty($_POST['img_url']) ) {
    output_json_error(-10001, '必填参数不全');
}

// var_dump($_FILES); exit();
// TODO upload image

$params['title']    = strval($_POST['title']);
$params['image']    = strval($_POST['img_url']);
$params['id']       = intval($_POST['id']);
$params['url']      = empty($_POST['link_url']) ? 'xx' : strval($_POST['link_url']);
$params['desc']     = empty($_POST['desc']) ? 'xx' : strval($_POST['desc']);
$params['remark']   = empty($_POST['remark']) ? 'xx' : strval($_POST['remark']);


$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = 'update ad set ad_title = :title, image_url = :image, link_url = :url, `desc` = :desc, remark = :remark where ad_id = :id limit 1';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':title', $params['title'], PDO::PARAM_STR);
$sth->bindParam(':image', $params['image'], PDO::PARAM_STR);
$sth->bindParam(':url', $params['url'], PDO::PARAM_STR);
$sth->bindParam(':desc', $params['desc'], PDO::PARAM_STR);
$sth->bindParam(':remark', $params['remark'], PDO::PARAM_STR);
$sth->bindParam(':id', $params['id'], PDO::PARAM_INT);

$result = $sth->execute();

if ( FALSE === $result ) {
    output_json_error(-10002, '修改失败');
}

output_json_info('修改成功');

?>

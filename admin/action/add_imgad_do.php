<?php
session_start();
/**
 * action: add in-site image ad
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
if (  empty($_POST['title']) || empty($_FILES['ad_img']['name']) ) {
    output_json_error(-10001, '必填参数: 描述, 图片, 不全!');
}

// upload image
$new_img_url = deal_upload_image($_FILES['ad_img'], 'imgad');


// 连接数据库
$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

// filter params
$params['id']       = intval($_POST['id']);
$params['title']    = strval($_POST['title']);
$params['desc']     = empty($_POST['desc']) ? '' : strval($_POST['desc']);
$params['remark']   = empty($_POST['remark']) ? '' : strval($_POST['remark']);

$sql    = 'insert into imgad(imgad_title, img_url, `desc`, remark, create_time, update_time) values (:title, :img_url, :desc, :remark, now(), now())';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':title', $params['title'], PDO::PARAM_STR);
$sth->bindParam(':desc', $params['desc'], PDO::PARAM_STR);
$sth->bindParam(':remark', $params['remark'], PDO::PARAM_STR);
$sth->bindParam(':img_url', $new_img_url, PDO::PARAM_STR);

$result = $sth->execute();

if ( FALSE === $result ) {
    var_dump($sth->errorInfo());
    output_json_error(-10002, '添加失败');
}

output_json_info('添加成功', $_cfg_siteRootAdmin.'index.php?content=imgad');

?>

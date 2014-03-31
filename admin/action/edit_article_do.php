<?php
session_start();
/**
 * action: update an adver
 * gipsaliu@gmail.com
 * since: 2014-03-29
 */

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);

// permission control
require_once("../../lib/access_control.php");
check_login();


// get params
if ( empty($_POST['id']) || empty($_POST['title']) || empty($_POST['cate_id']) ) {
var_dump($_POST);
    output_json_error(-10001, '必填参数不全');
}

$params['title']    = strval($_POST['title']);
$params['id']       = intval($_POST['id']);
$params['cate_id']  = intval($_POST['cate_id']);
$params['type']     = empty($_POST['type'])     ? '' : intval($_POST['type']);
$params['subtitle'] = empty($_POST['subtitle']) ? '' : strval($_POST['subtitle']);
$params['abstract'] = empty($_POST['abstract']) ? '' : strval($_POST['abstract']);
$params['remark']   = empty($_POST['remark'])   ? '' : strval($_POST['remark']);
$params['content']  = empty($_POST['content'])  ? '' : strval($_POST['content']);


$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = ' update article set
                title = :title,
                cate_id = :cate_id,
                type = :type,
                subtitle = :subtitle,
                abstract = :abstract,
                remark = :remark,
                content=:content,
                update_time = now()
            where
                article_id = :id
            limit 1';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':title',       $params['title'],       PDO::PARAM_STR);
$sth->bindParam(':cate_id',     $params['cate_id'],     PDO::PARAM_INT);
$sth->bindParam(':type',        $params['type'],        PDO::PARAM_INT);
$sth->bindParam(':subtitle',    $params['subtitle'],    PDO::PARAM_STR);
$sth->bindParam(':abstract',    $params['abstract'],    PDO::PARAM_STR);
$sth->bindParam(':remark',      $params['remark'],      PDO::PARAM_STR);
$sth->bindParam(':content',     $params['content'],     PDO::PARAM_STR);
$sth->bindParam(':id',          $params['id'],          PDO::PARAM_INT);

$result = $sth->execute();

if ( FALSE === $result ) {
    output_json_error(-10002, '修改失败');
}

output_json_info('修改成功', $_cfg_siteRootAdmin.'index.php?content=article');

?>

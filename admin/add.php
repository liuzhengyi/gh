<?php
/**
 * add page of admin module of the site
 * author:  gipsaliu@gmail.com
 * since:   2014-03-28
 *
 */

include_once('../config.php');

require_once("../lib/common.php");
require_once($_cfg_dbConfFile);

$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

$content    = empty($_GET['content']) ? '' : trim($_GET['content']);

switch ( $content ) {

    case 'house':
        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '编辑房产需指定有效ID!');
        }
        $id = intval($_GET['id']);

        // ad data
        $sql        = "select * from house where house_id = :id";
        $sth        = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data  = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '不存在这个房产!');
        }

        include('./tpl/action/add_house.php');

        break;

    case 'article':
        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '编辑文章需指定有效ID!');
        }
        $id = intval($_GET['id']);

        // ad data
        $sql        = "select * from article where article_id = :id";
        $sth        = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data  = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '不存在这个文章!');
        }

        include('./tpl/action/add_article.php');

        break;

    default:
        // TODO goto admin index
        include('./tpl/index.php');
        break;

}
?>

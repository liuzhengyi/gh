<?php
/**
 * index of the site
 * author:  gipsaliu@gmail.com
 * since:   2014-03-11
 *
 */

include_once('./config.php');

require_once("./common.php");
require_once($_cfg_dbConfFile);

$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

$content    = empty( $_GET['content'] ) ? '' : trim( $_GET['content'] );

switch ( $content ) {

    case 'house':
        // house data
        $sql        = "select * from house";
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $house_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        include('./tpl/admin/admin_house.php');

        break;

    case 'article':
        // article data
        $sql            = "select * from article";
        $sth            = $dbh->prepare($sql);
        $sth->execute();
        $article_data   = $sth->fetchAll(PDO::FETCH_ASSOC);
        include('./tpl/admin/admin_article.php');

        break;

    case 'adver':

        // ad data
        $sql        = "select * from ad";
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $ad_data  = $sth->fetchAll(PDO::FETCH_ASSOC);
        include('./tpl/admin/admin_adver.php');

        break;

    default:
        include('./tpl/admin/admin.php');
        break;

}
?>

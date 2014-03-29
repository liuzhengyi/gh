<?php
/**
 * index of admin module of the site
 * author:  gipsaliu@gmail.com
 * since:   2014-03-22
 *
 */

include_once('../config.php');

require_once("../lib/common.php");
require_once($_cfg_dbConfFile);

require_once("../lib/access_control.php");

$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

$content    = empty($_GET['content']) ? '' : trim($_GET['content']);

switch ( $content ) {

    case 'house':
        // house data
        $sql        = "select house.*, city.name ciname from house join city where house.city_id = city.city_id";
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $house_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        include('./tpl/house.php');

        break;

    case 'article':
        // article data
        $sql            = "select * from article join article_cate where article.cate_id = article_cate.cate_id";
        $sth            = $dbh->prepare($sql);
        $sth->execute();
        $article_data   = $sth->fetchAll(PDO::FETCH_ASSOC);
        include('./tpl/article.php');

        break;

    case 'adver':

        // ad data
        $sql        = "select * from ad";
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $ad_data  = $sth->fetchAll(PDO::FETCH_ASSOC);
        include('./tpl/adver.php');

        break;

    default:
        include('./tpl/index.php');
        break;

}
?>

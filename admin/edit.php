<?php
/**
 * edit page of admin module of the site
 * author:  gipsaliu@gmail.com
 * since:   2014-03-28
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
        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '编辑房产需指定有效ID!');
        }
        $id = intval($_GET['id']);

        // house data
        $sql        = "select * from house where house_id = :id";
        $sth        = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data  = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '不存在这个房产!');
        }

        // images
        $img_data = get_img_url($data['image_urls']);

        // city data
        $sql        = 'select country.name coname, city_id, city.name ciname from city, country where city.country_id = country.country_id order by country.country_id';
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $city_data  = $sth->fetchAll(PDO::FETCH_ASSOC);
        $city_data  = set_array_key($city_data, 'city_id');

        include('./tpl/action/edit_house.php');

        break;

    case 'article':
        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '编辑文章需指定有效ID!');
        }
        $id = intval($_GET['id']);

        // article data
        $sql        = "select * from article where article_id = :id";
        $sth        = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data  = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '不存在这个文章!');
        }

        // article cate data
        $sql        = 'select cate_id , cate_name from article_cate';
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $cate_data  = $sth->fetchAll(PDO::FETCH_ASSOC);

        include('./tpl/action/edit_article.php');

        break;

    case 'adver':

        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '编辑广告需指定有效ID!');
        }
        $id = intval($_GET['id']);

        // ad data
        $sql        = "select * from ad where ad_id = :id";
        $sth        = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data  = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '不存在这个广告!');
        }

        include('./tpl/action/edit_adver.php');

        break;

    default:
        // TODO goto admin index
        include('./tpl/index.php');
        break;

}
?>

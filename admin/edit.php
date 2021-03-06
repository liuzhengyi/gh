<?php
session_start();
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
check_login();

$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

$content    = empty($_GET['content']) ? '' : trim($_GET['content']);

switch ( $content ) {

    case 'house':
        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '缺少有效ID!');
        }
        $id = intval($_GET['id']);

        // house data
        $sql        = "select * from house where house_id = :id";
        $sth        = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data  = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '房产不存在!');
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
            output_json_error(-10001, '缺少有效ID!');
        }
        $id = intval($_GET['id']);

        // article data
        $sql        = "select * from article where article_id = :id";
        $sth        = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data  = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '文章不存在!');
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
            output_json_error(-10001, '缺少有效ID!');
        }
        $id = intval($_GET['id']);

        // ad data
        $sql        = "select * from ad where ad_id = :id";
        $sth        = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data  = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '广告不存在!');
        }

        include('./tpl/action/edit_adver.php');

        break;

    case 'cate':

        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '缺少有效ID!');
        }
        $id = intval($_GET['id']);

        // article_cate data
        $sql        = "select * from article_cate where cate_id = :id";

        $sth        = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data  = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '分类不存在!');
        }

        include('./tpl/action/edit_cate.php');

        break;

    case 'city':

        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '缺少有效ID!');
        }
        $id = intval($_GET['id']);

        // article_city data
        $sql        = "select city_id, name, country_id, remark from city where city_id = :id";

        $sth        = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data  = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '城市不存在!');
        }

        // country_data
        $sql        = "select country_id, name from country";
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $country_data  = $sth->fetchAll(PDO::FETCH_ASSOC);

        include('./tpl/action/edit_city.php');

        break;

    case 'country':

        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '缺少有效ID!');
        }
        $id     = intval($_GET['id']);

        // country data
        $sql    = "select country_id, name, region, remark from country where country_id = :id";

        $sth    = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data   = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '城市不存在!');
        }

        include('./tpl/action/edit_country.php');

        break;

    case 'country':

        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '缺少有效ID!');
        }
        $id     = intval($_GET['id']);

        // country data
        $sql    = "select country_id, name, region, remark from country where country_id = :id";

        $sth    = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data   = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '城市不存在!');
        }

        include('./tpl/action/edit_country.php');

        break;

    case 'imgad':

        // get params
        if ( empty($_GET['id']) || !intval($_GET['id']) ) {
            output_json_error(-10001, '缺少有效ID!');
        }
        $id     = intval($_GET['id']);

        // imgad data
        $sql    = "select * from imgad where imgad_id = :id";

        $sth    = $dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data   = $sth->fetch(PDO::FETCH_ASSOC);
        if ( empty($data) ) {
            output_json_error(-10002, '图片广告不存在!');
        }

        include('./tpl/action/edit_imgad.php');

        break;

    default:
        // TODO goto admin index
        include('./tpl/index.php');
        break;

}
?>

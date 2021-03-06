<?php
session_start();
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
check_login();

$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

$content    = empty($_GET['content']) ? '' : trim($_GET['content']);

switch ( $content ) {

    case 'house':
        // house data
        $sql        = " select
                                house.*, city.name ciname from house join city where house.city_id = city.city_id
                        order by
                                display_order asc, update_time desc";
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $house_data = $sth->fetchAll(PDO::FETCH_ASSOC);

        $add_url    = $_cfg_siteRootAdmin. 'add.php?content=house';

        include('./tpl/house.php');

        break;

    case 'article':
        // article data
        $sql            = "select * from article join article_cate where article.cate_id = article_cate.cate_id order by article.update_time desc";
        $sth            = $dbh->prepare($sql);
        $sth->execute();
        $article_data   = $sth->fetchAll(PDO::FETCH_ASSOC);

        $add_url    = $_cfg_siteRootAdmin. 'add.php?content=article';

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

    case 'cate':

        // cate data
        $sql        = "select * from article_cate order by create_time desc";
        $sql        = 'select
                            c.cate_name, c.remark, c.cate_id,
                            c.create_time, c.update_time,
                            a.article_id, count(a.article_id) num
                       from
                            article_cate c left join article a
                       on
                            c.cate_id = a.cate_id
                       group by cate_id order by c.update_time desc';
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $cate_data  = $sth->fetchAll(PDO::FETCH_ASSOC);

        $add_url    = $_cfg_siteRootAdmin. 'add.php?content=cate';

        include('./tpl/cate.php');

        break;

    case 'city':

        // city data
        $sql        = 'select
                            ci.city_id, ci.name ciname, ci.create_time, ci.update_time, ci.remark,
                            co.name coname,
                            count(h.house_id) num
                       from
                            city ci
                            left join country co on ci.country_id = co.country_id
                            left join house h on ci.city_id = h.city_id
                        group by ci.city_id order by ci.update_time desc';
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $city_data  = $sth->fetchAll(PDO::FETCH_ASSOC);

        // country_data
        $sql        = "select country_id, name from country";
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $country_data  = $sth->fetchAll(PDO::FETCH_ASSOC);

        $add_url    = $_cfg_siteRootAdmin. 'add.php?content=city';

        include('./tpl/city.php');

        break;

    case 'country':

        // country data
        $sql        = 'select
                            co.country_id , co.name, co.region, co.create_time, co.update_time,
                            count(ci.city_id) num
                       from
                            country co left join city ci on co.country_id = ci.country_id
                       group by co.country_id order by co.update_time desc';
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $country_data  = $sth->fetchAll(PDO::FETCH_ASSOC);

        $add_url    = $_cfg_siteRootAdmin. 'add.php?content=country';

        include('./tpl/country.php');

        break;

    case 'imgad':

        // imgad data
        $sql        = 'select
                            *
                       from
                            imgad 
                        order by
                            update_time desc';
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $imgad_data  = $sth->fetchAll(PDO::FETCH_ASSOC);

        $add_url    = $_cfg_siteRootAdmin. 'add.php?content=imgad';

        include('./tpl/imgad.php');

        break;

    case 'user':

        check_login();
        if ( empty($_SESSION['admin']) ) {
            output_json_error(-10001, '权限不足');
        }
        // imgad data
        $sql        = 'select
                            *
                       from
                            user';
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $user_data  = $sth->fetchAll(PDO::FETCH_ASSOC);

        $add_url    = $_cfg_siteRootAdmin. 'add.php?content=user';

        include('./tpl/user.php');

        break;

    default:
        include('./tpl/index.php');
        break;

}
?>

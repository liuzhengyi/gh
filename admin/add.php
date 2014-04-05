<?php
session_start();
/**
 * add page of admin module of the site
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

        // city data
        $sql        = 'select country.name coname, city_id, city.name ciname from city, country where city.country_id = country.country_id order by country.country_id';
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $city_data  = $sth->fetchAll(PDO::FETCH_ASSOC);
        $city_data  = set_array_key($city_data, 'city_id');

        include('./tpl/action/add_house.php');

        break;

    case 'article':

        // cate data
        $sql        = "select cate_id, cate_name from article_cate";
        $sth        = $dbh->prepare($sql);
        $sth->execute();
        $cate_data  = $sth->fetchAll(PDO::FETCH_ASSOC);

        include('./tpl/action/add_article.php');

        break;

    case 'cate':

        include('./tpl/action/add_cate.php');

        break;

    case 'city':

        // country data
        $sql            = "select country_id, name from country";
        $sth            = $dbh->prepare($sql);
        $sth->execute();
        $country_data   = $sth->fetchAll(PDO::FETCH_ASSOC);

        include('./tpl/action/add_city.php');

        break;

    case 'country':

        include('./tpl/action/add_country.php');

        break;

    case 'imgad':

        include('./tpl/action/add_imgad.php');

        break;

    default:
        // TODO goto admin index
        include('./tpl/index.php');
        break;

}
?>

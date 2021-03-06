<?php
/**
 * house detail page
 * author:  gipsaliu@gmail.com
 * since:   2014-03-11
 *
 */

include_once('../config.php');

require_once("../lib/common.php");
require_once($_cfg_dbConfFile);

// get and check params
if ( empty($_GET['id'])) {
    $url    = $_cfg_siteRoot. 'house_list.php';
    header("Location:". $url);
    exit();
}

$id = intval($_GET['id']);

// db
$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

// house
$sql    = ' select
                house.*,
                city.name ciname,
                country.country_id coid, country.name coname,
                country.region region
            from
                house, city, country
            where
                house.city_id = city.city_id
                and
                city.country_id = country.country_id
                and
                house.house_id = :id
            ';
$sth    = $dbh->prepare($sql);

$sth->bindValue(':id', $id, PDO::PARAM_INT);
$sth->execute();
$house_data   = $sth->fetch(PDO::FETCH_ASSOC);

$house_data['images'] = get_img_url($house_data['image_urls']);


// hot house
$sql            = ' select
                        house_id id, house.name name, house.view_count vc,
                        city.city_id ciid, city.name ciname,
                        country.country_id coid, country.name coname,
                        country.region region
                    from
                        house, city, country
                    where
                        house.city_id = city.city_id
                        and
                        city.country_id = country.country_id
                    order by house.view_count desc
                    limit 9';
$sth            = $dbh->prepare($sql);
$sth->execute();
$hot_house_data = $sth->fetchAll(PDO::FETCH_ASSOC);

// friend links 
$sql        = ' select
                    *
                from
                    link
                order by link.display_order asc
                limit 20';
$sth        = $dbh->prepare($sql);
$sth->execute();
$link_data  = $sth->fetchAll(PDO::FETCH_ASSOC);

// ad data
$sql        = "select * from ad";
$sth        = $dbh->prepare($sql);
$sth->execute();
$data       = $sth->fetchAll(PDO::FETCH_ASSOC);
$ad_data    = group_array_key($data, 'ad_type');

// increase view_count
$sql        = "update house set view_count = view_count + 1 where house_id = :id limit 1";
$sth        = $dbh->prepare($sql);
$sth->bindValue(':id', $id);
$sth->execute();

// close DB
$sth    = NULL;
$dbh    = NULL;

// crumbs start
$cmb['file']        = $_SERVER['SCRIPT_NAME'];
$cmb['region']      = $house_data['region'];
$cmb['coid']        = $house_data['coid'];
$cmb['coname']      = $house_data['coname'];
$cmb['name']        = $house_data['name'];

$crumbs = get_crumbs($cmb);
// crumbs end


$title      = $_cfg_logo_alt. '-房产详情';
$navi_cur   = 'house';

include('./tpl/house.php');

?>

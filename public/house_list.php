<?php
/**
 * index of the site
 * author:  gipsaliu@gmail.com
 * since:   2014-03-11
 *
 */

include_once('../config.php');

require_once("../lib/common.php");
require_once($_cfg_dbConfFile);

// params
$coid       = (empty($_GET['coid'])) ? '': intval($_GET['coid']);
$pl         = (empty($_GET['pl'])) ? '': intval($_GET['pl']);
$type       = (empty($_GET['type'])) ? '': intval($_GET['type']);
$region     = (empty($_GET['region'])) ? '': intval($_GET['region']);

$page       = (empty($_GET['page'])) ? 1: intval($_GET['page']);

if ( empty($coid) ) {
    $coid_sql   = '';
} else {
    $coid_sql   = ' and country.country_id = :coid ';
}

if ( empty($pl) ) {
    $pl_sql     = '';
} else {
    $pl_sql     = ' and house.price_level = :pl ';
}

if ( empty($type) ) {
    $type_sql   = '';
} else {
    $type_sql     = ' and house.type = :type ';
}

if ( empty($region) ) {
    $region_sql   = '';
} else {
    $region_sql     = ' and country.region = :region ';
}

$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

// ad data
$sql        = "select * from ad";
$sth        = $dbh->prepare($sql);
$sth->execute();
$data       = $sth->fetchAll(PDO::FETCH_ASSOC);
$ad_data    = group_array_key($data, 'ad_type');

// country
$sql            = "select country_id, name from country ";
$sth            = $dbh->prepare($sql);
$sth->execute();
$country_data   = $sth->fetchAll(PDO::FETCH_ASSOC);
$country_data   = set_array_key($country_data, 'country_id');

// house count
$sql    = 'select count(1) count from house, city, country where house.city_id = city.city_id and city.country_id = country.country_id '. $coid_sql. $type_sql. $pl_sql;
$sth    = $dbh->prepare($sql);

if ( $coid )    { $sth->bindValue(':coid', $coid, PDO::PARAM_INT); }
if ( $type )    { $sth->bindValue(':type', $type, PDO::PARAM_INT); }
if ( $pl )      { $sth->bindValue(':pl', $pl, PDO::PARAM_INT); }
if ( $region )  { $sth->bindValue(':region', $region, PDO::PARAM_INT); }

$sth->execute();
$house_count_data   = $sth->fetchAll(PDO::FETCH_ASSOC);

if ( empty($house_count_data) ) {

    // 无数据
    $house_data = '';

} else {

    $house_count    = (empty($house_count_data)) ? 0 : $house_count_data[0]['count'];
    $page_size      = empty($_cfg_page_size_house)? 10: $_cfg_page_size_house;
    $max_page       = ceil($house_count / $page_size);

    $page           = ( $page < 1 ) ? 1 : $page;
    $page           = ( $page > $max_page ) ? $max_page : $page;

    $record_start   = ($page - 1) * $page_size;

    // house
    $sql    = ' select
                    house_id id, house.name name,
                    house.price_level level, house.image_urls,
                    house.position, house.decoration_state, 
                    house.price_desc,
                    city.name ciname,
                    country.country_id coid, country.name coname,
                    country.region region
                from
                    house, city, country
                where
                    house.city_id = city.city_id
                    and
                    city.country_id = country.country_id
                    '.
                    $coid_sql.
                    $type_sql.
                    $pl_sql.
                    $region_sql.
                    ' limit '. $record_start. ', '. $page_size;

    $sth    = $dbh->prepare($sql);

    if ( $coid ) { $sth->bindValue(':coid', $coid, PDO::PARAM_INT); }
    if ( $type ) { $sth->bindValue(':type', $type, PDO::PARAM_INT); }
    if ( $pl ) { $sth->bindValue(':pl', $pl, PDO::PARAM_INT); }
    if ( $region ) { $sth->bindValue(':region', $region, PDO::PARAM_INT); }

    $sth->execute();
    $house_data   = $sth->fetchAll(PDO::FETCH_ASSOC);

}


// hot house
$sql            = ' select
                        house_id id, house.name name, house.view_count vc,
                        price_desc,
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


$sth    = NULL;
$dbh    = NULL;


// crumbs start
$cmb['file']    = $_SERVER['SCRIPT_NAME'];
$cmb['region']  = $region;
$cmb['coname']  = $country_data[$coid]['name'];
$cmb['coid']    = $coid;
$crumbs = get_crumbs($cmb);
// crumbs end


$title      = $_cfg_logo_alt. '-文章列表';
$navi_cur   = 'house';

include('./tpl/house_list.php');
?>

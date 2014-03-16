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

// ad data
$sql        = "select * from ad";
$sth        = $dbh->prepare($sql);
$sth->execute();
$data       = $sth->fetchAll(PDO::FETCH_ASSOC);
$ad_data    = group_array_key($data, 'ad_type');

// country
$sql            = "select * from country limit 9";
$sth            = $dbh->prepare($sql);
$sth->execute();
$country_data   = $sth->fetchAll(PDO::FETCH_ASSOC);

// house
$sql    = ' select
                house_id id, house.name name,
                house.price_level level, house.image_urls,
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
                country.region = :region
            limit 6';
$sth    = $dbh->prepare($sql);

for ( $region = 1; $region < 4; $region++ ) {
    $sth->bindValue(':region', $region, PDO::PARAM_INT);
    $sth->execute();
    $house_data[$region]   = $sth->fetchAll(PDO::FETCH_ASSOC);
}

// article
$sql    = ' select
                *
            from
                article a, article_cate ac
            where
                a.cate_id = ac.cate_id
                and
                a.type = :type
            limit 9';
$sth    = $dbh->prepare($sql);

for ( $type = 1; $type < 3; $type++ ) {
// type: 1 - 售 2 - 租
    $sth->bindValue(':type', $type, PDO::PARAM_INT);
    $sth->execute();
    $article_data[$type]   = $sth->fetchAll(PDO::FETCH_ASSOC);
}

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


$sth    = NULL;
$dbh    = NULL;
include('./tpl/index.php');
?>

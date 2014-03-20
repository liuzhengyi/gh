<?php
/**
 * house detail page
 * author:  gipsaliu@gmail.com
 * since:   2014-03-11
 *
 */

include_once('./config.php');

require_once("./common.php");
require_once($_cfg_dbConfFile);

// get and check params
if ( empty($_GET['id'])) {
    $url    = $_cfg_siteRoot. 'article_list.php';
    header("Location:". $url);
    exit();
}

$id = intval($_GET['id']);

// db
$dbh        = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

// get article data
$sql    = 'select * from article';

// article
$sql    = ' select
                *
            from
                article
            where
                article.article_id = :id
            ';
$sth    = $dbh->prepare($sql);

$sth->bindValue(':id', $id, PDO::PARAM_INT);
$sth->execute();
$article_data   = $sth->fetch(PDO::FETCH_ASSOC);

//var_dump($article_data); exit();

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

// ad data
$sql        = "select * from ad";
$sth        = $dbh->prepare($sql);
$sth->execute();
$data       = $sth->fetchAll(PDO::FETCH_ASSOC);
$ad_data    = group_array_key($data, 'ad_type');

// increase view_count
$sql        = "update article set view_count = view_count + 1 where article_id = :id limit 1";
$sth        = $dbh->prepare($sql);
$sth->bindValue(':id', $id);
$sth->execute();

// hot house
$sql            = ' select
                        house_id id, house.name name, house.view_count vc,
                        price_desc,
                        city.city_id ciid, city.name ciname,
                        country.country_id cid, country.name coname,
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

// hot articles
$sql                = ' select
                            article_id id, article.title title
                        from
                            article
                        order by update_time desc
                        limit 10';
$sth                = $dbh->prepare($sql);
$sth->execute();
$hot_article_data   = $sth->fetchAll(PDO::FETCH_ASSOC);

// relate_article
// todo article_cate table
$sql    = 'select article_id, article_name from article where cate_id = (select cate_id from article where article_id = :id)';
$sth    = $dbh->prepare($sql);
$sth->bindValue(':id', $id);
$sth->execute();
$relate_article_data    = $sth->fetchAll(PDO::FETCH_ASSOC);


$sth    = NULL;
$dbh    = NULL;
include('./tpl/article.php');
?>

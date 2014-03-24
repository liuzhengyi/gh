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

// params
$caid        = (empty($_GET['caid'])) ? '': intval($_GET['caid']);

$page       = (empty($_GET['page'])) ? 1: intval($_GET['page']);

if ( empty($caid) ) {
    $caid_sql   = '';
} else {
    $caid_sql   = ' and article.cate_id = :caid ';
}

$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

// article count
$sql    = 'select count(1) count from article  where 1 = 1 '. $caid_sql;
$sth    = $dbh->prepare($sql);

if ( $caid ) { $sth->bindValue(':caid', $caid, PDO::PARAM_INT); }

$sth->execute();
$article_count_data   = $sth->fetchAll(PDO::FETCH_ASSOC);

if ( empty($article_count_data) ) {

    // 无数据
    $article_data = '';

} else {

    $article_count  = (empty($article_count_data)) ? 0 : $article_count_data[0]['count'];
    $page_size      = empty($_cfg_page_size_article)? 10: $_cfg_page_size_article;
    $max_page       = ceil($article_count / $page_size);

    $page           = ( $page < 1 ) ? 1 : $page;
    $page           = ( $page > $max_page ) ? $max_page : $page;

    $record_start   = ($page - 1) * $page_size;

    // article
    $sql    = ' select
                    article.article_id id, article.abstract,
                    article.title, article.update_time,
                    article.view_count vc,
                    article_cate.cate_name caname,
                    article_cate.cate_id caid
                from
                    article, article_cate 
                where
                    article.cate_id = article_cate.cate_id
                    '.
                    $caid_sql.
                    ' limit '. $record_start. ', '. $page_size;

    $sth    = $dbh->prepare($sql);

    if ( $caid ) { $sth->bindValue(':caid', $caid, PDO::PARAM_INT); }

    $sth->execute();
    $article_data   = $sth->fetchAll(PDO::FETCH_ASSOC);

}
//var_dump($sql);
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

// article_cate
$sql        = ' select cate_id, cate_name from article_cate';
$sth        = $dbh->prepare($sql);
$sth->execute();
$cate_data  = $sth->fetchAll(PDO::FETCH_ASSOC);
$cate_data  = set_array_key($cate_data, 'cate_id');
// var_dump($cate_data); exit();

$sth    = NULL;
$dbh    = NULL;


// crumbs start
$cmb['file']        = $_SERVER['SCRIPT_NAME'];
if ( !empty($caid) ) {
    $cmb['caid']    = $caid;
    $cmb['caname']  = $cate_data[$caid]['cate_name'];
}
$crumbs = get_crumbs($cmb);
// crumbs end


$title      = $_cfg_logo_alt. '-文章列表';
$navi_cur   = 'article';


include('./tpl/article_list.php');
?>

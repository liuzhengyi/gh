<?php

/**
 * 按照二维数组的第二维的某个键名$key将数组分组
 * 分组后第二维的键名是相应的$key
 * gipsaliu@gmail.com
 * since: 2014-03-14
 * 
 */
function group_array_key( $Array, $Key='id' ) {
    $array = array();
    foreach( $Array as $element ) {
        $array[$element[$Key]][] = $element;
    }

    return $array;
}

/**
 * 由region_id 得到 region_name
 * gipsaliu@gmail.com
 * since: 2014-03-14
 * 
 */
function get_region_name( $Region_id ) {
    switch ($Region_id) {
        case 1:
            $region_name = '欧洲';
            break;
        case 2:
            $region_name = '北美';
            break;
        case 3:
            $region_name = '亚太';
            break;
        default:
            $region_name = DEBUG ? 'unknown region' : '';
        
    }

    return $region_name;
}

/** 
 * 由分号分隔的图片url串中取出一个单独的url地址
 * 默认取第一个，默认分隔符为';'
 * gipsaliu@gmail.com
 * since: 2014-03-14
 *
 */
function get_img_url( $Urls, $Delimiter=';' ) {
    $urls = split($Delimiter, $Urls);
    return $urls;
}

/** 
 * 由分号分隔的图片url串中取出一个单独的url地址
 * 默认取第一个，默认分隔符为';'
 * gipsaliu@gmail.com
 * since: 2014-03-14
 *
 */
function get_single_img_url( $Urls, $Index=0, $Delimiter=';' ) {
    $urls = split($Delimiter, $Urls);
    return $urls[$Index];
}

function get_house_list_by_region( $Rid ) {
    global $_cfg_siteRoot;
    return $_cfg_siteRoot. 'sale_list.php?rid='. $Rid;
}

function get_house_list_by_country( $Coid ) {
    global $_cfg_siteRoot;
    return $_cfg_siteRoot. 'sale_list.php?coid='. $Coid;
}

function get_house_by_id( $Id ) {
    global $_cfg_siteRoot;
    return $_cfg_siteRoot. 'sale_detail.php?id='. $Id;
}

function get_price_desc( $Level ) {
    $desc   = '';
    switch ( $Level ) {
        case 1:
            $desc = '100万以下';
            break;
        case 2:
            $desc = '100万-200万';
            break;
        case 3:
            $desc = '200万-300万';
            break;
        case 4:
            $desc = '300万-400万';
            break;
        case 5:
            $desc = '400万-500万';
            break;
        case 6:
            $desc = '500万以上';
            break;
        default:
            break;
    }

    return $desc;
}

/**
 *  获取文章类型描述
 *
 */
function get_article_type_desc( $Type=1 ) {
    switch ( $Type ) {
        case 1:
            $desc = '海外购房指南';
            break;
        case 2:
            $desc = '海外租房指南';
            break;
        default:
            $desc = 'unknown article type';
            break;
    }

    return $desc;
}

/**
 *  获取房产物业类型描述
 *
 */
function get_house_type_desc( $Type=1 ) {
    switch ( $Type ) {
        case 1:
            $desc = '公寓';
            break;
        case 2:
            $desc = '别墅';
            break;
        default:
            $desc = 'unknown house type';
            break;
    }

    return $desc;
}

?>

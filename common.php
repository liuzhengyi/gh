<?php
/**
 * 用到的函数封装
 * gipsaliu@gmail.com
 * since: 2014-03-14
 * 
 */

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
 * 将二维数组的第二维的某个键值提升为第一位的键名
 * gipsaliu@gmail.com
 * since: 2014-03-14
 * 
 */
function set_array_key( $Array, $Key='id' ) {
    $res_array = array();
    foreach( $Array as $element ) {
        $res_array[$element[$Key]] = $element;
    }

    return $res_array;
}

/**
 * 测试 set_array_key
 * gipsaliu@gmail.com
 * since: 2014-03-14
 * 
 */
function test_set_array_key() {
    $test_arr = array(
        'a' => array('id'=> 2, 'name'=>'name2'),
        'b' => array('id'=> 3, 'name'=>'name3'),
        'c' => array('id'=> 4, 'name'=>'name4'),
        'd' => array('id'=> 6, 'name'=>'name6'),
    );
    var_dump(set_array_key( $test_arr));
}

/**
 * 由region_id 得到 region_name
 * gipsaliu@gmail.com
 * since: 2014-03-14
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

/**
 * 由region_id 得到 房产列表链接地址
 * gipsaliu@gmail.com
 * since: 2014-03-14
 */
function get_house_list_by_region( $Rid ) {
    global $_cfg_siteRoot;
    return $_cfg_siteRoot. 'house_list.php?rid='. $Rid;
}

/**
 * 由country_id 得到 房产列表链接地址
 * gipsaliu@gmail.com
 * since: 2014-03-14
 */
function get_house_list_by_country( $Coid ) {
    global $_cfg_siteRoot;
    return $_cfg_siteRoot. 'house_list.php?coid='. $Coid;
}

/**
 * 由house_id 得到 房产详情链接地址
 * gipsaliu@gmail.com
 * since: 2014-03-14
 */
function get_house_by_id( $Id ) {
    global $_cfg_siteRoot;
    return $_cfg_siteRoot. 'house.php?id='. $Id;
}

/**
 * 由price_level 得到 价格的描述
 * gipsaliu@gmail.com
 * since: 2014-03-14
 */
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

/**
 *  获取当前位置 拼出面包屑字符串
 *
 */
function get_crumbs( $Params ) {
    global $_cfg_siteRoot;
    $params = array();

    $params['l0']['name'] = '平安好房-海外频道';
    $params['l0']['link'] = $_cfg_siteRoot;

    switch ( $Params['file'] ) {
        case '/house.php':
        case '/house_list.php':

            $params['l1']['name'] = '海外购房';
            $params['l1']['link'] = $_cfg_siteRoot. 'house_list.php';

            // region > country > house_name
            if ( empty($Params['region'])) {
                $params['l2']['name'] = '全部';
                $params['l2']['link'] = $params['l1']['link'];
            } else {
                $params['l2']['name'] = get_region_name( $Params['region'] ). '置业';
                $params['l2']['link'] = $params['l1']['link']. '?region='. $Params['region'];

                if ( empty($Params['coname']) ) {

                    $params['l3']['name'] = '全部';
                    $params['l3']['link'] = $params['l2']['link'];

                } else {

                    $params['l3']['name'] = $Params['coname'];
                    $params['l3']['link'] = $params['l1']['link']. '?coid='. $Params['coid'];

                    if ( empty($Params['name']) ) {

                        $params['l4']['name'] = '全部';
                        $params['l4']['link'] = $params['l3']['link'];

                    } else {

                        $params['l4']['name'] = $Params['name'];
                        $params['l4']['link'] = '#';

                    }
                }
            }

            break;

        case '/article.php':
        case '/article_list.php':
            // cate > 
            $params['l1']['name'] = '租房资讯';
            $params['l1']['link'] = $_cfg_siteRoot. 'article_list.php';
            if ( empty($Params['caid']) ) {

                $params['l2']['name'] = '全部';
                $params['l2']['link'] = $params['l1']['link'];

            } else {

                $params['l2']['name'] = $Params['caname'];
                $params['l2']['link'] = $params['l1']['link']. '?caid='. $Params['caid'];

            }

            break;

        default:
            $params['l1'] = '平安好房-海外频道';
            break;
    }

    $crumbs = '<div class="oscrumb"><div class="s1">';
    foreach ( $params as $part ) {
        $crumbs .= '<a href="'. $part['link']. '" target="_blank">'. $part['name']. '</a> &gt; ';
    }

    $crumbs = substr( $crumbs, 0, strrpos( $crumbs, '&' ) - strlen($crumbs) );
    $crumbs .= '</div><div class="s2"></div><div class="clear"></div>';
    return $crumbs;
}

?>

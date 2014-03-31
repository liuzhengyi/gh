<?php
session_start();
/**
 * action: update an house
 * gipsaliu@gmail.com
 * since: 2014-03-29
 */

//var_dump($_POST);
//var_dump($_FILES); exit();

include_once('../../config.php');

require_once("../../lib/common.php");
require_once($_cfg_dbConfFile);

// permission control
require_once("../../lib/access_control.php");
check_login();

// get params
if (    empty($_POST['id']) || empty($_POST['city_id']) ||
        empty($_POST['name']) || empty($_POST['price_desc'])
   ) {
    output_json_error(-10001, '必填参数: 城市, 房产名, 价格描述, 不全!');
}


// upload image
if ( ! empty($_FILES) ) {
    $new_images = array();
    for ( $index = 0; $index < 4; ++$index ) {
        $name = 'house_img_'. $index;
        if ( ! empty($_FILES[$name]['name']) ) {
            $new_images[$name] = $_FILES[$name];
        } else {
            $new_images[$name] = NULL;
        }
    }
}

$new_urls = array();
$i = 0;
$has_new_image = false;
foreach ( $new_images as $name => $image ) {
    $new_urls[$i] = deal_upload_image($image, 'house');
    if ( !empty($new_urls[$i]) ) {
        $has_new_image = true;
    }
    ++$i;
}

// 连接数据库
$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);

// 处理文件对比
if ( $has_new_image ) {

    // get old image urls
    $sql    = 'select image_urls from house where house_id = :id ';
    $sth    = $dbh->prepare($sql);
    $sth->bindParam(':id', intval($_POST['id']), PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    $old_urls   = get_img_url($result['image_urls']);

    foreach ( $new_urls as $index => $url ) {
        if ( $url ) {
            if ( isset($old_urls[$index]) ) {
                delete_image_by_db_url($old_urls[$index]);
            }
            $old_urls[$index] = $url;
        }
    }

    $image_urls = implode(';', $old_urls);
}

// filter params
$params['id']                   = intval($_POST['id']);
$params['city_id']              = strval($_POST['city_id']);
$params['name']                 = strval($_POST['name']);
$params['price_desc']           = strval($_POST['price_desc']);
$params['type']                 = empty($_POST['type']) ? '' : intval($_POST['type']);
$params['display_order']        = empty($_POST['display_order']) ? '' : intval($_POST['display_order']);
$params['view_count']           = empty($_POST['view_count']) ? '' : intval($_POST['view_count']);
$params['layout_area']          = empty($_POST['layout_area']) ? '' : strval($_POST['layout_area']);
$params['price_level']          = empty($_POST['price_level']) ? '' : intval($_POST['price_level']);
$params['position']             = empty($_POST['position']) ? '' : strval($_POST['position']);
$params['decoration_state']     = empty($_POST['decoration_state']) ? '' : strval($_POST['decoration_state']);
$params['property']             = empty($_POST['property']) ? '' : strval($_POST['property']);
$params['project_intro_brief']  = empty($_POST['project_intro_brief']) ? '' : strval($_POST['project_intro_brief']);
$params['project_intro']        = empty($_POST['project_intro']) ? '' : strval($_POST['project_intro']);
$params['phone_num']            = empty($_POST['phone_num']) ? '' : strval($_POST['phone_num']);
$params['is_on_sale']           = empty($_POST['is_on_sale']) ? '' : intval($_POST['is_on_sale']);
$params['is_rental']            = empty($_POST['is_rental']) ? '' : intval($_POST['is_rental']);
$params['remark']               = empty($_POST['remark']) ? '' : strval($_POST['remark']);


$update_image_urls = $has_new_image ? ' image_urls = "'. $image_urls. '", ' : '';

$sql    = ' update house set
                city_id = :city_id,
                name = :name,
                price_desc = :price_desc,
                '. $update_image_urls. '
                type = :type,
                display_order = :display_order,
                view_count = :view_count,
                layout_area = :layout_area,
                price_level = :price_level,
                position = :position,
                decoration_state = :decoration_state,
                property = :property,
                project_intro_brief = :project_intro_brief,
                project_intro = :project_intro,
                phone_num = :phone_num,
                is_on_sale = :is_on_sale,
                is_rental = :is_rental,
                remark = :remark,
                update_time = now()
            where
                house_id = :id
            limit 1';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':id', $params['id'], PDO::PARAM_INT);
$sth->bindParam(':city_id', $params['city_id'], PDO::PARAM_INT);
$sth->bindParam(':name', $params['name'], PDO::PARAM_STR);
$sth->bindParam(':price_desc', $params['price_desc'], PDO::PARAM_STR);
$sth->bindParam(':type', $params['type'], PDO::PARAM_INT);
$sth->bindParam(':display_order', $params['display_order'], PDO::PARAM_INT);
$sth->bindParam(':view_count', $params['view_count'], PDO::PARAM_INT);
$sth->bindParam(':layout_area', $params['layout_area'], PDO::PARAM_STR);
$sth->bindParam(':price_level', $params['price_level'], PDO::PARAM_INT);
$sth->bindParam(':position', $params['position'], PDO::PARAM_STR);
$sth->bindParam(':decoration_state', $params['decoration_state'], PDO::PARAM_STR);
$sth->bindParam(':property', $params['property'], PDO::PARAM_STR);
$sth->bindParam(':project_intro_brief', $params['project_intro_brief'], PDO::PARAM_STR);
$sth->bindParam(':project_intro', $params['project_intro'], PDO::PARAM_STR);
$sth->bindParam(':phone_num', $params['phone_num'], PDO::PARAM_STR);
$sth->bindParam(':is_on_sale', $params['is_on_sale'], PDO::PARAM_INT);
$sth->bindParam(':is_rental', $params['is_rental'], PDO::PARAM_INT);
$sth->bindParam(':remark', $params['remark'], PDO::PARAM_STR);

$result = $sth->execute();

if ( FALSE === $result ) {
    var_dump($sth->errorInfo());
    output_json_error(-10002, '修改失败');
}

output_json_info('修改成功', $_cfg_siteRootAdmin.'index.php?content=house');

?>

<?php
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

// TODO permission control

// get params
if (    empty($_POST['city_id']) || empty($_POST['name']) ||
        empty($_POST['price_desc']) || empty($_POST['image_urls'])
   ) {
    output_json_error(-10001, '必填参数: city_id, name, price_desc, image_urls 不全!');
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

// var_dump($new_images); // TODO upload images


// filter params
$params['city_id']              = strval($_POST['city_id']);
$params['name']                 = strval($_POST['name']);
$params['price_desc']           = strval($_POST['price_desc']);
$params['image']                = strval($_POST['image_urls']);
$params['type']                 = empty($_POST['type']) ? '' : intval($_POST['type']);
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


$dbh    = new PDO($_cfg_db_dsn, $_cfg_db_user, $_cfg_db_pwd);
$sql    = ' update house set
                city_id = :city_id,
                name = :name,
                price_desc = :price_desc,
                image_urls = :image,
                type = :type,
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
$sql    = ' insert into house (city_id, name, price_desc, image_urls, type, layout_area, price_level, position, decoration_state, property, project_intro_brief, project_intro, phone_num, is_on_sale, is_rental, remark, create_time, update_time) values (:city_id, :name, :price_desc, :image, :type, :layout_area, :price_level, :position, :decoration_state, :property, :project_intro_brief, :project_intro, :phone_num, :is_on_sale, :is_rental, :remark, now(), now())';
$sth    = $dbh->prepare($sql);

$sth->bindParam(':city_id', $params['city_id'], PDO::PARAM_INT);
$sth->bindParam(':name', $params['name'], PDO::PARAM_STR);
$sth->bindParam(':price_desc', $params['price_desc'], PDO::PARAM_STR);
$sth->bindParam(':image', $params['image'], PDO::PARAM_STR);
$sth->bindParam(':type', $params['type'], PDO::PARAM_INT);
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
    if ( DEBUG ) {
        var_dump($sth->errorInfo());
    }
    output_json_error(-10002, '添加失败');
}

output_json_info('添加成功');

?>

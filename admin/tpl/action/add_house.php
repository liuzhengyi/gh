<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>房产管理-添加房产</h2>
<form enctype="multipart/form-data" action="./action/add_house_do.php" METHOD="POST" >

    <span class="form-field-name">所在城市:</span>
    <select name="city_id" >
        <?php
        foreach ($city_data as $city) {
            echo    '<option value="'. $city['city_id'].
                    '" title="'. $city['city_id'].
                    '" >'. $city['ciname']. '/'. $city['coname'].
                    '</option>';
        }
        ?>
    </select> *
    <br />
    <span class="form-field-name">房产名字:</span><input type="text" name="name" required />*<br />
    <span class="form-field-name">房产类型:</span>
    <select name="type">
        <?php
        for ($index = 1; $index < 4; ++$index) {
            echo '<option value="'. $index. '" >'. get_house_type_desc($index). '</option>';
        }
        ?>
    </select> *
    <br />
    <span class="form-field-name">户型面积:</span><input type="text" name="layout_area" /> <br />
    <span class="form-field-name">价格描述:</span><input type="text" name="price_desc" required />*<br />
    <span class="form-field-name">价位:</span>
    <select name="price_level">
        <?php
        for ( $index = 0; $index < 7; ++$index ) {
            $selected = ($index == $data['price_level']) ? 'selected="selected"' : '';
            echo    '<option value="'. $index. '" '. $selected.
                    ' title="'. $data['price_level'].
                    '" >'. get_price_desc($index).
                    '</option>';
        }
        ?>
    </select> 
    <br />

    <span class="form-field-name">位置:</span><input type="text" name="position" /> <br />
    <span class="form-field-name">装修情况:</span><input type="text" name="decoration_state" /> <br />
    <span class="form-field-name">产权:</span><input type="text" name="property" /> <br />
    <span class="form-field-name">项目简介:</span><textarea cols="10" rows="5" name="project_intro_brief" ></textarea> <br />
    <span class="form-field-name">项目介绍:</span><textarea cols="20" rows="30" name="project_intro" ></textarea> <br />
    <span class="form-field-name">联系电话:</span><input type="text" name="phone_num" /> <br />

    <br />
    <div >
        <span class="form-field-name">图片:</span>*<br />
        <?php
        for ( $index = 0; $index < 4; ++$index ) {
            $show_index = $index + 1;
            if ( empty($img_data[$index]) ) {
                $add_or_update  = '添加图片';
                $show_image     = '暂无';
            } else {
                $add_or_update  = '修改图片';
                $img_url        = get_admin_image($img_data[$index]);
                $show_image     = '<img src="'. $img_url. '" />';
            }
            echo '图'. $show_index. ':(宽:360px 高:240px)<br />'. $show_image ;
            $add_or_update = empty($img_data[$index]) ? '添加图片' : '修改图片';
            echo $add_or_update. '<input type="file" name="house_img_'. $index . '" /><br /><br />';
        }
        ?>
    </div>
    <br />

    <span class="form-field-name">是否出租:</span>
    <?php
    $check_data = array('0' => '是', '1' => '否' );
    foreach ( $check_data as $field => $value ) {
        echo '<input type="radio" name="is_on_sale" value="'. $field. '" />'. $value ;
    }
    ?>
    <br />

    <span class="form-field-name">是否出售:</span>
    <?php
        $check_data = array('0' => '是', '1' => '否' );
        foreach ( $check_data as $field => $value ) {
            echo '<input type="radio" name="is_rental" value="'. $field. '" />'. $value ;
        }
    ?>
    <br />

    <span class="form-field-name">备注:</span><input type="text" name="remark" /> <br />

    <span class="form-field-name"></span><input type="submit" name="submit" value="添加" class="btn btn-lg btn-success"/> <br />

</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

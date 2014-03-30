<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>房产管理-编辑房产</h2>
<form enctype="multipart/form-data" action="./action/edit_house_do.php" METHOD="POST" >

    <span class="form-field-name">所在城市:</span>
    <select name="city_id" >
        <?php
        foreach ($city_data as $city) {
            $selected = ($data['city_id'] == $city['city_id']) ? 'selected="selected"' : '';
            echo    '<option value="'. $city['city_id'].
                    '" '. $selected. ' title="'. $city['city_id'].
                    '" >'. $city['ciname']. '/'. $city['coname'].
                    '</option>';
        }
        ?>
    </select> *
    <br />
    <span class="form-field-name">房产名字:</span><input type="text" name="name" value="<?php echo $data['name'];?>" />*<br />
    <span class="form-field-name">房产类型:</span>
    <select name="type">
        <?php
        for ($index = 1; $index < 4; ++$index) {
            $selected = ($index == $data['type']) ? 'selected="selected"' : '';
            echo '<option value="'. $index. '" '. $selected. ' >'. get_house_type_desc($index). '</option>';
        }
        ?>
    </select> *
    <br />
    <span class="form-field-name">户型面积:</span><input type="text" name="layout_area" value="<?php echo $data['layout_area'];?>" /> <br />
    <span class="form-field-name">价格描述:</span><input type="text" name="price_desc" value="<?php echo $data['price_desc'];?>" />*<br />
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

    <span class="form-field-name">位置:</span><input type="text" name="position" value="<?php echo $data['position'];?>" /> <br />
    <span class="form-field-name">装修情况:</span><input type="text" name="decoration_state" value="<?php echo $data['decoration_state'];?>" /> <br />
    <span class="form-field-name">产权:</span><input type="text" name="property" value="<?php echo $data['property'];?>" /> <br />
    <span class="form-field-name">项目简介:</span><textarea cols="10" rows="5" name="project_intro_brief" ><?php echo $data['project_intro_brief'];?> </textarea> <br />
    <span class="form-field-name">项目介绍:</span><textarea cols="20" rows="30" name="project_intro" ><?php echo $data['project_intro'];?> </textarea> <br />
    <span class="form-field-name">联系电话:</span><input type="text" name="phone_num" value="<?php echo $data['phone_num'];?>" /> <br />

    <br />
    <div >
        <span class="form-field-name">图片:</span><input type="text" name="image_urls" value="<?php echo $data['image_urls'];?>" />*<br />
        <?php
        for ( $index = 0; $index < 4; ++$index ) {
            $show_index = $index + 1;
            if ( empty($img_data[$index]) ) {
                $add_or_update  = '添加图片';
                $show_image     = '暂无';
            } else {
                $add_or_update  = '修改图片';
                $img_url        = $_cfg_img_baseurl_admin. $img_data[$index];
                $show_image     = '<img src="'. $img_url. '" />';
            }
            echo '图'. $show_index. ':<br />'. $show_image ;
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
        $checked = ($field == $data['is_on_sale']) ? 'checked="checked"' : '';
        echo '<input type="radio" name="is_on_sale" value="'. $field. '" '. $checked. ' />'. $value ;
    }
    ?>
    <br />

    <span class="form-field-name">是否出售:</span>
    <?php
        $check_data = array('0' => '是', '1' => '否' );
        foreach ( $check_data as $field => $value ) {
            $checked = ($field == $data['is_rental']) ? 'checked="checked"' : '';
            echo '<input type="radio" name="is_rental" value="'. $field. '" '. $checked. ' />'. $value ;
        }
    ?>
    <br />

    <span class="form-field-name">备注:</span><input type="text" name="remark" value="<?php echo $data['remark'];?>" /> <br />
    <input type="hidden" name="id" value="<?php echo $data['house_id'];?>" />

    <span class="form-field-name"></span><input type="submit" name="submit" value="保存" class="btn btn-lg btn-success"/> <br />

</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

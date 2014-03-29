<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>房产管理-编辑房产</h2>
<form action="./action/add_house_do.php" METHOD="POST" >
    <span class="form-field-name"></span><input type="submit" name="submit" value="保存" /> <br />

    <span class="form-field-name">所在城市:</span><input type="text" name="city_id" value="<?php echo $data['city_id'];?>" /> <br />
    <span class="form-field-name">房产名字:</span><input type="text" name="name" value="<?php echo $data['name'];?>" /> <br />
    <span class="form-field-name">房产类型:</span><input type="text" name="type" value="<?php echo $data['type'];?>" /> <br />
    <span class="form-field-name">户型面积:</span><input type="text" name="layout_area" value="<?php echo $data['layout_area'];?>" /> <br />
    <span class="form-field-name">价格描述:</span><input type="text" name="price_desc" value="<?php echo $data['price_desc'];?>" /> <br />
    <span class="form-field-name">价位:</span><input type="text" name="price_level" value="<?php echo $data['price_level'];?>" /> <br />
    <span class="form-field-name">位置:</span><input type="text" name="position" value="<?php echo $data['position'];?>" /> <br />
    <span class="form-field-name">装修情况:</span><input type="text" name="decoration_state" value="<?php echo $data['decoration_state'];?>" /> <br />
    <span class="form-field-name">产权:</span><input type="text" name="property" value="<?php echo $data['property'];?>" /> <br />
    <span class="form-field-name">项目简介:</span><input type="text" name="project_intro_brief" value="<?php echo $data['project_intro_brief'];?>" /> <br />
    <span class="form-field-name">项目介绍:</span><input type="text" name="project_intro" value="<?php echo $data['project_intro'];?>" /> <br />
    <span class="form-field-name">联系电话:</span><input type="text" name="phone_num" value="<?php echo $data['phone_num'];?>" /> <br />
    <span class="form-field-name">图片地址:</span><input type="text" name="image_urls" value="<?php echo $data['image_urls'];?>" /> <br />
    <span class="form-field-name">是否出租:</span><input type="text" name="is_on_sale" value="<?php echo $data['is_on_sale'];?>" /> <br />
    <span class="form-field-name">是否出售:</span><input type="text" name="is_rental" value="<?php echo $data['is_rental'];?>" /> <br />
    <span class="form-field-name">备注:</span><input type="text" name="remark" value="<?php echo $data['remark'];?>" /> <br />

</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

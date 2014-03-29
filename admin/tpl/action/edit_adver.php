<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>广告管理-编辑广告</h2>
<form action="./action/edit_adver_do.php" METHOD="POST" >

    <span class="form-field-name"></span><input type="submit" name="submit" value="修改" /> <br />

    <span class="form-field-name">标题:</span><input type="text" name="title" value="<?php echo $data['ad_title'];?>" /> <br />
    <span class="form-field-name">图片:</span><input type="text" name="img_url" value="<?php echo $data['image_url'];?>" /> <br />
    <span class="form-field-name">位置:</span><input type="text" name="ad_type" value="<?php echo $data['ad_type'];?>" /> <br />
    <span class="form-field-name">链接:</span><input type="text" name="link_url" value="<?php echo $data['link_url'];?>" /> <br />
    <span class="form-field-name">描述:</span><input type="text" name="desc" value="<?php echo $data['desc'];?>" /> <br />
    <span class="form-field-name">备注:</span><input type="text" name="remark" value="<?php echo $data['remark'];?>" /> <br />
</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>广告管理-编辑广告</h2>
<form enctype="multipart/form-data" action="./action/edit_adver_do.php" METHOD="POST" role="form" class="">


    <span class="form-field-name">标题:</span><input type="text" name="title" value="<?php echo $data['ad_title'];?>" /> <br />
    <span class="form-field-name">位置:</span><input type="text" name="ad_type" value="<?php echo get_ad_type_desc($data['ad_type']);?>" readonly="ture" />(不可改)<br />
    <span class="form-field-name">宽:</span><input type="text" name="width" value="<?php echo $data['width'];?>px" readonly="ture" />(不可改)<br />
    <span class="form-field-name">高:</span><input type="text" name="height" value="<?php echo $data['height'];?>px" readonly="ture" />(不可改)<br />
    <span class="form-field-name">图片:</span><input type="text" name="img_url" class="" value="<?php echo $data['image_url'];?>" /> <br />

    <br />
    图:<br />
    <img src="<?php echo get_admin_image($data['image_url']); ?>" /><br />
    更换图片:<input type="file" name="ad_image" /><br />
    <br />

    <span class="form-field-name">链接:</span><input type="text" name="link_url" value="<?php echo $data['link_url'];?>" /> <br />
    <span class="form-field-name">描述:</span><input type="text" name="desc" value="<?php echo $data['desc'];?>" /> <br />
    <span class="form-field-name">备注:</span><input type="text" name="remark" value="<?php echo $data['remark'];?>" /> <br />
    <input type="hidden" name="id" value="<?php echo $data['ad_id']; ?>" />

    <span class="form-field-name"></span><input type="submit" name="submit" value="修改" class="btn btn-lg btn-success" /> <br />
</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

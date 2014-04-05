<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>站内图片广告管理-编辑广告</h2>
<form enctype="multipart/form-data" action="./action/edit_imgad_do.php" METHOD="POST" role="form" class="">


    <span class="form-field-name">标题:</span><input type="text" name="title" value="<?php echo $data['imgad_title'];?>" /> <br />

    <br />
    图片:(宽:960px 高不限)<br />
    <img src="<?php echo $_cfg_img_baseurl_admin. $data['img_url']; ?>" /><br />
    更换图片:<input type="file" name="ad_img" /><br />
    <br />

    <span class="form-field-name">描述:</span><input type="text" name="desc" value="<?php echo $data['desc'];?>" /> <br />
    <span class="form-field-name">备注:</span><input type="text" name="remark" value="<?php echo $data['remark'];?>" /> <br />
    <input type="hidden" name="id" value="<?php echo $data['imgad_id']; ?>" />
    <input type="hidden" name="old_img" value="<?php echo $data['img_url']; ?>" />

    <span class="form-field-name"></span><input type="submit" name="submit" value="修改" class="btn btn-lg btn-success" /> <br />
</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

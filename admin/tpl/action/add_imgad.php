<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>站内图片广告管理-添加广告</h2>
<form enctype="multipart/form-data" action="./action/add_imgad_do.php" METHOD="POST" role="form" class="">


    <span class="form-field-name">标题:</span><input type="text" name="title" /> <br />

    <br />
    图片:(宽:960px 高不限)<input type="file" name="ad_img" /><br />
    <br />

    <span class="form-field-name">描述:</span><input type="text" name="desc" value="<?php echo $data['desc'];?>" /> <br />
    <span class="form-field-name">备注:</span><input type="text" name="remark" value="<?php echo $data['remark'];?>" /> <br />

    <span class="form-field-name"></span><input type="submit" name="submit" value="修改" class="btn btn-lg btn-success" /> <br />
</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

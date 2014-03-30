<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>文章分类管理-编辑分类</h2>
<form action="./action/edit_cate_do.php" METHOD="POST" role="form" class="">


    <span class="form-field-name">分类名称:</span><input type="text" name="cate_name" value="<?php echo $data['cate_name'];?>" /> <br />
    <span class="form-field-name">备注:</span><input type="text" name="remark" value="<?php echo $data['remark'];?>" /> <br />
    <input type="hidden" name="id" value="<?php echo $data['cate_id']; ?>" />

    <span class="form-field-name"></span><input type="submit" name="submit" value="修改" class="btn btn-lg btn-success" /> <br />
</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

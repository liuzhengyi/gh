<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
    <h2>文章管理-编辑文章</h2>
    <form action="./action/add_article_do.php" METHOD="POST" >
        <span class="form-field-name"></span><input type="submit" name="submit" value="保存" /> <br />
        <span class="form-field-name">标题:</span><input type="text" name="title" value="<?php echo $data['title'];?>" /> <br />
        <span class="form-field-name">副标题:</span><input type="text" name="subtitle" value="<?php echo $data['subtitle'];?>" /> <br />
        <span class="form-field-name">分类:</span><input type="text" name="cate_id" value="<?php echo $data['cate_id'];?>" /> <br />
        <span class="form-field-name">类型:</span><input type="text" name="type" value="<?php echo $data['type'];?>" /> <br />
        <span class="form-field-name">摘要:</span><input type="text" name="abstract" value="<?php echo $data['abstract'];?>" /> <br />
        <span class="form-field-name">备注:</span><input type="text" name="link_url" value="<?php echo $data['remark'];?>" /> <br />
        <span class="form-field-name">内容:</span><input type="text" name="content" value="<?php echo $data['content'];?>" /> <br />

    </form>

</div>

<?php include('./tpl/uiparts/footer.php'); ?>

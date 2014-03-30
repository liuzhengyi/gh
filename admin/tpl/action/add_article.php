<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
    <h2>文章管理-添加文章</h2>
    <form action="./action/add_article_do.php" METHOD="POST" >
        <span class="form-field-name">标题:</span><input type="text" name="title" /> <br />
        <span class="form-field-name">副标题:</span><input type="text" name="subtitle" /> <br />
        <span class="form-field-name">分类:</span>
        <select name="cate_id" >
            <?php
            foreach ($cate_data as $cate) {
                echo    '<option value="'. $cate['cate_id'].
                        '" title="'. $cate['cate_id'].
                        '" >'. $cate['cate_name'].  '</option>';
            }
            ?>
        </select> *
        <br />
        <span class="form-field-name">类型:</span>
        <select name="type">
            <?php
            for ($index = 1; $index < 4; ++$index) {
                $selected = ($index == $data['type']) ? 'selected="selected"' : '';
                echo '<option value="'. $index. '" '. $selected. ' >'. get_article_type_desc($index). '</option>';
            }
            ?>
        </select> *
        <br />
        <span class="form-field-name">摘要:</span><input type="text" name="abstract" /> <br />
        <span class="form-field-name">备注:</span><input type="text" name="remark" /> <br />
        <span class="form-field-name">内容:</span><input type="text" name="content" /> <br />

        <span class="form-field-name"></span><input type="submit" name="submit" value="添加" class="btn btn-lg btn-success" /> <br />

    </form>

</div>

<?php include('./tpl/uiparts/footer.php'); ?>

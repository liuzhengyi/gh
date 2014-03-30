<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>国家列表管理-编辑国家</h2>
<form action="./action/edit_country_do.php" METHOD="POST" role="form" class="">


    <span class="form-field-name">国家名称:</span><input type="text" name="name" value="<?php echo $data['name'];?>" /> <br />
    所属区域: 
        <select name="region">
            <?php
            for( $index = 1; $index < 5; ++$index ) {
                $selected = ($index == $data['region']) ? 'selected="selected"' : '';
                echo '<option value="'. $index. '" '. $selected. '>'. get_region_name($index). '</option>';
            }
            ?>
        </select>
    <br />
    <span class="form-field-name">备注:</span><input type="text" name="remark" value="<?php echo $data['remark'];?>" /> <br />
    <input type="hidden" name="id" value="<?php echo $data['country_id']; ?>" />

    <span class="form-field-name"></span><input type="submit" name="submit" value="修改" class="btn btn-lg btn-success" /> <br />
</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

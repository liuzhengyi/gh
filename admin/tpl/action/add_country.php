<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>国家列表管理-添加国家</h2>
<form action="./action/add_country_do.php" METHOD="POST" role="form" class="">


    <span class="form-field-name">国家名称:</span><input type="text" name="name"  /> <br />
    所属区域: 
        <select name="region">
            <?php
            for( $index = 1; $index < 5; ++$index ) {
                echo '<option value="'. $index. '" >'. get_region_name($index). '</option>';
            }
            ?>
        </select>
    <br />
    <span class="form-field-name">备注:</span><input type="text" name="remark" /> <br />
    <input type="hidden" name="id" />

    <span class="form-field-name"></span><input type="submit" name="submit" value="添加" class="btn btn-lg btn-success" /> <br />
</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

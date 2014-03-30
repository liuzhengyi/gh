<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>城市列表管理-编辑城市</h2>
<form action="./action/edit_city_do.php" METHOD="POST" role="form" class="">


    <span class="form-field-name">城市名称:</span><input type="text" name="name" value="<?php echo $data['name'];?>" /> <br />
    所属国家: 
        <select name="country_id">
            <?php
            foreach( $country_data as $country ) {
                $selected = ($country['country_id'] == $data['country_id']) ? 'selected="selected"' : '';
                echo '<option value="'. $country['country_id']. '" '. $selected. '>'. $country['name']. '</option>';
            }
            ?>
        </select>
    <br />
    <span class="form-field-name">备注:</span><input type="text" name="remark" value="<?php echo $data['remark'];?>" /> <br />
    <input type="hidden" name="id" value="<?php echo $data['city_id']; ?>" />

    <span class="form-field-name"></span><input type="submit" name="submit" value="修改" class="btn btn-lg btn-success" /> <br />
</form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

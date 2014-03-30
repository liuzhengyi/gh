<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">

    <h2>城市列表管理-添加城市</h2>

    <form action="./action/add_city_do.php" METHOD="POST" role="form" class="">


        <span class="form-field-name">城市名称:</span><input type="text" name="name" /> <br />
        所属国家: 
            <select name="country_id">
                <?php
                foreach( $country_data as $country ) {
                    echo '<option value="'. $country['country_id']. '" >'. $country['name']. '</option>';
                }
                ?>
            </select>
        <br />
        <span class="form-field-name">备注:</span><input type="text" name="remark" /> <br />

        <span class="form-field-name"></span><input type="submit" name="submit" value="添加" class="btn btn-lg btn-success" /> <br />
    </form>


</div>

<?php include('./tpl/uiparts/footer.php'); ?>

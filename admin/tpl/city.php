<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>城市列表管理</h2>

<form action="<?php echo $_cfg_siteRootAdmin. '/action/add_city_do.php';?>" method="POST" role="form" class="" >
城市名: <input type="text" name="name" />
所属国家: 
    <select name="country_id">
        <?php
        foreach( $country_data as $country ) {
            echo '<option value="'. $country['country_id']. '">'. $country['name']. '</option>';
        }
        ?>
    </select>
备注: <input type="text" name="remark" />
    <input type="submit" name="submit" value="添加城市" class="btn">
</form>

<table id="city-manage" border="1" >
    <thead>
        <tr>
            <th id="">ID</th>
            <th id="">城市名称</th>
            <th id="">所属国家</th>
            <th id="">创建时间</th>
            <th id="">更新时间</th>
            <th id="">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ( $city_data as $city ) {
            $del_url    = $_cfg_siteRootAdmin. 'action/del_city_do.php?id='. $city['city_id'];

            echo '<tr>';
            echo '<td>'. $city['city_id']. '</td>';
            echo '<td>'. $city['ciname']. '</td>';
            echo '<td>'. $city['coname']. '</td>';
            echo '<td>'. $city['create_time']. '</td>';
            echo '<td>'. $city['update_time']. '</td>';
            echo '<td><a href="'. $del_url. '" class="btn" >删除</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

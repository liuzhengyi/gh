<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>国家列表管理</h2>

<form action="<?php echo $_cfg_siteRootAdmin. '/action/add_country_do.php';?>" method="POST" role="form" class="" >
国家名: <input type="text" name="name" />
所属区域: 
    <select name="region">
        <?php
        for( $index = 1; $index < 5; ++$index ) {
            echo '<option value="'. $index. '">'. get_region_name($index). '</option>';
        }
        ?>
    </select>
备注: <input type="text" name="remark" />
    <input type="submit" name="submit" value="添加国家" class="btn">
</form>

<table id="country-manage" border="1" >
    <thead>
        <tr>
            <th id="">ID</th>
            <th id="">国家名称</th>
            <th id="">所属区域</th>
            <th id="">创建时间</th>
            <th id="">更新时间</th>
            <th id="">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ( $country_data as $country ) {
            $del_url    = 'unfinished';

            echo '<tr>';
            echo '<td>'. $country['country_id']. '</td>';
            echo '<td>'. $country['name']. '</td>';
            echo '<td>'. get_region_name($country['region']). '</td>';
            echo '<td>'. $country['create_time']. '</td>';
            echo '<td>'. $country['update_time']. '</td>';
            echo '<td><a href="'. $_cfg_siteRootAdmin. "action/del_country_do.php?id=". $country['country_id']. '" class="btn" >删除</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

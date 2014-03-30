<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>国家列表管理</h2>
<form>
<p><a href="#">添加国家</a></p>
国家: <input type="text" name="name" />
所属区域: 
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
            echo '<td><a href="#" class="btn" >删除(un)</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

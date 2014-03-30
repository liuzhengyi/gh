<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>城市列表管理</h2>
<p><a href="#">添加城市</a></p>
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
            $del_url    = 'unfinished';

            echo '<tr>';
            echo '<td>'. $city['city_id']. '</td>';
            echo '<td>'. $city['ciname']. '</td>';
            echo '<td>'. $city['coname']. '</td>';
            echo '<td>'. $city['create_time']. '</td>';
            echo '<td>'. $city['update_time']. '</td>';
            echo '<td><a href="#" class="btn" >删除(un)</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

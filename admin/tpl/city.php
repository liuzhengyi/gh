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
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ( $city_data as $city ) {
            $del_url    = 'unfinished';

            echo '<tr>';
            echo '<td>'. $city['city_id']. '</td>';
            echo '<td>'. $city['ciname']. '</td>';
            echo '<td>'. $city['status']. '</td>';
            echo '<td><a href="#">删除(un)</a> <a href="'. $edit_url. '">修改</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

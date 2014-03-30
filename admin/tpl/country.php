<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>国家列表管理</h2>
<p><a href="#">添加国家</a></p>
<table id="country-manage" border="1" >
    <thead>
        <tr>
            <th id="">ID</th>
            <th id="">国家名称</th>
            <th id="">所属区域</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ( $country_data as $country ) {
            $edit_url   = $_cfg_siteRootAdmin. '/edit.php?content=country&id='. $country['country_id'];
            $del_url    = 'unfinished';

            echo '<tr>';
            echo '<td>'. $country['country_id']. '</td>';
            echo '<td>'. $country['ciname']. '</td>';
            echo '<td><a href="#">删除(un)</a> <a href="'. $edit_url. '">修改</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">

    <h2>城市列表管理</h2>
    <p><a href="<?php echo $add_url; ?>" class="btn" >添加城市</a></p>

    <p class="warning">注意: 有房产的城市不能直接删除。</p>

    <table id="city-manage" border="1" >
        <thead>
            <tr>
                <th id="">ID</th>
                <th id="">城市名称</th>
                <th id="">所属国家</th>
                <th id="">房产数量</th>
                <th id="">备注</th>
                <th id="">创建时间</th>
                <th id="">更新时间</th>
                <th id="">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ( $city_data as $city ) {
                $edit_url   = $_cfg_siteRootAdmin. 'edit.php?content=city&id='. $city['city_id'];
                $del_btn    = '<a href="'.$_cfg_siteRootAdmin. 'action/del_city_do.php?id='. $city['city_id'] . '" class="btn btn-warning">删除</a>' ;
                $del_btn    = ( $city['num'] > 0 ) ? '' : $del_btn ;

                echo '<tr>';
                echo '<td>'. $city['city_id']. '</td>';
                echo '<td>'. $city['ciname']. '</td>';
                echo '<td>'. $city['coname']. '</td>';
                echo '<td>'. $city['num']. '</td>';
                echo '<td>'. $city['remark']. '</td>';
                echo '<td>'. $city['create_time']. '</td>';
                echo '<td>'. $city['update_time']. '</td>';
                echo '<td><a href="'. $edit_url. '" class="btn" >修改</a><br /><br />'. $del_btn. '  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">

    <h2>置业管理</h2>
    <p><a href="<?php echo $add_url; ?>" class="btn" >添加置业</a></p>

    <table id="house-manage" border="1" >
        <thead>
            <tr>
                <th id="">ID</th>
                <th id="">城市</th>
                <th id="">NAME</th>
                <th id="">类型</th>
                <th id="">排序</th>
                <th id="">预览图</th>
                <th id="">户型面积</th>
                <th id="">价格描述</th>
                <th id="">位置</th>
                <th id="">浏览量</th>
                <th id="">修改时间</th>
                <th id="">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ( $house_data as $house ) {
                $img_url    = $_cfg_img_baseurl_admin. get_single_img_url($house['image_urls']);
                $link_url   = $_cfg_siteRoot. 'house.php?id='. $house['house_id'];
                $edit_url   = $_cfg_siteRootAdmin. 'edit.php?content=house&id='. $house['house_id'];
                $del_url    = $_cfg_siteRootAdmin. 'action/del_house_do.php?id='. $house['house_id'];

                echo '<tr>';
                echo '<td>'. $house['house_id']. '</td>';
                echo '<td>'. $house['ciname']. '</td>';
                echo '<td><a href="'. $link_url. '" target="_blank">'. $house['name']. '</a></td>';
                echo '<td>'. get_house_type_desc($house['type']). '</td>';
                echo '<td>'. $house['display_order']. '</td>';
                echo '<td><a href="'. $img_url. '"><img src="'. $img_url. '" /></a></td>';
                echo '<td>'. $house['layout_area']. '</td>';
                echo '<td>'. $house['price_desc']. '</td>';
                echo '<td>'. $house['position']. '</td>';
                echo '<td>'. $house['view_count']. '</td>';
                echo '<td>'. $house['update_time']. '</td>';
                echo '<td><a href="'. $edit_url. '" class="btn" >修改</a><br /><br /><a href="'. $del_url. '" class="btn btn-warning" >删除</a>  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

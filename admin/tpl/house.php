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
                <th id="">TYPE</th>
                <th id="">预览图</th>
                <th id="">户型面积</th>
                <th id="">价格描述</th>
                <th id="">位置</th>
                <th id="">状态</th>
                <th id="">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ( $house_data as $house ) {
                $img_url    = $_cfg_siteRootAdmin. 'uploads/'. get_single_img_url($house['image_urls']);
                $link_url   = $_cfg_siteRoot. 'house.php?id='. $house['house_id'];
                $edit_url   = $_cfg_siteRootAdmin. 'edit.php?content=house&id='. $house['house_id'];
                $del_url    = $_cfg_siteRootAdmin. 'action/del_house_do.php?id='. $house['house_id'];

                echo '<tr>';
                echo '<td>'. $house['house_id']. '</td>';
                echo '<td>'. $house['ciname']. '</td>';
                echo '<td><a href="'. $link_url. '">'. $house['name']. '</a></td>';
                echo '<td>'. $house['type']. '</td>';
                echo '<td><a href="'. $img_url. '"><img src="'. $img_url. '" /></a></td>';
                echo '<td>'. $house['layout_area']. '</td>';
                echo '<td>'. $house['price_desc']. '</td>';
                echo '<td>'. $house['position']. '</td>';
                echo '<td>'. $house['status']. '</td>';
                echo '<td><a href="'. $del_url. '" class="btn" >删除</a> <a href="'. $edit_url. '" class="btn" >修改</a> </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

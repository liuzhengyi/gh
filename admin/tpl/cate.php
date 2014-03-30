<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>文章分类管理</h2>
<p><a href="#">添加分类</a></p>
<table id="ad-manage" border="1" >
    <thead>
        <tr>
            <th id="">ID</th>
            <th id="">分类名称</th>
            <th id="">备注</th>
            <th id="">Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ( $cate_data as $cate ) {
            $img_url    = $_cfg_siteRootAdmin. '/uploads/'. get_single_img_url($house['image_urls']);
            $link_url   = $_cfg_siteRoot. 'house.php?id='. $house['house_id'];
            $edit_url   = $_cfg_siteRootAdmin. '/edit.php?content=house&id='. $house['house_id'];
            $del_url    = 'unfinished';

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
            echo '<td><a href="#">删除(un)</a> <a href="'. $edit_url. '">修改</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

<?php include('./tpl/admin/admin_ui_header.php'); ?>

<div id="main-container">
<h2>广告管理</h2>
<table id="ad-manage" border="1" >
    <thead>
        <tr>
            <th id="">ID</th>
            <th id="">TITLE</th>
            <th id="">IMAGE</th>
            <th id="">TYPE</th>
            <th id="">W x H</th>
            <th id="">LINK TO</th>
            <th id="">Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ( $house_data as $house ) {
            $img_url = $house['image_url'];
            echo '<tr>';
            echo '<td>'. $house['ad_id']. '</td>';
            echo '<td>'. $house['ad_title']. '</td>';
            echo '<td id="ad-image"><a href="'. $img_url. '" title="点击查看原图" target="_blank"><img src="'. $img_url. '" width="200" /></td>';
            echo '<td>'. get_ad_type_desc($house['ad_type']). '</td>';
            echo '<td>'. $house['width']. ' x '. $house['height']. '</td>';
            echo '<td><a href="'. $house['link_url']. '" target="_blank">'. $house['link_url']. '</a></td>';
            echo '<td><a href="#">修改</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/admin/admin_ui_footer.php'); ?>

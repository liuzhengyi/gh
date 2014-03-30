<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container" class="row marketing">
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
        foreach ( $ad_data as $ad ) {
            $img_url    = $_cfg_siteRootAdmin. 'uploads/'. $ad['image_url'];
            $edit_url   = $_cfg_siteRootAdmin. 'edit.php?content=adver&id='. $ad['ad_id'];

            echo '<tr>';
            echo '<td>'. $ad['ad_id']. '</td>';
            echo '<td>'. $ad['ad_title']. '</td>';
            echo '<td id="ad-image"><a href="'. $img_url. '" title="点击查看原图" target="_blank"><img src="'. $img_url. '" width="200" /></td>';
            echo '<td>'. get_ad_type_desc($ad['ad_type']). '</td>';
            echo '<td>'. $ad['width']. ' x '. $ad['height']. '</td>';
            echo '<td><a href="'. $ad['link_url']. '" target="_blank">'. $ad['link_url']. '</a></td>';
            echo '<td><a href="'. $edit_url. '" class="btn" >修改</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

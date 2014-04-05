<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container" class="row marketing">

    <h2>站内图片广告管理</h2>
    <p><a href="<?php echo $add_url; ?>" class="btn" >添加站内图片广告</a></p>
    <table id="imgad-manage" border="1" >
        <thead>
            <tr>
                <th id="">ID</th>
                <th id="">TITLE</th>
                <th id="">IMAGE</th>
                <th id="">页面URL</th>
                <th id="">描述</th>
                <th id="">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ( $imgad_data as $imgad ) {
                $img_url    = $_cfg_img_baseurl_admin. $imgad['img_url'];
                $link_url   = $_cfg_siteRoot. 'ad.php?id='. $imgad['imgad_id'];
                $edit_url   = $_cfg_siteRootAdmin. 'edit.php?content=imgad&id='. $imgad['imgad_id'];
                $del_url    = $_cfg_siteRootAdmin. 'action/del_imgad_do.php?id='. $imgad['imgad_id'];

                echo '<tr>';
                echo '<td>'. $imgad['imgad_id']. '</td>';
                echo '<td>'. $imgad['imgad_title']. '</td>';
                echo '<td id="imgad-image"><a href="'. $img_url. '" title="点击查看原图" target="_blank"><img src="'. $img_url. '" width="100" /></td>';
                echo '<td>'. $link_url.'<br /><a href="'. $link_url. '" title="点击查看广告页面" target="_blank">查看广告页面</td>';
                echo '<td>'. $imgad['desc']. '</td>';
                echo '<td><a href="'. $edit_url. '" class="btn" >修改</a><br /><br /><a href="'. $del_url. '" class="btn btn-warning" >删除</a>  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

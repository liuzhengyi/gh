<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>文章分类管理</h2>
<p><a href="#">添加分类</a></p>
<table id="cate-manage" border="1" >
    <thead>
        <tr>
            <th id="">ID</th>
            <th id="">分类名称</th>
            <th id="">备注</th>
            <th id="">创建时间</th>
            <th id="">更新时间</th>
            <th id="">Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ( $cate_data as $cate ) {
            $edit_url   = $_cfg_siteRootAdmin. '/edit.php?content=cate&id='. $cate['cate_id'];
            $del_url    = 'unfinished';

            echo '<tr>';
            echo '<td>'. $cate['cate_id']. '</td>';
            echo '<td>'. $cate['cate_name']. '</td>';
            echo '<td>'. $cate['remark']. '</td>';
            echo '<td>'. $cate['create_time']. '</td>';
            echo '<td>'. $cate['update_time']. '</td>';
            echo '<td><a href="#" class="btn" >删除(un)</a> <a href="'. $edit_url. '" class="btn" >修改</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

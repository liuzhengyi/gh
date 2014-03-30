<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>文章分类管理</h2>

<form action="<?php echo $_cfg_siteRootAdmin. '/action/add_cate_do.php';?>" method="POST" role="form" class="" >
分类名称: <input type="text" name="cate_name" />
备注: <input type="text" name="remark" />
    <input type="submit" name="submit" value="添加分类" class="btn">
</form>

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
            $del_url    = $_cfg_siteRootAdmin. 'action/del_cate_do.php?id='. $cate['cate_id'];

            echo '<tr>';
            echo '<td>'. $cate['cate_id']. '</td>';
            echo '<td>'. $cate['cate_name']. '</td>';
            echo '<td>'. $cate['remark']. '</td>';
            echo '<td>'. $cate['create_time']. '</td>';
            echo '<td>'. $cate['update_time']. '</td>';
            echo '<td><a href="'. $del_url. '" class="btn" >删除</a> <a href="'. $edit_url. '" class="btn" >修改</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

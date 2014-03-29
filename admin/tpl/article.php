<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">
<h2>文章管理</h2>
<p><a href="#">添加文章</a></p>
<table id="ad-manage" border="1" >
    <thead>
        <tr>
            <th id="">ID</th>
            <th id="">TITLE</th>
            <th id="">摘要</th>
            <th id="">点击量</th>
            <th id="">类别</th>
            <th id="">状态</th>
            <th id="">Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ( $article_data as $article ) {
            $edit_url = '/edit.php?content=article&id='. $article['article_id'];

            echo '<tr>';
            echo '<td>'. $article['article_id']. '</td>';
            echo '<td>'. $article['title']. '</td>';
            echo '<td>'. $article['abstract']. '</td>';
            echo '<td>'. $article['view_count']. '</td>';
            echo '<td>'. $article['cate_name']. '</td>';
            echo '<td>'. $article['status']. '</td>';
            echo '<td><a href="#">删除(un)</a> <a href="'. $edit_url. '">修改</a> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

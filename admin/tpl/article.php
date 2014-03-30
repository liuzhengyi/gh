<?php include('./tpl/uiparts/header.php'); ?>

<div id="main-container">

    <h2>文章管理</h2>

    <p><a href="<?php echo $add_url; ?>" class="btn" >添加文章</a></p>

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
                $edit_url   = $_cfg_siteRootAdmin. 'edit.php?content=article&id='. $article['article_id'];
                $del_url    = $_cfg_siteRootAdmin. 'action/del_article_do.php?id='. $article['article_id'];
                $show_url   = $_cfg_siteRoot. 'article.php?id='. $article['article_id'];

                echo '<tr>';
                echo '<td>'. $article['article_id']. '</td>';
                echo '<td><a href="'. $show_url. '" target="_blank">'. $article['title']. '</a></td>';
                echo '<td>'. $article['abstract']. '</td>';
                echo '<td>'. $article['view_count']. '</td>';
                echo '<td>'. $article['cate_name']. '</td>';
                echo '<td>'. $article['status']. '</td>';
                echo '<td><a href="'. $edit_url. '" class="btn" >修改</a><br /><br /><a href="'. $del_url. '" class="btn btn-warning" >删除</a>  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

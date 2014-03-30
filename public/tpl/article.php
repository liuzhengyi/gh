<?php include('./tpl/uiparts/header.php'); ?>
<link rel="stylesheet" type="text/css" href="./css/News_2012.css">
<body>
<div id="SFmenu" style="position: absolute; z-index: 100;"></div>
<!--搜索begin-->
<?php include('./tpl/uiparts/new_search.php'); ?>
<!--搜索end-->

<!--导航 begin-->
<?php include('./tpl/uiparts/navi_header.php'); ?>
<!--导航 end-->

<!-- 面包屑 -->
<div class="worldbox">
<?php echo $crumbs; ?>
</div>

<div class="worldbox">
<div class="row" id="listNav">
       
</div>
</div>

<div class="worldbox">
<div class="clearfix news_con">
        <div id="MainTexBox" class="grid17 first">
            <div class="blkContainerSblk right_bar">
                  
                    <h1 align="center" id="h1Title"><?php echo $article_data['title'];?></h1>
                    <div class="artInfo">
                      <div align="center"><span id="media_name">
                      
                        </span><span id="pub_date">发布时间：<?php echo $article_data['create_time'];?></span></div>
                    </div>
                    <div class="blkContainerSblkCon blkContainerSblkCon_14" id="divContent">
                        <div class="quote">提要：<?php echo $article_data['abstract'];?></div>
                        <p></p>
                        <div align="left">
                        <?php echo nl2br($article_data['content']); ?>
                        </div>
                        <p class="related"><strong>&nbsp;延伸阅读</strong></p>
                        <ul>
                        <?php
                        // 延伸阅读
                        foreach ( $extended_article_data as $e_article ) {
                            $url = $_cfg_siteRoot. 'article.php?id='. $e_article['id'];
                            echo '<li><a href="'. $url. '" target="_blank" >'. $e_article['title']. '</a></li>';
                        }
                        ?>
                        </ul>
                        <p></p>
                    </div>

                    <div class="HSpace_15">
                    </div>
                </div>
            </div>

            <div class="grid280" id="hotNews">

              <div class="title_g clearfix">热门楼盘关注排行</div>
              <div class="topic_rank clearfix">
                <ul>
                    <?php
                    $index = 1;
                    foreach ( $hot_house_data as $hot_house ) {
                        $link_url   = $_cfg_siteRoot. 'house.php?id='. $hot_house['id'];
                        $class  = ( 1 == $index ) ? 'icon1' : 'icon2';
                        echo    '<li><strong class="'. $class. '">'. $index. '</strong><cite><b>'.
                                $hot_house['coname']. ' | </b><a target="_blank" href="'.
                                $link_url. '" title="'. $hot_house['name']. '">'.
                                $hot_house['name']. '</a></cite><span><b>'.
                                $hot_house['price_desc']. '</b></span></li>';

                        ++$index;
                    }
                    ?>
                </ul>
              </div>

              <div class="title_g clearfix">本周热点资讯排行</div>
                 <div class="topic_rank clearfix">
                    <ul>
                    <?php
                    $index = 1;
                    foreach ( $hot_article_data as $hot_article ) {
                        $link_url   = $_cfg_siteRoot. 'article.php?id='. $hot_article['id'];
                        $class  = ( 1 == $index ) ? 'icon1' : 'icon2';
                        echo    '<li><strong class="'. $class. '">'. $index. '</strong><cite>'.
                                '<a href="'.  $link_url.
                                '" title="'. $hot_article['title']. '">'.
                                $hot_article['title']. '</a></cite>'.
                                '</li>';
                        ++$index;
                    }
                    ?>
				   
                  </ul>
                </div>
        </div>
    </div>
</div>

<!--版尾begin-->
<?php include('./tpl/uiparts/footer.php'); ?>
<!-- 版尾 end-->
</body>
</html>

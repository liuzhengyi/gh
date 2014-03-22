<?php include('./tpl/uiparts/header.php'); ?>

<link rel="stylesheet" type="text/css" href="./css/News_2012.css">
<body>
<div id="SFmenu" style="position: absolute; z-index: 100;"></div>
<!--新搜索20120413 begin-->

    <?php include('./tpl/uiparts/new_search.php'); ?>


<!--导航 begin-->
    <?php include('./tpl/uiparts/navi_header.php'); ?>
<!--导航 end-->

<!--第二栏 begin-->
<div class="worldbox">
<?php echo $crumbs; ?>
</div>

<div class="worldbox">
<!--第一栏 begin-->
<div class="row" id="listNav">
       
</div>
</div>
<!--第2栏 begin-->	

<div class="worldbox">
  <section class="clearfix" id="newsCon">
        <div class="grid17 first">
            <div class="right_bar clearfix">
              
                <div class="news_BoxWrap"> 
              <ul>
                <?php
                if ( empty($article_data) ) {
                    echo '<p>对不起，没有相关资讯。</p>';
                } else {
                    foreach ( $article_data as $article ) {
                        $url    = $_cfg_siteRoot. 'article.php?id='. $article['id'];
                        echo    '<li><h2 class="news_BrowH clearfix">'.
                                '<a class="blue fl" href="'. $url.
                                '" target="_blank" title="'. $article['title'].
                                '"><strong>'. $article['title'].
                                '</strong></a><span class="news_date fr">'.
                                $article['update_time'].
                                '</span><span class="news_date fr">被浏览：<a href="'.
                                $url. '">'. $article['vc']. '</a>次</span></h2><p class="gray">'.
                                $article['abstract']. '</p><a href="'. $url.
                                '" target="_blank" title="显示全部" class="fr">显示全部&gt;&gt;</a></li>';
                    }
                }
                ?>
                  
                                
<div class="pager">
		
<?php
$base_url   = $_cfg_siteRoot. 'article_list.php?caid='. $caid. '&page=';
if ( $page > 1 ) {
    echo '<a href="'. $base_url. ($page-1). '">上一页</a>';
}
for ( $index = 1; $index <= $max_page; ++$index ) {
    if ( $page == $index ) {
        echo '<span class="current">'. $index. '</span>';
    } else {
        echo '<span class="item"><a href="'. $base_url. $index. '">'. $index. '</a></span>';
    }
}
if ( $page < $max_page ) {
    echo '<a href="'. $base_url. ($page+1). '">下一页</a>';
}
?>
                 


</div>

                    </ul>
                </div>
            </div>

    </div>	
	
		   <!--right-->
		
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
                        $link_url   = $_cfg_siteRoot. 'artilce.php?id='. $hot_article['id'];
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
		
<!--right-->
</section></div>
	
<!--版尾begin-->
<?php include('./tpl/uiparts/footer.php'); ?>

</body>
</html>

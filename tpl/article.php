<?php include('./tpl/uiparts/header.php'); ?>
<link rel="stylesheet" type="text/css" href="./article_files/News_2012.css">
<body>
<div id="SFmenu" style="position: absolute; z-index: 100;"></div>
<!--新搜索20120413 begin-->
<?php include('./tpl/uiparts/new_search.php'); ?>
<!--导航 begin-->
<?php include('./tpl/uiparts/navi_header.php'); ?>
<!--导航 end-->

<!--第二栏 begin-->
<div class="worldbox">
        <div class="breadcrumb"><strong>您的位置：</strong><a href="http://glohouse.net/index.asp">首页</a>
		
		
		
	  &gt;  <a href="http://glohouse.net/article.asp?lm=30">海外租房贴士</a>   &gt; <a href="http://glohouse.net/article.asp?lm=33">美国</a> &gt; <em>全部</em> 

		
        </div>
    </div>

<div class="worldbox">
<!--第一栏 begin-->
<div class="row" id="listNav">
       
</div>
</div>
<!--第2栏 begin-->	

<!--第一栏 begin-->
<div class="worldbox">
<div class="clearfix news_con">
        <div id="MainTexBox" class="grid17 first">
            <div class="blkContainerSblk right_bar">
                  
                    <h1 align="center" id="h1Title">
                        美国租房tips                    </h1>
                    <div class="artInfo">
                      <div align="center"><span id="media_name">
                      
                        </span><span id="pub_date">发布时间：<?php echo $article_data['create_time'];?></span></div>
                    </div>
                    <div class="blkContainerSblkCon blkContainerSblkCon_14" id="divContent">
                        <div class="quote">提要：在美国与在中国有一点是相同的，那就是在衣食住行中，住的消费所占的比重最大，要解决住的问题，一是买(buy)，二是租(rent)，三是转租(sublease)。单身的一般与别人合租，有家庭的单独租房，极少数夫妻俩都有收入的，而且准备在美国长期待下去的也买了房子。下面是在美国租房的一些经历和需要注意事项。
                        </div>
                        <pre>
                        <?php echo $article_data['content']; ?>
                        </pre>
<p class="related"><strong>&nbsp;延伸阅读</strong>
</p><ul>



<li><a href="http://glohouse.net/detail.asp?newsid=132" target="_blank">在美国申请校内学生公寓</a></li>


 


<li><a href="http://glohouse.net/detail.asp?newsid=131" target="_blank">美国租房要做到快、准、细</a></li>

</ul>
<p></p><p></p>
                    </div>

                    <div class="HSpace_15">
                    </div>
                    <!-- 功能按钮 start -->
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
            

    </div>
</div>

<!--版尾begin-->
<?php include('./tpl/uiparts/footer.php'); ?>
<!-- 版尾 end-->
</body>
</html>

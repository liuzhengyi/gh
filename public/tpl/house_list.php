<?php include('./tpl/uiparts/header.php'); ?>

<link href="./css/Home.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="SFmenu" style="position: absolute; z-index: 100;"></div>

    <!-- 搜索 -->
    <?php include('./tpl/uiparts/new_search.php'); ?>

    <!--导航 -->
    <?php include('./tpl/uiparts/navi_header.php'); ?>

<!--第1栏 begin-->
<div class="worldbox">
    <div class="worldbox">
        <?php echo $crumbs; ?>
    </div>
</div>

</div>

<!--第2栏 begin-->

<div class="worldbox">
<div id="search_list" class="clearfix"> 
        <!--left-->
        <div class="grid17 first">
        <!-- search_top-->
        <div class="search_box mb10">
        <div class="n3 clearfix">
            <dl>
                <dd><span>地区 / 国家：</span>
                <div class="con">
                    <a class="select" href="<?php echo $_cfg_siteRoot. 'house_list.php?coid='. '&pl='.$pl . '&type='. $type;?>">不限</a>
                    <?php
                    foreach ( $country_data as $country ) {
                        $url    = $_cfg_siteRoot. 'house_list.php?coid='.$country['country_id'] . '&pl='.$pl . '&type='. $type;
                        $name   = $country['name'];
                        echo '<a href="'. $url. '">'. $name. '</a>';
                    }
                   ?>
                </div>
                </dd>
                <dd><span>类型：</span>
                            <a class="select" href="<?php echo $_cfg_siteRoot. 'house_list.php?coid='.$coid . '&pl='.$pl . '&type='; ?>">不限</a>
                            <?php
                                for( $index = 1; $index < 3; ++$index ) {
                                    $url = $_cfg_siteRoot. 'house_list.php?coid='.$coid . '&pl='.$pl . '&type='. $index;
                                    echo '<a href="'. $url. '">'. get_house_type_desc($index). '</a>';
                                }
                            ?>
                           
                </dd>
                <dd><span>总价(RMB)：</span>
				<a class="select" href="<?php echo $_cfg_siteRoot. 'house_list.php?coid='.$coid . '&pl='. '&type='. $type;?>">不限</a>
                    <?php
                        for( $index = 1; $index < 7; ++$index ) {
                            $url = $_cfg_siteRoot. 'house_list.php?coid='.$coid . '&pl='.$index . '&type='. $type;
                            echo '<a href="'. $url. '">'. get_price_desc($index). '</a>';
                        }
                    ?>
                </dd>
            </dl>
        </div>
        </div>
        <!-- end-->
		
		
		
        <div class="bd">
          <div class="list_loop">
            
<?php
    if ( empty($house_data) ) {
        echo '<p>木有结果.. </p>';
    } else {
?>
    <?php foreach( $house_data as $house ) { ?>
    <?php $url = $_cfg_siteRoot. 'house.php?id='. $house['id']; ?>
    <?php $img_url = get_single_img_url($house['image_urls']); ?>
        <div class="loop clearfix" pid="/house/475">
        <div class="pic"><a href="<?php echo $url;?>" target="_blank"><img src="<?php echo $img_url;?>" alt="<?php echo $house['name'];?>"></a></div>
        <div class="nav">
          <h5 class="clearfix"><a href="<?php echo $url;?>" title="<?php echo $house['name'];?>" class="sub" target="_blank"><?php echo $house['name'];?></a> <span class="country"><em><?php echo $house['coname'];?>-<?php echo $house['ciname'];?></em></span></h5>
          <p class="p1" title="Genting Highlands,Malaysia">地&nbsp;&nbsp;址：<?php echo $house['position']; ?></p>
        <p class="p2">装修情况：<?php echo $house['decoration_state']?></p>
        <p class="p7">售&nbsp;&nbsp;价：<span class="price"><em><?php echo $house['price_desc']?></em></span
        </p>
        <p class="p3"><a href="<?php echo $url;?>" target="_blank">查看更多</a></p>
        </div>
        </div>
    <?php } ?>			
<?php } ?>			
			

<div class="pager">

<!-- 分页-->      

<?php
$base_url   = $_cfg_siteRoot. 'house_list.php?coid='. $coid. '&pl='. $pl. '&type='. $type. '&page=';
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

	<!--分页结束 -->
</div>
       
</div>
        <!--left end-->
      
    </div>    
        <!--right-->
        <div class="grid7">
            
            <div id="view_rank" class="gray_con">
                <h6 class="h6_title">热门关注排行<s title="hot" class="hot"></s></h6>
<div class="gray_msg">
    
    <dl class="clearfix">
        
        <dd>
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
        </dd>
    </dl>
    
                       
</div>
</div>
</div>
<!--right end-->
</div>

 <!--合作伙伴 begin-->
    <div class="friendLink2" id="world_B06_41"></div>
<!--合作伙伴 end-->
<?php include('./tpl/uiparts/footer.php'); ?>

</body>
</html>

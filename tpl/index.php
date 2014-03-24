<?php include('./tpl/uiparts/header.php'); ?>
</head>
<body>
    <div id="SFmenu" style="position: absolute; z-index: 100;">
    </div>

    <!--搜索 -->
    <?php include('./tpl/uiparts/new_search.php'); ?>

    <!--导航 -->
    <?php include('./tpl/uiparts/navi_header.php'); ?>
    <!--广告 begin-->
    <!--第二栏 begin-->
    <div class="worldbox">
            <p>
            <?php
            if ( !empty($ad_data) ) {
                foreach( $ad_data[1] as $ad ) {
                    echo    '<a href="'. $ad['link_url'].
                            '" target="_blank" >'. "\n". '<img src="'.
                            $ad['image_url']. '" alt="'.
                            $ad['ad_title']. '" width="'.
                            $ad['width']. '" height="'.
                            $ad['height']. '" border="0" vspace="1">'.
                            "\n</a>\n";
                }
            }
            ?>
            </p>
    </div>
    <!--广告 end-->

    <!--第一栏 begin-->
    <div class="worldbox">

        <div class="worldleft">
            <!--轮播st-->
            <div id="headPic" class="DTL" tid="HAIWAI_HomeIndex_TopAD">
            <!--焦点图 begin-->

                <div id="world_B05_05" class="worldFocus">
                    <div id="worldFocus_Box">
                        <ul style="width: 3060px; left: -2040px;" id="show_pic">
                            <?php
                            if ( !empty($ad_data[2]) ) {
                                foreach( $ad_data[2] as $ad ) {
                                    echo    '<li><a href="'. $ad['link_url'].
                                            '" target="_blank" ><img src="'.
                                            $ad['image_url']. '" alt="'.
                                            $ad['ad_title']. '" width="'.
                                            $ad['width']. '"></a>'. "\n";
                                    echo    '<div class="Bbg"></div>';
                                    echo    '<div class="textword"><a href="'.
                                            $ad['link_url']. '" target="_blank">'.
                                            $ad['ad_title']. '</a></div></li>';
                                }
                            }
                            ?>
                        </ul>
                        <div class="icon_num_bg">
                            <ul id="icon_num" style="left: -2550px;">
                              <li class=""></li>
                              <li class=""></li>
                              <li class=""></li>
                              <li class=""></li>
                              <li class="on"></li>
                            </ul>
                        </div>
                    </div>
                </div>
              <!--焦点图 end-->
            </div>
            <!--轮播end-->
        </div>

        <!--worldright -->
        <div class="worldright">
            <div class="worldHotsearch">
                <!--  <h2>热门搜索</h2> -->
                <div class="hotlinks">
                    <strong>地区/国家</strong>
                    <br>
                    <?php
                        foreach ( $country_data as $country ) {
                            $link_url = $_cfg_siteRoot. 'house_list.php?coid='. $country['country_id'];
                            echo    '<a href="'. $link_url. '" id="world_B05_12">'.  $country['name'].  '</a>';
                        }
                    ?>
                    <a href="<?php echo $_cfg_siteRoot;?>house_list.php" id="world_B05_12"> 更多&gt;&gt; </a>
                    <br>
                    <br>
                    <strong>物业总价（RMB）</strong>
                    <br>
                    <?php
                    for ( $level = 1; $level < 7; ++$level ) {
                        echo '<a href="'. $_cfg_siteRoot. 'house_list.php?pl='. $level. '">'. get_price_desc($level). '</a>';
                    }
                    ?>
                </div>
            </div>
            <!--购房俱乐部 begin-->
            <div class="worldOslogin">
                <h2><img src="./image/ui/club.png" width="170" height="70"></h2>
                <p id="pcardno">
                    <a href="#" id="world_B05_08" class="btnstyle">会员注册</a>
                </p>
                <ul id="world_B05_09">
                </ul>
            </div>
            <!--购房俱乐部 end-->
        </div>  
        <!--worldright end -->

        <div class="clear">
        </div>
    </div>

    <!--广告 begin-->
    <div class="worldbox">
        <?php
        if ( !empty($ad_data[4]) ) {
            foreach( $ad_data[4] as $ad ) {
                echo    '<li><a href="'. $ad['link_url'].
                        '" target="_blank" ><img src="'.
                        $ad['image_url']. '" alt="'.
                        $ad['ad_title']. '" width="'.
                        $ad['width']. '"></a>'. "\n";
            }
        }
        ?>
    </div>
	
    <!--广告 end-->
    <!--第二栏 begin-->
    <div class="worldbox">
        <ul class="listitem3 clearfix">
            <?php foreach( $house_data as $region => $houses ) { ?>
                <li class="<?php echo (3 == $region) ? 'last': ''; ?>">
                    <div class="worldTitle">
                        <h2><?php echo get_region_name($region);?>置业</h2>
                        <span class="more">
                        <a href="<?php echo $_cfg_siteRoot;?>house_list.php?region=<?php echo $region;?>" target="_blank" id="world_B06_01">更多&gt;&gt;</a>
                        </span>
                    </div>

                    <ul class="picItem clearfix">
                        <?php for( $index = 0; $index < 2; ++$index) { ?>
                        <?php $house = array_pop($houses); ?>
                            <li class="<?php echo ( 1 == $index ) ? 'last': ''; ?>">
                                <div class="picbox">
                                    <a id="world_B06_02" href="<?php echo $_cfg_siteRoot;?>house_list.php?id=<?php echo $house['id'];?>" target="_blank">
                                        <img src="<?php echo get_single_img_url($house['image_urls']);?>" alt="<?php echo $house['name'];?>" />
                                    </a>
                                    <div class="floatDiv">
                                        <div class="bg">
                                            <h4><?php echo $house['coname'];?></h4> 
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="<?php echo get_house_by_id($house['id']);?>" target="_blank"><?php echo $house['name'];?></a></h3>
                                <p>总价：<span class="redC"><?php echo get_price_desc($house['level']);?></span></p>
                            </li>
                        <?php } ?>
                    </ul>

                    <ul class="newsItem" id="world_B06_04">
                        <?php foreach( $houses as $house ) { ?>
                            <li>
                                <a href="<?php echo get_house_list_by_country($house['coid']);?>" target="_blank">[<?php echo $house['coname'];?>]</a>
                                <a href="<?php echo get_house_by_id($house['id']);?>" target="_blank">[<?php echo $house['name'];?>]</a>
                            </li>
                        <?php } ?>
                    </ul>

                </li>
            <?php } ?>

        </ul>
    </div>
    <!--第二栏 end-->

<!--第三栏 begin-->

<div class="worldbox">
    <div class="worldright2">
        <!-- 环球置业指南st-->
	    <div class="grid6_zj">
            <div id="rentGuide_3" class="wrap_b DTL" tid="HAIWAI_HomeIndex_PurseVane">
                <div class="title_g">海外购房指南<a href="<?php echo $_cfg_siteRoot. 'article_list.php?type=1';?>" target="_blank" class="more">更多&gt;&gt;</a>
                </div>
                <div class="con">
                    <ul class="newsItem_0" id="world_B06_28">
                        <?php
                        foreach( $article_data[1] as $article ) {
                            $url = $_cfg_siteRoot. 'article.php?id='. $article['article_id'];
                            echo    '<li><a href="'. $url. '" target="_blank">['. $article['cate_name']. ']</a>'.
                                    '<a href="'. $url. '" target="_blank">'. $article['title']. '</a></li>';
                        }
                        ?>
                    </ul>
                </div>	
            </div>
        </div>
 <!-- 环球置业指南end-->
    </div>

	<div class="worldleft4">
  <!--环球租房贴士st-->
        <div class="grid6_x">
            <div id="rentGuide_2" class="wrap_b DTL" tid="HAIWAI_HomeIndex_PurseVane">
                <div class="title_g">海外租房贴士<a href="<?php echo $_cfg_siteRoot. 'article_list.php?type=2';?>" target="_blank" class="more">更多&gt;&gt;</a>
                </div>
                <div class="con">
                    <ul class="newsItem_0" id="world_B06_28">
                        <?php
                        foreach( $article_data[2] as $article ) {
                            $url = $_cfg_siteRoot. 'article.php?id='. $article['article_id'];
                            echo    '<li><a href="'. $url. '" target="_blank">['. $article['cate_name']. ']</a>'.
                                    '<a href="'. $url. '" target="_blank">'. $article['title']. '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
  <!--环球租房贴士end-->
  
	  <!--一周热点楼盘排行榜st-->
        <div class="grid6_1">
            <div id="rentGuide_2" class="wrap_b DTL" tid="HAIWAI_HomeIndex_PurseVane">
                <div class="title_g">一周热点楼盘排行榜 <span class="STYLE4">Top10</span>  <a class="more" >浏览人数</a>
                </div>
                <div class="con"> 
                    <ul class="zyItem clearfix">
                        <div class="dPiclist">
                            <ul class="newsItem" id="world_B06_14">
                                <?php
                                foreach( $hot_house_data as $house ) {
                                    $hourl = $_cfg_siteRoot. 'house.php?id='. $house['id'];
                                    $ciurl = $_cfg_siteRoot. 'house.php?ciid='. $house['ciid'];
                                    $courl = $_cfg_siteRoot. 'house.php?coid='. $house['coid'];
                                    echo    '<li><a href="'. $courl. '" target="_blank">['. $house['coname']. '</a>/'.
                                            '<a href="'. $ciurl. '" target="_blank">'. $house['ciname']. ']</a>'.
                                            '<a href="'. $hourl. '" target="_blank">'. $house['name']. '</a>'.
                                            '<span class="STYLE5">'. $house['vc']. '</span></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
  <!--一周热点楼盘排行榜ed-->

    </div>
    <div class="clear"> </div>
</div>

<?php include('./tpl/uiparts/footer.php'); ?>

</body>
</html>

<?php include('./tpl/uiparts/header.php'); ?>
    <link lack="lack" href="./css/detailcss.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="./css/origion_css_top_house.css">
    <script lack="lack" type="text/javascript" src="./js/js_new.js"></script>
</head>
<body>
    <div id="SFmenu" style="position: absolute; z-index: 100;">
    </div>
    <!-- 搜索 -->
    <?php include('./tpl/uiparts/new_search.php'); ?>



    <!--导航 begin-->
    <?php include('./tpl/uiparts/navi_header.php'); ?>
    <!--导航 end-->

<!--面包屑 begin-->
<div class="oscrumb">
	<div class="s1">您的位置：<a href="#" target="_blank">首页</a> &gt;<a href="#" target="_blank">海外购房</a> &gt; <a href="#">北美置业</a>  &gt; <a href="#">美国</a> &gt; <a href="#">底特律独立别墅</a></div>
	<div class="s2"></div>
	<div class="clear"></div>
</div>
<!--面包屑end-->

<!--楼盘名及导航区域 begin-->
<div class="ostitlebanner">
	<div class="ostitlebanner01">
		<div class="s1"><?php echo $house_data['name'];?></div>
		<div class="s2">在售</div>
		<div class="s3"></div>
		<div class="s4">更新于： <?php echo $house_data['update_time'];?> </div>
		<div class="clear"></div>
	</div>
	<div class="ossubmenu">
		<div class="s1"><a href="#">基本信息</a></div>
		<div class="s3">访问人数：<span><?php echo $house_data['view_count'];?></span></div>
		<div class="clear"></div>
	</div>
</div>
<!--楼盘及导航区域 end-->
    <!--主体内容 begin-->
    <div class="osmainbox">
        <!--首屏 begin-->
        <div class="osmain">
            <!--主体内容_左侧 begin-->
            <div class="osmainboxl">
                <!--基本信息 begin-->
                <div class="osleft">
				
                    <div class="osleftjb">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tbody><tr>
                                <td width="79" valign="top"> <strong>物业类别</strong>：</td>
                                <td width="251"><?php echo get_house_type_desc($house_data['type']);?></td>
                            </tr>
                            <tr>
                                <td valign="top"> <strong>国家/城市</strong>：</td>
                                <td> <?php echo $house_data['coname']. '/'. $house_data['ciname']; ?></td>
                            </tr>
                            <tr>
                              <td valign="top"><strong>户</strong><strong>型面积</strong>： </td>
                              <td><?php echo $house_data['layout_area']; ?></td>
                            </tr>
                            <tr>
                                <td valign="top"> <strong>售</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>价</strong>：</td>
                                <td> <span class="zit01"><?php echo $house_data['price_desc'];?></span></td>
                            </tr>
                            <tr>
                                <td valign="top"> <strong>项目位置：</strong></td>
                                <td><?php echo $house_data['position'];?></td>
                            </tr>
                            <tr>
                                <td valign="top"> <strong>装修状况：</strong></td>
                                <td><?php echo $house_data['decoration_state'];?></td>
                            </tr>
                            <tr>
                                <td valign="top"> <strong>产权说明：</strong></td>
                                <td><?php echo $house_data['property'];?> </td>
                            </tr>
                            <tr>
                                <td valign="top"><strong>项目简介：</strong></td>
                                <td><?php echo $house_data['project_intro_brief'];?> </td>
                            </tr>
                          
                        </tbody>
                        </table>
                        
                        <div class="salestel">
                            <?php echo $house_data['phone_num'];?>
                        </div>
                    </div>
                  
<div class="jiaodian"> 
 	
    <?php
    for( $index = 0; $index < 4; ++$index ) {
        $class  = (0 == $index) ? 'jiaodian01' : 'jiaodian01 noneBox';
        $id     = 'li0'. $index;
        $img    = $house_data['images'][$index];
        $alt    = $house_data['name'];
        echo '<div class="'. $class. '" id="'. $id. '" ><img src="'. $img. '" alt="'. $alt. '" width="360" height="240" ></div>';
    }
    for( $index = 0; $index < 4; ++$index ) {
        $class  = (0 == $index) ? '' : 'noneBox';
        $id     = 'h0'. $index;
        $alt    = $house_data['name'];
        echo '<h2 id="'. $id. '" class="'. $class. '" >'. $alt. '</h2>';
    }
    echo '<div class="jiaodian02">';
    for( $index = 0; $index < 4; ++$index ) {
        $class  = (0 == $index) ? 'td1' : 'td';
        $id     = 'f0'. $index;
        $alt    = $house_data['name'];
        $img    = $house_data['images'][$index];
        echo    '<div class="'. $class. '" onmouseover="show_menu('. $index. ')" id="'. $id.
                '"><img src="'. $img. '" alt="'. $alt. '" width="80" height="60"></div>';
    }
    echo '</div>';
    ?>
				
</div>
                    <div class="clear">
                    </div>
                </div>
                <!--基本信息 end-->
                <!--详细信息 begin-->
                <div class="osleft mart8">
                    <div class="osjiestitle">
                        <div class="s3">
                        </div>
                        <div class="s2" id="a010">
                            项目介绍</div>
                        <div class="s3">
                        </div>
                        
                    </div>
                    <div class="osjiesnr" id="ai010">
                        <?php echo $house_data['project_intro'];?>
                    </div>
                   
                    
                </div>
                <!--详细信息 end-->
               
               
            </div>
            <!--主体内容_左侧 end-->
            <!--主体内容_右侧 begin-->
            <div class="osmainboxr">
               
               
        
                <!--海外最新楼盘 begin-->
                <div class="osr240">
                    <div class="osr240title"><a href="#" target="_blank"><strong>热门关注排行</strong></a></div>
                    <div class="formdata">
                        <dl>
                            <dt><span class="wid168"><strong>热门楼盘</strong></span> <span class="wid60a"><strong>国家\城市</strong></span> </dt>
                            <?php
                            foreach( $hot_house_data as $house ) {
                                $url    = $_cfg_siteRoot. 'house.php?id='. $house['id'];
                            ?>
                                <dd>
                                    <span class="wid168"><a href="<?php echo $url; ?>"><?php echo $house['name'];?></a></span>
                                    <span class="wid60a"><?php echo $house['coname'];?></span>
                                </dd>
                            <?php
                            }
                            ?>
                            
                        </dl>
                    </div>
                </div>
                <!--海外最新楼盘 end-->
                <?php
                foreach( $ad_data[5] as $ad ) {
                    echo '<div class="osr240ad">';
                    echo '<a href="'. $ad['link_url']. '" target="_blank"><img src="'. $ad['image_url']. '" width="240"></a>';
                    echo '</div>';
                }
                ?>
            </div>
            <!--主体内容_右侧 end-->
			
            <div class="clear"> </div>
        </div>
        <!--首屏 end-->
    </div>
    <!--主体内容 end-->
	
<?php include('./tpl/uiparts/footer.php'); ?>
    <script type="text/javascript">
        jq(function() {
            if (jq("#tnad2").html() != "")
                jq("#atnad2").html(jq("#tnad2").html());
            if (jq("#dbtl1").html() != "")
                jq("#adbtl1").html(jq("#dbtl1").html());
            if (jq("#tnad2").html() != "")
                jq("#atnad2").html(jq("#tnad2").html());
            if (jq("#dqz3").html() != "")
                jq("#adqz3").html(jq("#dqz3").html());
            if (jq("#dqz4").html() != "")
                jq("#adqz4").html(jq("#dqz4").html());
            if (jq("#dqz5").html() != "")
                jq("#adqz5").html(jq("#dqz5").html());
            if (jq("#dqz6").html() != "")
                jq("#adqz6").html(jq("#dqz6").html());
            if (jq("#dqz7").html() != "")
                jq("#adqz7").html(jq("#dqz7").html());
            if (jq("#dqz8").html() != "")
                jq("#adqz8").html(jq("#dqz8").html());
            if (jq("#dqz9").html() != "")
                jq("#adqz9").html(jq("#dqz9").html());
            if (jq("#dqz10").html() != "")
                jq("#adqz10").html(jq("#dqz10").html());
        });
    </script>
</body>
</html>
	

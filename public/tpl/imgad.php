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
    <div class="clearfix news_con">
        <img src="<?php echo $_cfg_img_baseurl.$ad_data['img_url'];?>" width="960" />
    </div>
</div>

<!--版尾begin-->
<?php include('./tpl/uiparts/footer.php'); ?>
<!-- 版尾 end-->
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
    <title>平安好房-海外频道-管理后台</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <script src="./js/jquery-1.8.1.min.js" type="text/javascript"></script>
    <script src="./js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

<div class="container">
    <div id="head" class="header">
    <h1>平安好房-海外频道-管理后台</h1>
    <p>你好, <?php echo $_SESSION['name'];?>。您是 <?php echo empty($_SESSION['admin']) ? '管理员' : '超级管理员'; ?>。</p>
    <p><a href="<?php echo $_cfg_siteRootAdmin;?>/action/logout.php">退出登录</a></p>
    <hr />

        <div id="navi-side-left">
        <ul class="nav nav-pills">
            <?php
            $navi_data = array(
                                'house' => '管理房产',
                                'article' => '管理文章',
                                'adver' => '管理广告',
                                'cate' => '管理文章分类',
                                'city' => '管理城市列表',
                                'country' => '管理国家列表',
                                'imgad' => '管理站内图片广告',
                         );
            foreach ( $navi_data as $ename => $zname ) {
                $active = (!empty($_GET['content']) && $_GET['content'] == $ename) ? 'active' : '';
                echo '<li class="'. $active. '" ><a href="index.php?content='. $ename. '">'. $zname. '</a></li>';
            }
            ?>
        </ul>
        </div>
    </div>
    <hr />

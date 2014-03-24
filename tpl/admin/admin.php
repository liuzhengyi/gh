<html>
<head>
    <title>平安好房-海外频道-管理后台</title>
</head>
<body>

<div id="head">
<h1>平安好房-海外频道-管理后台</h1>
</div>

<div id="navi-side-left">
<h2>管理条目导航</h2>
<ul>
    <li><a href="?content=house">管理房产</a></li>
    <li><a href="?content=article">管理文章</a></li>
    <li><a href="?content=adver">管理广告</a></li>
</ul>
</div>
<style>
DIV#main-container th#ad-image {
width: 80px;
}

TABLE#ad-manage {
    border: 1px solid black;
}

TD#ad-image {
    width: 50%;
}
</style>

<div id="main-container">
<h2>广告管理</h2>
<table id="ad-manage" border="1" >
    <thead>
        <tr>
            <th id="">ID</th>
            <th id="">TITLE</th>
            <th id="">IMAGE</th>
            <th id="">TYPE</th>
            <th id="">WIDTH</th>
            <th id="">HEIGHT</th>
            <th id="">LINK TO</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ( $ad_data as $ad ) {
            $img_url = $ad['image_url'];
            echo '<tr>';
            echo '<td>'. $ad['ad_id']. '</td>';
            echo '<td>'. $ad['ad_title']. '</td>';
            echo '<td id="ad-image"><a href="'. $img_url. '" target="_blank"><img src="'. $img_url. '" width="200" /></td>';
            echo '<td>'. $ad['ad_type']. '</td>';
            echo '<td>'. $ad['width']. 'px</td>';
            echo '<td>'. $ad['height']. 'px</td>';
            echo '<td>'. $ad['link_url']. '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>

<div id="navi-footer">
</div>
    
</body>
</html>

DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (                             -- 广告表
	ad_id INT UNSIGNED AUTO_INCREMENT NOT NULL, -- 广告ID
    user_id INT NOT NULL,               -- 操作者
	ad_title VARCHAR(300) NOT NULL,             -- 广告名称
	image_url VARCHAR(200) NOT NULL,            -- 图片URL
	ad_type TINYINT NOT NULL,                   -- 广告位置 1: 首页顶部三个条幅 2: 首页上部轮播 3. 轮播右侧小方块 4. 轮播下面条幅
    width INT UNSIGNED NOT NULL,                -- 广告位宽
    height INT UNSIGNED NOT NULL,               -- 广告位高
    link_url VARCHAR(300) NOT NULL,             -- 链接URL
    `desc` VARCHAR(900) ,                       -- 描述
    remark VARCHAR(900) ,                       -- 链接URL
	status TINYINT NOT NULL DEFAULT 0,          -- 状态 0 OK ..
	create_time DATETIME ,              -- 记录创建时间
	update_time DATETIME ,              -- 记录更新时间
	PRIMARY KEY(ad_id),
	INDEX(ad_id),
	INDEX(ad_title),
	INDEX(ad_type)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


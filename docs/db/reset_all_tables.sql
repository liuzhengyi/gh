DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (                             -- 广告表
	ad_id INT UNSIGNED AUTO_INCREMENT NOT NULL, -- 广告ID
	ad_title VARCHAR(300) NOT NULL,             -- 广告名称
	image_url VARCHAR(200) NOT NULL,            -- 图片URL
	ad_type TINYINT NOT NULL,                   -- 广告位置 1: 首页顶部三个条幅 2: 首页上部轮播 3. 轮播右侧小方块 4. 轮播下面条幅
    width INT UNSIGNED NOT NULL,                -- 广告位宽
    height INT UNSIGNED NOT NULL,               -- 广告位高
    link_url VARCHAR(300) NOT NULL,             -- 链接URL
	status TINYINT NOT NULL DEFAULT 0,          -- 状态 0 OK ..
	create_time DATETIME NOT NULL,              -- 记录创建时间
	update_time DATETIME NOT NULL,              -- 记录更新时间
	PRIMARY KEY(ad_id),
	INDEX(ad_id),
	INDEX(ad_title),
	INDEX(ad_type)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (                                -- 文章表
	article_id INT UNSIGNED AUTO_INCREMENT NOT NULL,    -- 文章ID
	user_id INT UNSIGNED NOT NULL,                      -- 操作者ID
    cate_id TINYINT NOT NULL,                           -- 文章分类ID
    type TINYINT NOT NULL,                              -- 1 售 2 租
	title VARCHAR(120) NOT NULL,                        -- 标题
	subtitle VARCHAR(120) NOT NULL,                     -- 副标题
	abstract VARCHAR(900) NOT NULL,                     -- 内容
	content TEXT NOT NULL,                              -- 内容
    view_count INT UNSIGNED DEFAULT 0,                  -- 浏览次数
	remark VARCHAR(300) NOT NULL,                       -- 备注
	status TINYINT NOT NULL DEFAULT 0,                  -- 状态
	create_time DATETIME NOT NULL,                      -- 创建时间
	update_time DATETIME NOT NULL,                      -- 更新时间
	PRIMARY KEY(article_id),
	INDEX(cate_id),
	INDEX(type),
	INDEX(title)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `article_cate`;
CREATE TABLE `article_cate` (                       -- 文章分类表
	cate_id INT UNSIGNED AUTO_INCREMENT NOT NULL,   -- 分类ID
	cate_name VARCHAR(300) NOT NULL,                -- 分类名称
	status TINYINT NOT NULL DEFAULT 0,              -- 状态 0 OK ..
    remark VARCHAR(500),                            -- 备注
	create_time DATETIME NOT NULL,                  -- 记录创建时间
	update_time DATETIME NOT NULL,                  -- 记录更新时间
	PRIMARY KEY(cate_id),
	INDEX(cate_id),
	INDEX(cate_name)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
	city_id INT UNSIGNED AUTO_INCREMENT NOT NULL,   -- 城市ID
	user_id INT UNSIGNED NOT NULL,                  -- 操作者ID
	country_id INT UNSIGNED NOT NULL,               -- 所属国家ID
    name VARCHAR(300) NOT NULL,                     -- 城市名字
	create_time DATETIME NOT NULL,                  -- 创建时间
	update_time DATETIME NOT NULL,                  -- 更新时间
    remark VARCHAR(500) NOT NULL,                   -- 备注
	PRIMARY KEY(city_id),
	INDEX(country_id),
	INDEX(name)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
	country_id INT UNSIGNED AUTO_INCREMENT NOT NULL,    -- 国家ID
	user_id INT UNSIGNED NOT NULL,                      -- 操作者ID
	name varchar(300) NOT NULL,                         -- 国家名字
    region tinyint unsigned not null,                   -- 所属区域 1 欧洲 2 北美 3 亚太
	create_time DATETIME NOT NULL,                      -- 记录创建时间
	update_time DATETIME NOT NULL,                      -- 记录更新时间
    remark VARCHAR(500) NOT NULL,                       -- 备注
	PRIMARY KEY(country_id),
	INDEX(name)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `house`;
CREATE TABLE `house` (                              -- 房产表
	house_id INT UNSIGNED AUTO_INCREMENT NOT NULL,  -- 房产ID
	city_id INT UNSIGNED NOT NULL,                  -- 所属城市ID
	name VARCHAR(300) NOT NULL,                     -- 房产名称
	type TINYINT NOT NULL,	                        -- 物业类型(1 公寓, 2 别墅)
	layout_area VARCHAR(300) NOT NULL,              -- 户型面积
	price_desc VARCHAR(300) NOT NULL,               -- 价格描述 如"18万美元"
	price_level TINYINT UNSIGNED NOT NULL,          -- 人民币价位级别 1 一百万以内 2 一到两百万之间 3 两到三百万之间 依次类推
	position VARCHAR(300) NOT NULL,                 -- 地理位置描述
	decoration_state VARCHAR(120) NOT NULL,         -- 装修情况
	property VARCHAR(120) NOT NULL,                 -- 产权情况
	project_intro_brief VARCHAR(300) NOT NULL,      -- 项目简介
	project_intro VARCHAR(3000) NOT NULL,           -- 项目介绍 
	phone_num VARCHAR(20) NOT NULL,                 -- 联系电话
	image_urls VARCHAR(1000) NOT NULL,              -- 图片地址
    is_on_sale TINYINT NOT NULL,                    -- 是否出售
    is_rental TINYINT NOT NULL,                     -- 是否出租
    view_count INT UNSIGNED NOT NULL DEFAULT 0,     -- 浏览次数
	status TINYINT NOT NULL DEFAULT 0,              -- 状态 0 OK ..
	create_time DATETIME NOT NULL,                  -- 记录创建时间
	update_time DATETIME NOT NULL,                  -- 记录更新时间
	PRIMARY KEY(house_id),
	INDEX(house_id),
	INDEX(city_id),
	INDEX(name),
	INDEX(type),
	INDEX(price_level)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- table link
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (                               -- 友链表
	link_id INT UNSIGNED AUTO_INCREMENT NOT NULL,   -- 友链ID
	title VARCHAR(600) NOT NULL,                    -- 友链名称
	image_url VARCHAR(200) NOT NULL,                -- 图片URL
    display_order INT NOT NULL,                     -- 显示顺序
    type TINYINT NOT NULL DEFAULT 1,                -- 类型 默认为1,普通 扩展用
    url VARCHAR(300) NOT NULL,                      -- 链接URL
	status TINYINT NOT NULL DEFAULT 0,              -- 状态 0 OK ..
	create_time DATETIME NOT NULL,                  -- 记录创建时间
	update_time DATETIME NOT NULL,                  -- 记录更新时间
	PRIMARY KEY(link_id),
	INDEX(type),
	INDEX(status)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



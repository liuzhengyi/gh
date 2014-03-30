DROP TABLE IF EXISTS `house`;
CREATE TABLE `house` (                              -- 房产表
	house_id INT UNSIGNED AUTO_INCREMENT NOT NULL,  -- 房产ID
	city_id INT UNSIGNED NOT NULL,                  -- 所属城市ID
	user_id INT NOT NULL,                           -- 所属城市ID
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
	remark VARCHAR(600) ,                           -- 备注
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

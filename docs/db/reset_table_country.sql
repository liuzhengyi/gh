DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
	country_id INT UNSIGNED AUTO_INCREMENT NOT NULL,    -- 国家ID
	user_id INT UNSIGNED NOT NULL,                      -- 操作者ID
	name varchar(300) NOT NULL,                         -- 国家名字
    region tinyint unsigned not null,                   -- 所属区域 1 欧洲 2 北美 3 亚太
    remark VARCHAR(500) NOT NULL,                       -- 备注
    status TINYINT NOT NULL,                            -- 状态
	create_time DATETIME NOT NULL,                      -- 记录创建时间
	update_time DATETIME NOT NULL,                      -- 记录更新时间
	PRIMARY KEY(country_id),
	INDEX(name)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


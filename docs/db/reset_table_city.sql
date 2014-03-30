DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
	city_id INT UNSIGNED AUTO_INCREMENT NOT NULL,   -- 城市ID
	user_id INT UNSIGNED NOT NULL,                  -- 操作者ID
	country_id INT UNSIGNED NOT NULL,               -- 所属国家ID
    name VARCHAR(300) NOT NULL,                     -- 城市名字
    remark VARCHAR(500) NOT NULL,                   -- 备注
    status TINYINT NOT NULL,                        -- 状态
	create_time DATETIME NOT NULL,                  -- 创建时间
	update_time DATETIME NOT NULL,                  -- 更新时间
	PRIMARY KEY(city_id),
	INDEX(country_id),
	INDEX(name)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

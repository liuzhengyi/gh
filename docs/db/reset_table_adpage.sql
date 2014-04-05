DROP TABLE IF EXISTS `imgad`;
CREATE TABLE `imgad` (                              -- 图片广告
	imgad_id INT UNSIGNED AUTO_INCREMENT NOT NULL,  -- 图片广告ID
    user_id INT NOT NULL,                           -- 操作者
	imgad_title VARCHAR(300) NOT NULL,              -- 图片广告名称
	img_url VARCHAR(200) NOT NULL,                -- 图片URL
    `desc` VARCHAR(900) ,                           -- 描述
    remark VARCHAR(900) ,                           -- 备注
	status TINYINT NOT NULL DEFAULT 0,              -- 状态 0 OK ..
	create_time DATETIME ,                          -- 记录创建时间
	update_time DATETIME ,                          -- 记录更新时间
	PRIMARY KEY(imgad_id),
	INDEX(imgad_id),
	INDEX(imgad_title)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


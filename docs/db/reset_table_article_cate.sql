DROP TABLE IF EXISTS `article_cate`;
CREATE TABLE `article_cate` (                       -- 文章分类表
	cate_id INT UNSIGNED AUTO_INCREMENT NOT NULL,   -- 分类ID
    user_id INT UNSIGNED NOT NULL,                  -- 操作者ID
	cate_name VARCHAR(300) NOT NULL,                -- 分类名称
	status TINYINT NOT NULL DEFAULT 0,              -- 状态 0 OK ..
    remark VARCHAR(500),                            -- 备注
	create_time DATETIME NOT NULL,                  -- 记录创建时间
	update_time DATETIME NOT NULL,                  -- 记录更新时间
	PRIMARY KEY(cate_id),
	INDEX(cate_id),
	INDEX(cate_name)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



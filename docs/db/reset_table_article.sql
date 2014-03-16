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

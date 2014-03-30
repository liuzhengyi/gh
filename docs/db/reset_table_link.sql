

-- table link
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (                               -- 友链表
	link_id INT UNSIGNED AUTO_INCREMENT NOT NULL,   -- 友链ID
    user_id INT NOT NULL,                           -- 操作者ID
	title VARCHAR(600) NOT NULL,                    -- 友链名称
	image_url VARCHAR(200) NOT NULL,                -- 图片URL
    display_order INT NOT NULL,                     -- 显示顺序
    type TINYINT NOT NULL DEFAULT 1,                -- 类型 默认为1,普通 扩展用
    url VARCHAR(300) NOT NULL,                      -- 链接URL
	status TINYINT NOT NULL DEFAULT 0,              -- 状态 0 OK ..
    remark VARCHAR(600),                            -- 备注
	create_time DATETIME NOT NULL,                  -- 记录创建时间
	update_time DATETIME NOT NULL,                  -- 记录更新时间
	PRIMARY KEY(link_id),
	INDEX(type),
	INDEX(status)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



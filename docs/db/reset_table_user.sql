DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (                               -- 用户表
	user_id INT UNSIGNED AUTO_INCREMENT NOT NULL,   -- 用户ID
    user_name VARCHAR(100),                             -- 登录邮箱
    password VARCHAR(100),                          -- 登录密码 sha1加密
    is_admin TINYINT,                               -- 管理员
    status TINYINT,                                 -- 状态
    remark VARCHAR(600),                            -- 备注
    create_time DATETIME NOT NULL,
    last_login DATETIME NOT NULL,
    last_ip VARCHAR(20),
	PRIMARY KEY(user_id),
	INDEX(user_name, password)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

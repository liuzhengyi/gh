DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (                               -- 用户表
	user_id INT UNSIGNED AUTO_INCREMENT NOT NULL,   -- 用户ID
    email VARCHAR(100),                             -- 登录邮箱
    password VARCHAR(100),                          -- 登录密码 sha1加密
    is_admin TINYINT,                               -- 管理员
    create_time datetime not null,
    last_login datetime not null,
    last_ip varchar(20),
	PRIMARY KEY(user_id),
	INDEX(email)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

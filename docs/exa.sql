DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
        user_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
        email VARCHAR(50) ,
        nick_name VARCHAR(55) NOT NULL, -- 新浪不超过规定十五的汉字或30个字符，一个汉字算两个字符
        pass CHAR(40) ,
    role TINYINT UNSIGNED NOT NULL DEFAULT 1,  -- 使用数字映射用户角色
    -- 已有映射如下：
    -- 1-做任务赚钱的普通用户(user)，2-广告主(ader)，3-管理员(master) ...
    status TINYINT UNSIGNED NOT NULL DEFAULT 1,
    -- 同上，已知对应关系如下：
    -- 1-正常，未认证(normal)，2=已认证(verified)，
    -- 11-审核中(examine)，12-封禁(forbid)
    -- 默认为1
    bind_status SMALLINT UNSIGNED DEFAULT 0,  /* 新增 */
    -- 用位图方式描述用户的绑定状态，small int 占 16位，可以表示16个绑定状态
    -- 新浪微博+1，腾讯微博+2，支付宝+3，(酷六+7，……)
        level TINYINT default 1,  /* 此level由微动力评定，user和ader使用不同的评定标准 */
        pro TINYINT UNSIGNED DEFAULT 0, /* 好评，*/
        con TINYINT UNSIGNED DEFAULT 0, /* 差评 */
        task_taken INT UNSIGNED DEFAULT 0,  /* user-承接任务数|ader-发布任务数 */
        task_finished INT UNSIGNED DEFAULT 0,   /* user-完成任务数|ader-发布的任务被完结数 */
    /* 注意：金钱在数据库内部以 厘 为单位存储 */
        -- --total_income INT UNSIGNED DEFAULT 0,    /* user-总入账金额|ader-总投入|其他留空*/
    total_money INT UNSIGNED DEFAULT 0,    /* user-总入账金额|ader-总投入|其他留空*/
        -- --realtime_income INT UNSIGNED DEFAULT 0, /* user-当前账户金额|ader-当前账户金额|其他留空 */
    realtime_money INT UNSIGNED DEFAULT 0, /* user-当前账户金额|ader-当前账户金额|其他留空 */
    cell_phone CHAR(11) DEFAULT NULL,    /* 可用于实名认证。ader注册必填? */
        reg_time DATETIME NOT NULL,
        PRIMARY KEY(user_id),
        UNIQUE (email),
        UNIQUE (nick_name),
        INDEX (email(25))
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/* DESCRIBE `user`; */

DROP TABLE IF EXISTS `user_info_sina`;
CREATE TABLE `user_info_sina` (     -- 用户绑定新浪微博或使用新浪微博注册时将信息写入此表
    info_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    user_id INT UNSIGNED NOT NULL,  -- 用户微动力id
    sina_uid BIGINT UNSIGNED,       -- 用户新浪uid
    sina_token VARCHAR(50),
    token_update_at DATETIME,       -- 此两项是给使用api的爬虫使用的，可以提前判断用户的token是否还有效
        -- --token_expire_in INT UNSIGNED,
    token_expires_in INT UNSIGNED,
    sina_level TINYINT DEFAULT 3,   -- 新浪微博等级， 微动力评定，评分公式孕育中
    sina_screen_name VARCHAR(60),   -- 用户新浪屏显名称
        -- ADD sina_profile_image_url varchar(80),    -- 用户新浪小头像地址
        -- ADD sina_avatar_url varchar(80),    -- 用户新浪大头像地址
    sina_location VARCHAR(30),      -- 用户新浪location
    sina_description VARCHAR(220),  -- 用户新浪description
    bind_time DATETIME NOT NULL,    -- 用户绑定新浪微博的时间
    PRIMARY KEY(info_id),
    UNIQUE (user_id),
    UNIQUE (sina_uid),
    INDEX (sina_uid),
    INDEX (sina_screen_name)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*DESCRIBE `user_info_sina`; */

DROP TABLE IF EXISTS `user_info_ali`;
CREATE TABLE `user_info_ali` (
    info_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    ali_uid BIGINT UNSIGNED,
    ali_name VARCHAR(50),
    ali_token VARCHAR(50),
    PRIMARY KEY(info_id),
    UNIQUE (user_id),
    UNIQUE (ali_uid),
    INDEX (ali_name)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*DESCRIBE `user_info_ali`; */

DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
        task_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        owner_id INT UNSIGNED NOT NULL, /* ader_id */
        publisher_id INT UNSIGNED NOT NULL DEFAULT 1,
        -- -- task_type TINYINT UNSIGNED, -- 用数字映射任务类型，相当于预留了二百多个任务类型
    `type` TINYINT UNSIGNED, -- 用数字映射任务类型，相当于预留了二百多个任务类型
    -- 目前已有的对应关系：
        -- 1-新浪转发-sina_repost，2-新浪关注-sina_follow，3-新浪评论-sina_review，4-新浪原创-sina_create
        -- 11-腾讯转发-qq_repost，12-腾讯关注-qq_follow，13-腾讯评论-qq_review，4-腾讯原创-qq_create
            -- -- task_offer INT UNSIGNED DEFAULT 500,
        base_price INT UNSIGNED DEFAULT 500,
        /* 原始佣金 以 厘 为单位 默认为500厘 并非用户的真正佣金 */
            -- -- task_amount INT UNSIGNED NOT NULL,
        amount INT UNSIGNED NOT NULL,
        -- -- task_finish_amount INT UNSIGNED NOT NULL DEFAULT 0,
        finish_amount INT UNSIGNED NOT NULL DEFAULT 0,
        -- -- task_status TINYINT UNSIGNED DEFAULT 1, -- 同type，用数字取代之前的enum类型，留下更多可扩展空间
    status TINYINT UNSIGNED DEFAULT 1, -- 同type，用数字取代之前的enum类型，留下更多可扩展空间
    -- 目前已有的对应关系：
    -- 1-正常进行中，2-正常结束，
    -- 11-非正常关闭，12-审核中
    -- 默认1-正常
    create_at timestamp not null,
    expire_in bigint unsigned not null default 864000,
        PRIMARY KEY (task_id),
        INDEX (type)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
-- DESCRIBE `task`;

DROP TABLE IF EXISTS `task_info_sina_repost`;
CREATE TABLE `task_info_sina_repost` (
    info_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    task_id INT UNSIGNED NOT NULL,
    sina_uid BIGINT UNSIGNED NOT NULL, -- 任务中微博的主人的新浪UID
    sina_wid BIGINT UNSIGNED,      -- 任务微博的微博id
    text VARCHAR(420),             -- 任务微博内容
    screen_name VARCHAR(60),           -- 任务中微博的主人的新浪屏显名称
    location VARCHAR(25),              -- 任务中微博的主人的所在地
    user_description VARCHAR(220) DEFAULT NULL,    --  用户一句话介绍，新浪规定70字以内
    profile_image_url VARCHAR(80) DEFAULT NULL,    -- 微博主人小头像
    thumbnail_pic_url VARCHAR(80), -- 微博配图 微缩图
    bmiddle_pic_url VARCHAR(80),   -- 微博配图 中等大小
    original_pic_url VARCHAR(80),  -- 微博配图 原始图片地址
    PRIMARY KEY(info_id),
    UNIQUE (task_id),
    INDEX (sina_uid),
    INDEX (screen_name)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
-- DESCRIBE `task_info_sina_repost`;

DROP TABLE IF EXISTS `task_info_sina_follow`;
CREATE TABLE `task_info_sina_follow` (
    info_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    task_id INT UNSIGNED NOT NULL,
    sina_uid BIGINT UNSIGNED NOT NULL, --  任务中的新浪UID
    screen_name VARCHAR(60),           --  任务中的新浪用户名
    friends_count INT UNSIGNED,        --  用户关注数
    followers_count INT UNSIGNED,      --  用户粉丝数
    weibo_count INT UNSIGNED,          --  用户微博数
        -- statuses_count INT UNSIGNED,          --  用户微博数
    profile_image_url VARCHAR(80) DEFAULT NULL,    -- 用户微博小头像url
    avatar_large_url varchar(80) DEFAULT NULL,     -- 用户大头像url
    location varchar(25) DEFAULT NULL,             -- 用户所在地
    user_description VARCHAR(220) DEFAULT NULL,    -- 用户一句话介绍，新浪规定70字以内
    PRIMARY KEY(info_id),
    UNIQUE (task_id),
    INDEX (screen_name),
    INDEX (sina_uid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
-- DESCRIBE `task_info_sina_follow`;

DROP TABLE IF EXISTS `do_task`;
CREATE TABLE `do_task` (
        do_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
        task_id INT UNSIGNED NOT NULL,
        user_id INT UNSIGNED NOT NULL,
    status TINYINT UNSIGNED NOT NULL,
    -- status 用数字代替enum值，已有对应关系如下：
    -- 1-未完成(正常进行中)
    -- 11-完成(一切正常)， 12-完成(有待审核)，13-完成(反悔) <- 此处有待商榷
    -- 21-屏蔽
    -- 31-失败
    task_type TINYINT UNSIGNED NOT NULL,    -- 同task表中的type字段
    -- 1-新浪转发-sina_repost，2-新浪关注-sina_follow，3-新浪评论-sina_review，4-新浪原创-sina_create
    -- 11-腾讯转发-qq_repost，12-腾讯关注-qq_follow，13-腾讯评论-qq_review，4-腾讯原创-qq_create
    owner_name varchar(60) NOT NULL,    -- 任务中的相关用户的屏显名称，这是个冗余字段
    income INT UNSIGNED NOT NULL,
    --  repost_mid 仅针对转发任务，为转发产生的微博的mid，十进制
    --  此字段是为爬虫验证转发任务准备的，放在这里并不合适，暂时如此
    --  倘若此种信息多于两条，则考虑增加一个表，如do_task_info_xxx
    repost_mid BIGINT UNSIGNED DEFAULT NULL,    
    time DATETIME NOT NULL,
        PRIMARY KEY(do_id),
        INDEX (task_id),
        INDEX (user_id)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
-- DESCRIBE `do_task`;


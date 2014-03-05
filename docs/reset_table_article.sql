drop table if exists `article`;
create table `article` (
	article_id int unsigned auto_increment not null,
	user_id int unsigned not null,
	country_id int unsigned not null,
	title varchar(120) not null,
	subtitle varchar(120) not null,
	content text not null,
	remark varchar(300) not null,
	status tinyint not null default 0,
	create_time datetime not null,
	update_time datetime not null
	primary key(article_id),
	index(country_id),
	index(title)
) engine=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

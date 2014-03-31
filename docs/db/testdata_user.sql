
-- testdata for table user
insert into user (user_name, password, is_admin, create_time, last_login) values ('test00', sha1('00test'), 1, now(), now());
insert into user (user_name, password, is_admin, create_time, last_login) values ('test01', sha1('01test'), 0, now(), now());
insert into user (user_name, password, is_admin, create_time, last_login) values ('test02', sha1('02test'), 0, now(), now());
insert into user (user_name, password, is_admin, create_time, last_login) values ('test03', sha1('03test'), 0, now(), now());
insert into user (user_name, password, is_admin, create_time, last_login) values ('test04', sha1('04test'), 0, now(), now());
insert into user (user_name, password, is_admin, create_time, last_login) values ('test05', sha1('05test'), 0, now(), now());

drop database if exists bbs;

create database bbs default character set utf8;

use bbs;

drop table if exists posts;

create table posts (
    id int(11) not null auto_increment,
    name varchar(255) default null,
    comment varchar(255) default null,
    created_at datetime default null,
    primary key (id)
) engine=InnoDB default charset=utf8;
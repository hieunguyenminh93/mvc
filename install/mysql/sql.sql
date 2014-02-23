create database hieu;
use hieu;
create table setting(
    setting_id int not null primary key,
    setting_path not null varchar(100),
    isuse int not null
);
insert into setting values(0,'/default',1);
create table header_link(
    link_id int not null primary key,
    href varchar(100) not null,
    rel varchar(20) not null,
    type varchar(20) not null,
    setting int not null references setting(setting_id)
);
insert into header_link values(0,'view/css/css.css','stylesheet','text/css',0);
insert into header_link values(1,'view/css/form.css','stylesheet','text/css',0);

create table header_script(
	script_id int not null primary key,
	src varchar(100) not null,
	type varchar(20) not null,
	setting int not null references setting(setting_id)
);

create table header_meta(
	meta_id int not null primary key,
	name varchar(30),
	content 
	
);

create table category(
	category_id int auto_increment not null primary key,
	category_name varchar(50) not null,
	category_description mediumtext,
	category_date_add datetime,
	category_status int
);
create table product(
	product_id int not null primary key AUTO_INCREMENT,
	product_name varchar(50) not null,
	product_price float not null,
	product_descript mediumtext,
	product_category int not null,
	product_date_add datetime,
	product_date_modified datetime,
	product_status int not null,
	constraint fk_pro_cate foreign key(product_category) references category(category_id)
)


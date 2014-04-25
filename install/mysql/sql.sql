create table setting(
    setting_id int not null primary key,
    setting_path varchar(100) not null,
    isuse int not null
)ENGINE=MyISAM COLLATE=utf8_general_ci;
create table header_link(
    link_id int not null primary key,
    href varchar(100) not null,
    rel varchar(20) not null,
    type varchar(20) not null,
    setting int not null references setting(setting_id)
)ENGINE=MyISAM COLLATE=utf8_general_ci;
create table header_script(
	script_id int not null primary key,
	src varchar(100) not null,
	type varchar(20) not null,
	setting int not null references setting(setting_id)
)ENGINE=MyISAM COLLATE=utf8_general_ci;
create table category(
	category_id int auto_increment not null primary key,
	category_name varchar(50) not null,
	category_description mediumtext,
	category_date_add datetime,
	category_status int
)ENGINE=MyISAM COLLATE=utf8_general_ci;
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
)ENGINE=MyISAM COLLATE=utf8_general_ci;
create table menu(
	menu_id int not null primary key AUTO_INCREMENT,
	menu_href varchar(200) not null,
	menu_name varchar(200) not null,
	menu_setting int references setting(setting_id)
)ENGINE=MyISAM COLLATE=utf8_general_ci;
-- create table customer_group(
--    group_id int not null primary key AUTO_INCREMENT,
--    
-- )ENGINE=MyISAM COLLATE=utf8_general_ci;
create table customer(
    customer_id int not null primary key AUTO_INCREMENT,
    customer_firstname varchar(30) not null,
    customer_lastname varchar(30) not null,
    customer_email varchar(100) not null,
    customer_brithday datetime,
    customer_password varchar(64) not null
)ENGINE=MyISAM COLLATE=utf8_general_ci;
create table information(
	information_id int not null primary key AUTO_INCREMENT,
	information_descript mediumtext not null,
	information_setting int references setting(setting_id)
)ENGINE=MyISAM COLLATE=utf8_general_ci;
create table users(
    user_id int not null primary key,
    username varchar(64) not null,
    passwd varchar(16) not null,
    firstname varchar(20) not null,
    lastname varchar(30) not null,
    email varchar(100) not null,
    address varchar(100) not null,
    birthday datetime not null,
    sex int not null default 0,
    validate int not null default 0
)ENGINE=MyISAM COLLATE=utf8_general_ci;
create table app_category(
    cat_id int not null primary key AUTO_INCREMENT,
    catname varchar(40) not null,
    description text,
    adddate datetime
)ENGINE=MyISAM COLLATE=utf8_general_ci;
create table app_require(
    sys_re_id int not null primary key AUTO_INCREMENT,
    os varchar(40) not null,
    disk_size decimal,
    ram decimal
)ENGINE=MyISAM collate=utf8_general_ci;
create table app(
    app_id int not null primary key AUTO_INCREMENT,
    appname varchar(40) not null,
    cat_id int  not null,
    descrition text not null,
    sys_require int not null,
    user_id int not null,
    vote int not null,
    view int not null,
    down int not null,
    fee decimal(18,0) not null,
    path varchar(100) not null,
    ads int not null,
    constraint fk_sys_app foreign key (sys_require) references app_require(sys_re_id),
    constraint fk_app_cat foreign key (cat_id) references app_category(cat_id),
    constraint fk_app_user foreign key (user_id) references username(id)
)ENGINE=MyISAM COLLATE=utf8_general_ci;
create table admin_header_link(
    link_id int not null primary key,
    href varchar(100) not null,
    rel varchar(20) not null,
    type varchar(20) not null,
    setting int not null references setting(setting_id)
)ENGINE=MyISAM COLLATE=utf8_general_ci;
create table admin_header_script(
	script_id int not null primary key,
	src varchar(100) not null,
	type varchar(20) not null,
	setting int not null references setting(setting_id)
)ENGINE=MyISAM COLLATE=utf8_general_ci;
insert into setting values(0,'/default',0);
insert into setting values(1,'/default',1);
insert into header_link values(0,'themes/default/css/css.css','stylesheet','text/css',0);
insert into header_link values(1,'themes/default/css/form.css','stylesheet','text/css',0);
insert into header_link values(2,'themes/default/css/layout.css','stylesheet','text/css',1);
insert into header_link values(3,'themes/default/css/jquery-ui-1.10.4.custom.css','stylesheet','text/css',1);
insert into header_link values(4,'themes/default/css/jquery-ui-1.10.4.custom.min.css','stylesheet','text/css',1);
insert into header_link values(5,'themes/shop/css/page.css','stylesheet','text/css',1);
insert into category(category_name,category_description,category_date_add,category_status) values('Test 1','Test 1',now(),1);
insert into category(category_name,category_description,category_date_add,category_status) values('Test 2','Test 2',now(),1);
insert into product(product_name,product_price,product_category,product_status) values('Product 1',10.0,1,1);
insert into product(product_name,product_price,product_category,product_status) values('Product 2',11.0,2,1);
insert into product(product_name,product_price,product_category,product_status) values('Product 1 2',10.0,1,1);
insert into menu(menu_id,menu_href,menu_name,menu_setting)values(1,'index.php','button_name_home',1);
insert into menu(menu_id,menu_href,menu_name,menu_setting)values(2,'index.php?route=about/about','button_name_about',1);
insert into menu(menu_id,menu_href,menu_name,menu_setting)values(3,'index.php?route=about/contact','button_name_contact',1);
insert into customer(customer_firstname,customer_lastname,customer_email,customer_brithday,customer_password) values('Nguyen',' Minh Hieu','hieunguyenminh.93@gmail.com','10/05/1993',password('G0013chamcom'));
insert into information(information_id,information_descript,information_setting) values(0,"Thong tin ve chung toi",1);
insert into admin_header_link values(0,'/default/css/css.css','stylesheet','text/css',0);
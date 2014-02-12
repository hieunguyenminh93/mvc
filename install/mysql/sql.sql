create database hieu;
use hieu;
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


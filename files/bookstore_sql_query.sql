use bookstore;



DROP TABLE IF EXISTS books;

CREATE TABLE IF NOT EXISTS books
(
 
isbn char(10),
 
author varchar(100) not null,
 
title varchar(128) not null,
 
price decimal(7,2) not null,
 
subject varchar(30) not null,
 
primary key (isbn)

);



DROP TABLE IF EXISTS members;

CREATE TABLE IF NOT EXISTS members (
 
fname varchar(20) not null,
 
lname varchar(20) not null,
 
address varchar(50) not null,
 
city varchar(30) not null,

state varchar(20) not null,
 
zip int(5) not null,
 
phone varchar(12),
 
email varchar(40),
 
userid varchar(20),
 
password varchar(20),
 
creditcardtype varchar(10)
 check(creditcardtype in ('amex','discover','mc','visa')),
 
creditcardnumber char(16),
 
primary key (userid)

);



DROP TABLE IF EXISTS orders;
CREATE TABLE IF NOT EXISTS orders (
 
userid varchar(20) not null,
 
ono int(5),
 
received date not null,
 
shipped date,
 
shipAddress varchar(50),
 
shipCity varchar(30),
 
shipState varchar(20),
 
shipZip int(5),
 
primary key (ono),
 
foreign key (userid) references members

);



DROP TABLE IF EXISTS odetails;

CREATE TABLE IF NOT EXISTS odetails (
 ono int(5),
 
isbn char(10),
 
qty int(5) not null,
 
price decimal(7,2) not null,
 
primary key (ono,isbn),
 
foreign key (ono) references orders,
 
foreign key (isbn) references books

);



DROP TABLE IF EXISTS cart;

CREATE TABLE IF NOT EXISTS cart (
 userid varchar(20),
 
isbn char(10),
 
qty int(5) not null,
 
primary key (userid,isbn),
 
foreign key (userid) references members,
 
foreign key (isbn) references books

);

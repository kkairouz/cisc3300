CREATE DATABASE `homework9`;

USE homework9;

CREATE TABLE `products`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `name`      varchar(80) NOT NULL,
    primary key (`id`)
);

insert into products (name)
values ('Coat');

insert into products (name)
values ('Badge');

insert into products (name)
values ('Shoes');

insert into products (name)
values ('Tie');

insert into products (name)
values ('Shirt');

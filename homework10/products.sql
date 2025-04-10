CREATE DATABASE `homework10`;

USE homework10;

CREATE TABLE `products`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `name`      varchar(80) NOT NULL,
    `description`      TEXT NOT NULL,
    primary key (`id`)
);
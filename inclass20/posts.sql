CREATE DATABASE `inclass20`;

USE inclass20;

CREATE TABLE `posts`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `firstName`      varchar(80) NOT NULL,
    `lastName`       varchar(80) NOT NULL,
    `description`      TEXT NOT NULL,
    primary key (`id`)
);
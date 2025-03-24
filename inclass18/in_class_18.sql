CREATE DATABASE `in_class_17`;
USE in_class_17; 
CREATE TABLE `users`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `firstName`      varchar(80) NOT NULL,
    `addressID` int(11) NOT NULL,
    primary key (`id`)
);

CREATE TABLE `userComments`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `address`   varchar(254) NOT NULL,
    `state`     varchar(80),
    `studentID` int(11) NOT NULL,
    primary key (`id`),
    foreign key (studentID) references users(id)

);
insert into users(id, firstName, addressID)
values(3232004, 'Caleb', 12328),
(12212003, 'Sasha', 20834);

insert into userComments
values(23456, "4204 drive lane", "New Jersey", 3232004), 
(39485, "345 Dean Street", "New York", 12212003); 

select  u.*, c.*
from users u
left join userComments c on u.id = c.studentID;

select u.*, c.*
from users u
inner join userComments c ON u.id = c.studentID;
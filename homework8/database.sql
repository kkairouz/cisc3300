USE in_class_17;

CREATE TABLE notes 
(
    `id` int(11) not NULL AUTO_INCREMENT,
    title varchar(80) NOT NULL,
    description text NOT NULL,
    primary key (id)
);

insert into notes(id, title, description)
values(20508, "assignment one", "create a webpage with basic html"),
(30284, "assignment two", "use basic styling on that webpage using css"); 

update notes
set description = 'use javascript and jquery'
where title = 'assignment two';

delete from notes
where title = 'assignment one';

select * from notes
order by title desc;

select * from notes 
order by id 
limit 1 offset 1; 


select * from notes 
where description REGEXP '[aeiouyAEIOUY]'; 



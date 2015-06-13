create table urllinks  (
    id int not null auto_increment primary key,
    first  DATE,
    last   DATE,
    code   varchar(20),
    url    varchar(75),
    tblname    varchar(25),
    source    varchar(25),
    enable int
);

create table download (
    id int not null auto_increment primary key,
    date DATE,
    amount double(4,2)
);

CREATE TABLE `opendata`.`users` (
`user_id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`first_name` VARCHAR( 25 ) NOT NULL ,
`last_name` VARCHAR( 25 ) NOT NULL ,
`user_city` VARCHAR( 45 ) NOT NULL
) ENGINE = InnoDB;

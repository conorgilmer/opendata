create table urllinks  (
    id int not null auto_increment primary key,
    first  DATE,
    last   DATE,
    code   varchar(5),
    url    varchar(25),
    enable int
);

create table download (
    id int not null auto_increment primary key,
    date DATE,
    amount double(4,2)
);



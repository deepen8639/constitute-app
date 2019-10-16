create table Users (
  id varchar(255) unique,
  password varchar(255),
  created datetime default now(),
  modified datetime,
  collect_part1_9 varchar(300) default '0,0,0,0,0,0,0,0',
  collect_part9_10 varchar(300) default '0',
  collect_part10_41 varchar(300) default '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  collect_part41_65 varchar(300) default '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  collect_part65_76 varchar(300) default '0,0,0,0,0,0,0,0,0,0,0',
  collect_part76_83 varchar(300) default '0,0,0,0,0,0,0',
  collect_part83_92 varchar(300) default '0,0,0,0,0,0,0,0,0',
  collect_part92_96 varchar(300) default '0,0,0,0',
  collect_part96_97 varchar(300) default '0',
  collect_part97_100 varchar(300) default '0,0,0',
  collect_part100_104 varchar(300) default '0,0,0,0',
  wrong_part1_9 varchar(300) default '0,0,0,0,0,0,0,0',
  wrong_part9_10 varchar(300) default '0',
  wrong_part10_41 varchar(300) default '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  wrong_part41_65 varchar(300) default '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  wrong_part65_76 varchar(300) default '0,0,0,0,0,0,0,0,0,0,0',
  wrong_part76_83 varchar(300) default '0,0,0,0,0,0,0',
  wrong_part83_92 varchar(300) default '0,0,0,0,0,0,0,0,0',
  wrong_part92_96 varchar(300) default '0,0,0,0',
  wrong_part96_97 varchar(300) default '0',
  wrong_part97_100 varchar(300) default '0,0,0',
  wrong_part100_104 varchar(300) default '0,0,0,0'
);

insert into Users(
  id,password,created
)

create table Users (
  id varchar(255) unique,
  password varchar(255),
  created datetime default now(),
  modified datetime,
  c_1 int not null default 0,
  c_2 int not null default 0
);

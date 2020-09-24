create database dbclinica;
use dbclinica;

create table tbpaciente ( 
idpaciente int auto_increment primary key ,
nome varchar(100) not null ,
nascimento date not null, 
sexo char(1) not null,
email varchar (100), 
telefone varchar (18) not null,
usuario varchar (30) unique not null ,
senha varchar (200) not null 
)ENGINE INNODB;

insert into tbpaciente (nome, nascimento,sexo, email,telefone,usuario,senha)
values('Linus Torvalds','19691228','M','linus@torvalds.com','2398-1111','linus',md5('123'));

select * from tbpaciente;
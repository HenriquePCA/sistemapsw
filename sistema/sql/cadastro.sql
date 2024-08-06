create database cadastro;
use cadastro;

create table usuario (
nome varchar (100) not null,
email varchar (100) primary key, 
nascimento date not null, 
telefone int not null, 
senha varchar (20) not null
);

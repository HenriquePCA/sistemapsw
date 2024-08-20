create database cadastro;
use cadastro;

create table usuario (
nome varchar (100) not null,
email varchar (100) primary key, 
nascimento date not null, 
telefone int not null, 
senha varchar (20) not null
);

CREATE TABLE produto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    modelo VARCHAR(100),
    marca VARCHAR(100),
    ano INT,
    cor VARCHAR(100),
    tipo ENUM('montanha', 'estrada', 'urbana', 'infantil', 'eletrica'),
    preco FLOAT,
    imagem BLOB,
    fornecedor_id INT,  
    FOREIGN KEY (fornecedor_id) REFERENCES fornecedor(id)
);
CREATE TABLE marca (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    website VARCHAR(255),
    estatus ENUM('ativo', 'inativo')
);


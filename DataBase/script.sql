create database aberturaos;

use aberturaos;

create table Clientes(
id int PRIMARY key AUTO_INCREMENT,
nome varchar(50),
cpf varchar(11),
endereco varchar(100)
);

create table Produtos(
codigo int PRIMARY key,
descricao varchar(50),
status boolean,
tempoGarantia int
);

create table ordemServico(
numeroOrdem int PRIMARY key,
dataAbertura date,
id_cliente int,
foreign key (id_cliente) REFERENCES clientes(id),
codigo_produto int,
foreign key (codigo_produto) REFERENCES Produtos(codigo)
);
-- drop database db_pi;

create database db_pi;
use db_pi;

create table tb_user (
	id int(5) primary key auto_increment,
    nm_user varchar (30),
    sb_nm_user varchar (255),
    email varchar(255),
    senha varchar (255),
    tipo_user char(1)
);

create table tb_categoria(
	id int(5) primary key auto_increment,
    nm_categoria varchar(255)
);

create table tb_produto (
	id int (5) primary key auto_increment, 
    nm_produto varchar(255), 
    desc_produto varchar(255),
    qtd_produto varchar(255),
    vl_produto varchar(255),
    status char(1),
    ft_produto varchar(255),
    id_categoria int(5),
    FOREIGN KEY(id_categoria) REFERENCES tb_categoria(id) 
);	

create table tb_carrinho(
	id int (5) primary key auto_increment,
    id_user int (5),
    FOREIGN KEY(id_user) REFERENCES tb_user(id) 
);

create table tb_produto_carrinho(
	id_carrinho int(5),
    id_produto int(5),
    qtd_produto int(5),
    FOREIGN KEY(id_produto) REFERENCES tb_produto(id),
    FOREIGN KEY(id_carrinho) REFERENCES tb_produto(id)
);

create table tb_info_user (
	id int(5) primary key auto_increment,
    cep varchar(9),
	endereco varchar(255),
    numero varchar(255),
    complemento varchar(255),
    bairro varchar(255),
    cidade varchar(255),
    estado varchar(255),
    forma_pagamento varchar(255),
    ft_usuario varchar(255),
    id_user int(5),
    FOREIGN KEY(id_user) REFERENCES tb_user(id)
);

create table tb_pedidos (
	id int(5) primary key auto_increment,
    id_user int(5),
    status varchar(1),
    FOREIGN KEY(id_user) REFERENCES tb_user(id)
);

create table tb_explode_pedidos_usuarios (
     id_pedido int(5),
     id_produto int(5),
     qtd_produto int(5),
     vlr_produto decimal(10,2),
     vlr_frete decimal(10,2),
     FOREIGN KEY(id_pedido) REFERENCES tb_pedido(id),
     FOREIGN KEY(id_produto) REFERENCES tb_produto(id)
);






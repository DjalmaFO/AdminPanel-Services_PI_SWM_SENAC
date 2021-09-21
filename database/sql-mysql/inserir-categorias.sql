-- 
use geek_style;

-- create database  geek_style;

insert into categorias(nm_categoria) values ('Categoria 1');

insert into categorias(nm_categoria) values ('Categoria 2');

insert into categorias(nm_categoria) values ('Categoria 3');

insert into categorias(nm_categoria) values ('Categoria 4');

insert into categorias(nm_categoria) values ('Categoria 5');

insert into categorias(nm_categoria) values ('Categoria 6');

insert into categorias(nm_categoria) values ('Categoria 7');

-- select * from categorias

select 
	p.nm_produto produto, 
    p.desc_produto descricao, 
    p.qtd_produto quantidade, 
    c.nm_categoria categoria
from produtos p
left join categorias c on c.id = p.id_categoria;

select * from tb_produto_carrinhos;
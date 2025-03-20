create database ExpenseManager;

use ExpenseManager;

create table Category (
	id int primary key auto_increment not null,
    name varchar(100) not null
);

create table Expense (
	id int primary key auto_increment not null,
    cost float not null,
    description varchar(200),    
    date datetime default current_timestamp,
    categoryId int,    
    FOREIGN KEY (categoryId) REFERENCES Category (id)
);

-- Popular o banco
insert into Category (id, name) values (1, "Mercado");
insert into Category (id, name) values (2, "Emergência");
insert into Category (id, name) values (3, "Fast Food");
insert into Category (id, name) values (4, "Contas");
insert into Category (id, name) values (5, "Eletrônicos");

insert into Expense (cost, description, categoryId) values (200.99, "Notebook", 5);
insert into Expense (cost, description, categoryId) values (6.73, "10x Pães", 1);
insert into Expense (cost, description, categoryId) values (312.20, "Conta de Luz", 4);
insert into Expense (cost, description, categoryId) values (489.40, "Conserto do carro", 2);
insert into Expense (cost, description, categoryId) values (110.99, "2x Pizza grande e 1x Coca-cola", 3);

-- Visualizar os valores
select e.description as "Descrição", e.cost as "Custo", e.date as "Data da despesa", c.name as "Categoria"
from expense e
left join category c on c.id = e.categoryId;

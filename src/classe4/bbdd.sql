drop database biblioteca;
create database biblioteca;
drop table if exists libros;
create table if not exists libros(
	id int AUTO_INCREMENT PRIMARY KEY,
    titulo varchar(50),
    autor varchar(50),
    anio_publicacion date,
    num_paginas int
);

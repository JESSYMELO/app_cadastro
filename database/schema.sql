CREATE database db_cadastro;
use db_cadastro;
CREATE TABLE atletas(
  id INT NOT NULL auto_increment,
  nome VARCHAR(100),
  idade INT NOT NULL,
  altura DECIMAL (10,2),
  posicao VARCHAR (100),
  data_nasc DATE,
  PRIMARY KEY (id)
);
CREATE TABLE usuarios(
  id INT NOT NULL auto_increment,
  email VARCHAR (200) NOT NULL,
  senha VARCHAR (200) NOT NULL,
  PRIMARY KEY (id)
);
insert into usuarios (email, senha) values('admin@gmail.com', 'dce71d49a1cbf5058a0a0cc6f892161d');



DROP TABLE IF EXISTS clientes;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `ativo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO clientes VALUES("4","aaamathe","matheush.borges@hotmail.com","(15) 44154-8749","Sim");
INSERT INTO clientes VALUES("5","aaaaaaaaaa","loidimus@hotmail.com",NULL,"Sim");
INSERT INTO clientes VALUES("6","fdxgxcvxcvd","maassdzfgsdfgsdxf",NULL,"Sim");


DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `senha_crip` varchar(150) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES("2","Eulenir Eberle","contatoEulenir@gmail.com","54321","01cfcd4f6b8770febfb40cb906715822","Admin","Eulenir.jpg");




CREATE DATABASE IF NOT EXISTS `Estacionamento` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `Estacionamento`;

CREATE TABLE Usuario(
	`idUsuario` int AUTO_INCREMENT NOT NULL,
	`Nome` varchar(50) NOT NULL,
	`Sobrenome` varchar(50) NULL,
	`CPF` varchar(14) NULL,
	`login` varchar(50) NOT NULL,
	`senha` varchar(40) NOT NULL,
PRIMARY KEY 
(
	`idUsuario` ASC
) 
) ENGINE = innodb; 

CREATE TABLE Veiculo(
	`idVeiculo` int AUTO_INCREMENT NOT NULL,
	`Marca` varchar(30) NOT NULL,
	`Modelo` varchar(30) NOT NULL,
	`Placa` varchar(8),
	`idUsuario` int,
	PRIMARY KEY (
		`idVeiculo` ASC
	)
)ENGINE = innodb;

CREATE TABLE Cartao(
	`idCartao` int AUTO_INCREMENT NOT NULL, 
	`numCartao` int(16) NOT NULL,
	`vencimento` varchar(5) NOT NULL,
	`NomeCartao` varchar(30) NOT NULL,
	`cod` int(3) NOT NULL, 
)
CREATE TABLE Entrada(
	`idAcesso` int AUTO_INCREMENT NOT NULL, 
	`idUsuario` int,
	`idVeiculo` int,
	`Entrada` varchar(20) NOT NULL,
	`Saida` varchar(20),
	PRIMARY KEY (
		`idAcesso` ASC
	)
)ENGINE = innodb;

;
INSERT INTO Usuario (`Nome`, `Sobrenome`, `CPF`, `login`, `senha`) VALUES ('Natália', 'Barros','023.706.406-50','nataliab',MD5('123456'));
INSERT INTO Usuario (`Nome`, `Sobrenome`, `CPF`, `login`, `senha`) VALUES ('Noah', 'Barros','317.559.841-20','noahB',MD5('123456'));
INSERT INTO Usuario (`Nome`, `Sobrenome`, `CPF`, `login`, `senha`) VALUES ('Oliver', 'Ramos','797.620.466-17','OliverR',MD5('123456'));
INSERT INTO Usuario (`Nome`, `Sobrenome`, `CPF`, `login`, `senha`) VALUES ('Márcia', 'Nunes','068.133.269-70','marciaN',MD5('123456'));
INSERT INTO Usuario (`Nome`, `Sobrenome`, `CPF`, `login`, `senha`) VALUES ('Marcos', 'Mendes','663.361.084-06','marcosM',MD5('123456'));


INSERT INTO Veiculo (`Marca`, `Modelo`, `Placa`, `idUsuario`)  VALUES ('Peugeot', '206','BVQ7861',1);
INSERT INTO Veiculo (`Marca`, `Modelo`, `Placa`, `idUsuario`)  VALUES ('Kia', 'Sorento','JVT6953',1);
INSERT INTO Veiculo (`Marca`, `Modelo`, `Placa`, `idUsuario`)  VALUES ('Nissan', 'Pathfinder','JTK9749',2);
INSERT INTO Veiculo (`Marca`, `Modelo`, `Placa`, `idUsuario`)  VALUES ('Honda', 'Civic','AQA8517',3);
INSERT INTO Veiculo (`Marca`, `Modelo`, `Placa`, `idUsuario`)  VALUES ('Toyota', 'Corolla','LVT0928',4);
INSERT INTO Veiculo (`Marca`, `Modelo`, `Placa`, `idUsuario`)  VALUES ('Toyota', 'Hilux','HQC1626',4);


SELECT idAcesso FROM `entrada` WHERE idUsuario = 1 and idVeiculo = 0 and Saida IS NULL;
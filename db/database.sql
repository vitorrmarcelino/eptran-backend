CREATE DATABASE eptran;

USE eptran;

CREATE TABLE usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    imagem_url VARCHAR(255) NULL,
    nome VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    adm BOOLEAN DEFAULT FALSE,
    email VARCHAR(255) UNIQUE NOT NULL,
    genero  ENUM('M', 'F', 'O') NOT NULL,
    nascimento DATE NOT NULL,
    etapa_escolar ENUM('f1', 'f2', 'em') NULL,
    cep VARCHAR(8) NOT NULL,
    bairro VARCHAR(255) NULL,
    municipio VARCHAR(255) NOT NULL,
    escola VARCHAR(255) NOT NULL,
    uf CHAR(2) NOT NULL,
    ativo BOOLEAN DEFAULT TRUE
 );

CREATE TABLE atividades (
id INT PRIMARY KEY AUTO_INCREMENT,
acesso DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
rota_acessada VARCHAR(255) NOT NULL,
usuario_id INT NOT NULL,
FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE dados_jogos (
  	id INT PRIMARY KEY AUTO_INCREMENT,
	acesso DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    nome_jogo VARCHAR(255) NOT NULL,
    dados JSON NOT NULL,
	usuario_id INT NOT NULL,
	FOREIGN KEY(usuario_id) REFERENCES usuarios(id)  
);

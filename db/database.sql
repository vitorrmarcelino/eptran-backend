CREATE DATABASE eptran;

USE eptran;

CREATE TABLE usuarios (
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

CREATE TABLE noticias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    texto TEXT NOT NULL,
    usuario_id INT,
    escolaridade_minima ENUM('f1', 'f2', 'em') NULL,
    img_url VARCHAR(255) NOT NULL,
    FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE postagens (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    texto TEXT NOT NULL,
    usuario_id INT,
    categoria VARCHAR(255) NULL,
    img_url VARCHAR(255) NOT NULL,
    FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE postagens_salvas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    postagem_id INT NOT NULL,
	FOREIGN KEY(usuario_id) REFERENCES usuarios(id), 
	FOREIGN KEY(postagem_id) REFERENCES postagens(id)
)

/*Quiz*/
CREATE TABLE quiz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    answer_1 VARCHAR(255) NOT NULL,
    answer_2 VARCHAR(255) NOT NULL,
    answer_3 VARCHAR(255) NOT NULL,
    answer_4 VARCHAR(255) NOT NULL,
    right int NOT NULL
);

--Perguntas do Quiz
INSERT INTO quiz(question,answer_1,answer_2,answer_3,answer_4,right) 
VALUES 
        ("Qual seu nome?", 
        "Caio","Guilherme","Higor","Kauan",0),

        ("Qual o MEU nome?", 
        "Caio","Guilherme","Higor","HTMLXYZ-Modelo 456",3)

        ("Qual sua cor favorita?", 
        "Vermelho","Azul","Amarelo","Verde",1),

        ("Qual sua missão", 
        "Matar tempo","Me formar","Achar o Cálice Sagrado","Ferrar com todo mundo",2),

        ("Você pode passar agora?", 
        "Sim","Não","Talvez","Não Sei",0);
        


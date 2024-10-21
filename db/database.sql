CREATE DATABASE eptran;

USE eptran;

CREATE TABLE schools (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    img_url VARCHAR(255) NULL,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    adm BOOLEAN DEFAULT FALSE,
    email VARCHAR(255) UNIQUE NOT NULL,
    gender  ENUM('M', 'F', 'O') NOT NULL,
    birthdate DATE NOT NULL,
    school_level ENUM('f1', 'f2', 'em') NULL,
    cep VARCHAR(8) NOT NULL,
    neighborhood VARCHAR(255) NULL,
    city VARCHAR(255) NOT NULL,
    school_id INT NULL,
    uf CHAR(2) NOT NULL,
    active BOOLEAN DEFAULT TRUE,
    FOREIGN KEY(school_id) REFERENCES schools(id)
);

CREATE TABLE accesses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    access_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    title VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE game_data (
    id INT PRIMARY KEY AUTO_INCREMENT,
	update_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    title VARCHAR(255) NOT NULL,
    save_data JSON NOT NULL,
	user_id INT NOT NULL,
	FOREIGN KEY(user_id) REFERENCES users(id)  
);

CREATE TABLE posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    content TEXT NOT NULL,
    user_id INT,
    category ENUM('f1', 'f2', 'em') NULL,
    img_url VARCHAR(255) NOT NULL,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE saved_posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
	FOREIGN KEY(user_id) REFERENCES users(id), 
	FOREIGN KEY(post_id) REFERENCES posts(id)
);
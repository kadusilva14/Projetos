CREATE DATABASE IF NOT EXISTS db_encurt;
USE db_encurt;

CREATE TABLE IF NOT EXISTS padrao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    link VARCHAR(150) NOT NULL,
    categ ENUM('Geral','Lazer','Estudos','Trabalho') DEFAULT 'Geral',
    criado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO padrao (titulo, link, categ) VALUES
('Youtube','https://www.youtube.com','Lazer');
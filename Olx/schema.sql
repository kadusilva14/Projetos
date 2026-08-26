CREATE DATABASE IF NOT EXISTS db_olx
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE db_olx;

CREATE TABLE IF NOT EXISTS produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    estado_de_conservacao ENUM('Novo','SemiNovo','Usado','Restaurado') NOT NULL,
    info_item TEXT NOT NULL,
    preco_item DECIMAL(10, 2) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    codigo_qr VARCHAR(50) UNIQUE,
    imagem VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

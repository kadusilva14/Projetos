

CREATE DATABASE IF NOT EXISTS loja_informatica
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;

USE loja_informatica;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    marca VARCHAR(60) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL DEFAULT 0,
    descricao VARCHAR(255) DEFAULT NULL,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO produtos (nome, categoria, marca, preco, quantidade, descricao) VALUES
('Notebook Gamer 15.6"', 'Notebooks', 'Dell', 4599.90, 8, 'Intel i7, 16GB RAM, RTX 4060, SSD 512GB'),
('Mouse Óptico Wireless', 'Periféricos', 'Logitech', 89.90, 50, 'Mouse sem fio com sensor óptico de alta precisão'),
('Teclado Mecânico RGB', 'Periféricos', 'Redragon', 199.90, 30, 'Switch blue, iluminação RGB personalizável'),
('Monitor 24" Full HD', 'Monitores', 'LG', 749.00, 15, 'Painel IPS, 75Hz, HDMI e VGA'),
('SSD 480GB SATA III', 'Armazenamento', 'Kingston', 249.90, 40, 'Leitura de até 550MB/s');

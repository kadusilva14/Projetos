CREATE DATABASE serasa;

USE serasa;

CREATE TABLE clientes (
    pendencia varchar(50) NOT NULL,
    cliente VARCHAR(50) NOT NULL,
    cpf VARCHAR(11) NOT NULL
);

INSERT INTO clientes (pendencia, cliente, cpf)
VALUES
('joao', '12345678910', 'pendente'),
('maria', '10987654321', 'confiavel');
CREATE DATABASE IF NOT EXISTS db_dashboard;
USE db_dashboard;

CREATE TABLE IF NOT EXISTS tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    status ENUM('pendente', 'em_andamento', 'concluido') DEFAULT 'pendente',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tarefas (titulo, status) VALUES 
('Finalizar layout do Bootstrap', 'concluido'),
('Integrar API do OpenWeather', 'em_andamento'),
('Testar CRUD com PHP e Fetch', 'pendente');
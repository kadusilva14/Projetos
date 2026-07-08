<?php
// ============================================
// Configuração de conexão com o Banco de Dados
// Ajuste os dados conforme sua instalação do MySQL (usada pelo HeidiSQL)
// ============================================

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "loja_informatica";

// Cria a conexão usando MySQLi
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Define o charset para evitar problemas com acentuação
$conexao->set_charset("utf8mb4");
?>

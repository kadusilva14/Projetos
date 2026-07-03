<?php
// ============================================
// CONFIG.PHP - Conexão com o Banco de Dados
// ============================================

// Dados de acesso ao MySQL (ajuste se necessário)
$host   = 'localhost';      // Servidor do banco
$dbname = 'supermercado';   // Nome do banco de dados
$user   = 'root';           // Usuário do MySQL
$pass   = '';               // Senha (vazia no XAMPP/WAMP padrão)

try {
    // Cria a conexão PDO com o MySQL
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",  // String de conexão
        $user,                                            // Usuário
        $pass                                             // Senha
    );
    
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Se chegou aqui, a conexão foi bem-sucedida
    // (não exibimos mensagem para não poluir a tela)
    
} catch (PDOException $erro) {
    // Se houver erro, exibe a mensagem e para o script
    die("Erro na conexão com o banco de dados: " . $erro->getMessage());
}
?>
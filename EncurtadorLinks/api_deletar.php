<?php
header('Content-Type: application/json');
require_once 'config.php';

$jsonRecebido = file_get_contents('php://input');
$dados = json_decode($jsonRecebido, true);

$id = $dados['id'] ?? null;

if (!$id) {
    echo json_encode(['sucesso' => false, 'erro' => 'ID inválido ou não fornecido.']);
    exit;
}

try {
  
    $sql = "DELETE FROM padrao WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([':id' => $id]);

    echo json_encode(['sucesso' => true, 'mensagem' => 'Link deletado com sucesso!']);

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'erro' => 'Erro ao deletar no banco: ' . $e->getMessage()]);
}
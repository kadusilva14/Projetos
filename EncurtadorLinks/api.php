<?php
header('Content-Type: application/json');
require_once 'config.php';

$jsonRecebido = file_get_contents('php://input');

$dados = json_decode($jsonRecebido, true);

$titulo = $dados['titulo'] ?? '';
$link   = $dados['link'] ?? '';
$categ  = $dados['categ'] ?? 'Geral';

if (empty($titulo) || empty($link)) {
    echo json_encode(['sucesso' => false, 'erro' => 'Preencha todos os campos!']);
    exit;
}

try {
    $sql = "INSERT INTO padrao (titulo, link, categ) VALUES (:titulo, :link, :categ)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':titulo' => $titulo,
        ':link'   => $link,
        ':categ'  => $categ
    ]);
    echo json_encode(['sucesso' => true, 'mensagem' => 'Link salvo com sucesso!']);

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'erro' => 'Erro no banco: ' . $e->getMessage()]);
}
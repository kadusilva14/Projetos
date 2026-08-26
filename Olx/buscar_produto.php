<?php
header('Content-Type: application/json');
require_once 'config.php';

$codigo = trim($_GET['codigo'] ?? '');

if (empty($codigo)) {
    http_response_code(400);
    echo json_encode(['sucesso' => false, 'erro' => 'Informe o código do QR Code.']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT id, nome, estado_de_conservacao, info_item, preco_item, categoria, codigo_qr, imagem, criado_em FROM produto WHERE codigo_qr = :codigo LIMIT 1");
    $stmt->execute([':codigo' => $codigo]);
    $produto = $stmt->fetch();

    if ($produto) {
        echo json_encode(['sucesso' => true, 'dados' => $produto]);
    } else {
        http_response_code(404);
        echo json_encode(['sucesso' => false, 'erro' => 'Produto não encontrado para este QR Code.']);
    }
} catch (PDOException $e) {
    error_log('Erro ao buscar produto: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['sucesso' => false, 'erro' => 'Erro interno ao buscar o produto. Tente novamente.']);
}

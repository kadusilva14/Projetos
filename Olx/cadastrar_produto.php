<?php
header('Content-Type: application/json');
require_once 'config.php';

function responder(int $status, array $payload): void {
    http_response_code($status);
    echo json_encode($payload);
    exit;
}

$nome     = trim($_POST['nome'] ?? '');
$estado   = trim($_POST['estado_de_conservacao'] ?? '');
$info_item = trim($_POST['info_item'] ?? '');
$preco_item = trim($_POST['preco_item'] ?? '');
$categoria = trim($_POST['categoria'] ?? '');

$estadosValidos = ['Novo', 'SemiNovo', 'Usado', 'Restaurado'];

if ($nome === '' || $estado === '' || $info_item === '' || $preco_item === '' || $categoria === '') {
    responder(400, ['sucesso' => false, 'erro' => 'Preencha todos os campos! (Inclusive Imagem)']);
}

if (mb_strlen($nome) > 150) {
    responder(400, ['sucesso' => false, 'erro' => 'Nome do produto muito longo (máximo 150 caracteres).']);
}

if (!in_array($estado, $estadosValidos, true)) {
    responder(400, ['sucesso' => false, 'erro' => 'Estado de conservação inválido.']);
}

if (!is_numeric($preco_item) || (float) $preco_item <= 0) {
    responder(400, ['sucesso' => false, 'erro' => 'Preço inválido.']);
}
$preco_item = round((float) $preco_item, 2);

if (mb_strlen($categoria) > 50) {
    responder(400, ['sucesso' => false, 'erro' => 'Categoria muito longa (máximo 50 caracteres).']);
}

// ------------------------------
// 2. Validação do arquivo de imagem
// ------------------------------
if (!isset($_FILES['imagem']) || $_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {
    responder(400, ['sucesso' => false, 'erro' => 'Preencha todos os campos! (Inclusive Imagem)']);
}

$arquivo = $_FILES['imagem'];

$tamanhoMaximo = 5 * 1024 * 1024; // 5 MB
if ($arquivo['size'] > $tamanhoMaximo) {
    responder(400, ['sucesso' => false, 'erro' => 'A imagem deve ter no máximo 5MB.']);
}

$mimesPermitidos = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'image/webp' => 'webp',
    'image/gif'  => 'gif',
];

$finfo = new finfo(FILEINFO_MIME_TYPE);
$mimeReal = $finfo->file($arquivo['tmp_name']);

if (!isset($mimesPermitidos[$mimeReal])) {
    responder(400, ['sucesso' => false, 'erro' => 'Formato de imagem inválido. Envie JPG, PNG, WEBP ou GIF.']);
}

$extensao = $mimesPermitidos[$mimeReal];

$diretorioUpload = __DIR__ . '/uploads/';

if (!is_dir($diretorioUpload)) {
    if (!mkdir($diretorioUpload, 0755, true) && !is_dir($diretorioUpload)) {
        error_log('Não foi possível criar o diretório de uploads: ' . $diretorioUpload);
        responder(500, ['sucesso' => false, 'erro' => 'Erro no servidor ao preparar o upload.']);
    }
}

$nomeArquivo = bin2hex(random_bytes(16)) . '.' . $extensao;
$caminhoFisico = $diretorioUpload . $nomeArquivo;
$caminhoRelativo = 'uploads/' . $nomeArquivo;

if (!move_uploaded_file($arquivo['tmp_name'], $caminhoFisico)) {
    error_log('Falha ao mover arquivo enviado para: ' . $caminhoFisico);
    responder(500, ['sucesso' => false, 'erro' => 'Falha ao salvar imagem no servidor.']);
}

$codigo_qr = 'QR-' . bin2hex(random_bytes(8));

try {
    $sql = "INSERT INTO produto (nome, estado_de_conservacao, info_item, preco_item, categoria, codigo_qr, imagem) VALUES (:nome, :estado, :info_item, :preco_item, :categoria, :codigo_qr, :imagem)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome'       => $nome,
        ':estado'     => $estado,
        ':info_item'  => $info_item,
        ':preco_item' => $preco_item,
        ':categoria'  => $categoria,
        ':codigo_qr'  => $codigo_qr,
        ':imagem'     => $caminhoRelativo,
    ]);

    responder(200, [
        'sucesso'   => true,
        'mensagem'  => 'Produto salvo com sucesso!',
        'codigo_qr' => $codigo_qr,
    ]);
} catch (PDOException $e) {
    @unlink($caminhoFisico);
    error_log('Erro no banco ao cadastrar produto: ' . $e->getMessage());
    responder(500, ['sucesso' => false, 'erro' => 'Erro ao salvar o produto. Tente novamente.']);
}

<?php
header('Content-Type: application/json');
require_once 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    case 'GET':
        $stmt = $pdo->query("SELECT * FROM tarefas ORDER BY id DESC");
        echo json_encode($stmt->fetchAll());
        break;

    
    case 'POST':
        $dados = json_decode(file_get_contents('php://input'), true);
        $titulo = trim($dados['titulo'] ?? '');
        $status = $dados['status'] ?? 'pendente';

        if ($titulo === '') {
            http_response_code(400);
            echo json_encode(['error' => 'O título é obrigatório']);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO tarefas (titulo, status) VALUES (:titulo, :status)");
        $stmt->execute(['titulo' => $titulo, 'status' => $status]);

        echo json_encode([
            'id' => $pdo->lastInsertId(),
            'titulo' => $titulo,
            'status' => $status
        ]);
        break;

    
    case 'PUT':
        $id = $_GET['id'] ?? null;

        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'ID é obrigatório']);
            exit;
        }

        $dados = json_decode(file_get_contents('php://input'), true);
        $titulo = trim($dados['titulo'] ?? '');
        $status = $dados['status'] ?? null;

        if ($titulo === '' || !$status) {
            http_response_code(400);
            echo json_encode(['error' => 'Título e status são obrigatórios']);
            exit;
        }

        $stmt = $pdo->prepare("UPDATE tarefas SET titulo = :titulo, status = :status WHERE id = :id");
        $stmt->execute(['titulo' => $titulo, 'status' => $status, 'id' => $id]);

        echo json_encode(['success' => true]);
        break;

    
    case 'DELETE':
        $id = $_GET['id'] ?? null;

        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'ID é obrigatório']);
            exit;
        }

        $stmt = $pdo->prepare("DELETE FROM tarefas WHERE id = :id");
        $stmt->execute(['id' => $id]);

        echo json_encode(['success' => true]);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método não permitido']);
        break;
}

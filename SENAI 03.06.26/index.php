<?php
// ============================================
// INDEX.PHP - Página principal do supermercado
// Exibe todos os produtos cadastrados
// ============================================

// Inclui o arquivo de conexão com o banco
require_once 'config.php';

// Busca todos os produtos no banco, ordenados por nome
$sql = "SELECT * FROM produtos ORDER BY nome ASC";
$resultado = $pdo->query($sql);      // Executa a consulta
$produtos = $resultado->fetchAll();  // Pega todos os registros como array
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado Online</title>
    <!-- Link para o arquivo CSS externo -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <!-- Cabeçalho da página -->
    <header>
        <h1>🛒 Supermercado Online</h1>
        <nav>
            <!-- Link para a página do carrinho -->
            <a href="cart.php" class="btn-carrinho">
                🛍️ Ver Carrinho
            </a>
        </nav>
    </header>

    <!-- Conteúdo principal: grade de produtos -->
    <main>
        <h2>Nossos Produtos</h2>
        
        <div class="produtos-grid">
            
            <?php if (count($produtos) > 0): ?>
                <!-- Loop: percorre cada produto retornado do banco -->
                <?php foreach ($produtos as $p): ?>
                    <div class="produto-card">
                        
                        <!-- Nome do produto -->
                        <h3><?php echo htmlspecialchars($p['nome']); ?></h3>
                        
                        <!-- Descrição (se existir) -->
                        <?php if (!empty($p['descricao'])): ?>
                            <p class="descricao"><?php echo htmlspecialchars($p['descricao']); ?></p>
                        <?php endif; ?>
                        
                        <!-- Preço formatado com 2 casas decimais -->
                        <p class="preco">R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></p>
                        
                        <!-- 
                            Link "Adicionar ao carrinho" 
                            Envia o ID do produto para cart.php com ação "add"
                        -->
                        <a href="cart.php?action=add&id=<?php echo $p['id']; ?>" 
                           class="btn-add">
                            ➕ Adicionar
                        </a>
                        
                    </div>
                <?php endforeach; ?>
                
            <?php else: ?>
                <!-- Mensagem caso não haja produtos cadastrados -->
                <p>Nenhum produto encontrado. Cadastre produtos no banco de dados.</p>
            <?php endif; ?>
            
        </div>
    </main>

    <!-- Rodapé simples -->
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Supermercado Online</p>
    </footer>

</body>
</html>
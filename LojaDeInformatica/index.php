<?php
require "config.php";

// Busca (opcional) por nome, categoria ou marca
$termo = trim($_GET["busca"] ?? "");

if ($termo !== "") {
    $stmt = $conexao->prepare(
        "SELECT * FROM produtos
         WHERE nome LIKE CONCAT('%', ?, '%')
            OR categoria LIKE CONCAT('%', ?, '%')
            OR marca LIKE CONCAT('%', ?, '%')
         ORDER BY id DESC"
    );
    $stmt->bind_param("sss", $termo, $termo, $termo);
    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    $resultado = $conexao->query("SELECT * FROM produtos ORDER BY id DESC");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema de Cadastro de Produtos</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <div>
                <h1>Produtos de Informática</h1>
                <p class="subtitulo">Gerencie o estoque da loja</p>
            </div>
            <a href="cadastrar.php" class="btn btn-primario">+ Novo Produto</a>
        </header>

        <?php if (isset($_GET['msg'])): ?>
            <div class="mensagem sucesso">
                <?php
                    $mensagens = [
                        "cadastrado" => "Produto cadastrado com sucesso!",
                        "editado" => "Produto atualizado com sucesso!",
                        "excluido" => "Produto excluído com sucesso!"
                    ];
                    echo $mensagens[$_GET['msg']] ?? "Operação realizada com sucesso!";
                ?>
            </div>
        <?php endif; ?>

        <form method="GET" action="index.php" class="busca">
            <input type="text" name="busca" placeholder="Buscar por nome, categoria ou marca..."
                   value="<?= htmlspecialchars($termo) ?>">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Preço</th>
                    <th>Qtd.</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && $resultado->num_rows > 0): ?>
                    <?php while ($p = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['nome']) ?></td>
                            <td><span class="badge-categoria"><?= htmlspecialchars($p['categoria']) ?></span></td>
                            <td><?= htmlspecialchars($p['marca']) ?></td>
                            <td class="preco">R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                            <td class="<?= $p['quantidade'] < 5 ? 'qtd-baixa' : '' ?>"><?= (int) $p['quantidade'] ?></td>
                            <td class="acoes-tabela">
                                <a href="editar.php?id=<?= $p['id'] ?>" class="btn btn-editar btn-sm">Editar</a>
                                <a href="excluir.php?id=<?= $p['id'] ?>" class="btn btn-excluir btn-sm"
                                   onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="vazio">Nenhum produto encontrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conexao->close(); ?>

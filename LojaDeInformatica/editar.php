<?php
require "config.php";

$id = (int) ($_GET["id"] ?? 0);
$erro = null;

// Busca o produto atual
$stmt = $conexao->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$produto = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$produto) {
    header("Location: index.php");
    exit;
}

$dados = $produto;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dados["nome"]        = trim($_POST["nome"] ?? "");
    $dados["categoria"]   = trim($_POST["categoria"] ?? "");
    $dados["marca"]       = trim($_POST["marca"] ?? "");
    $dados["preco"]       = str_replace(",", ".", $_POST["preco"] ?? "");
    $dados["quantidade"]  = $_POST["quantidade"] ?? "";
    $dados["descricao"]   = trim($_POST["descricao"] ?? "");

    if ($dados["nome"] === "" || $dados["categoria"] === "" || $dados["marca"] === "" ||
        $dados["preco"] === "" || $dados["quantidade"] === "") {
        $erro = "Preencha todos os campos obrigatórios.";
    } elseif (!is_numeric($dados["preco"]) || $dados["preco"] < 0) {
        $erro = "Informe um preço válido.";
    } elseif (!ctype_digit((string) $dados["quantidade"]) || (int) $dados["quantidade"] < 0) {
        $erro = "Informe uma quantidade válida.";
    } else {
        $stmt = $conexao->prepare(
            "UPDATE produtos SET nome = ?, categoria = ?, marca = ?, preco = ?, quantidade = ?, descricao = ? WHERE id = ?"
        );
        $preco = (float) $dados["preco"];
        $quantidade = (int) $dados["quantidade"];
        $stmt->bind_param("sssdisi", $dados["nome"], $dados["categoria"], $dados["marca"], $preco, $quantidade, $dados["descricao"], $id);
        $stmt->execute();
        $stmt->close();
        $conexao->close();

        header("Location: index.php?msg=editado");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Produto</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container container-form">
        <header>
            <div>
                <h1>Editar Produto</h1>
                <p class="subtitulo">Atualize os dados do produto</p>
            </div>
        </header>

        <?php if ($erro): ?>
            <div class="mensagem erro"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <form method="POST" action="editar.php?id=<?= $id ?>">
            <div class="campo">
                <label for="nome">Nome do Produto *</label>
                <input type="text" id="nome" name="nome"
                       value="<?= htmlspecialchars($dados['nome']) ?>" required>
            </div>

            <div class="linha-dupla">
                <div class="campo">
                    <label for="categoria">Categoria *</label>
                    <select id="categoria" name="categoria" required>
                        <option value="">Selecione...</option>
                        <?php
                        $categorias = ["Notebooks", "Desktops", "Periféricos", "Monitores", "Armazenamento", "Componentes", "Redes", "Impressoras", "Software"];
                        foreach ($categorias as $c) {
                            $sel = ($dados['categoria'] === $c) ? "selected" : "";
                            echo "<option value=\"$c\" $sel>$c</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="campo">
                    <label for="marca">Marca *</label>
                    <input type="text" id="marca" name="marca"
                           value="<?= htmlspecialchars($dados['marca']) ?>" required>
                </div>
            </div>

            <div class="linha-dupla">
                <div class="campo">
                    <label for="preco">Preço (R$) *</label>
                    <input type="text" id="preco" name="preco"
                           value="<?= htmlspecialchars($dados['preco']) ?>" required>
                </div>
                <div class="campo">
                    <label for="quantidade">Quantidade em Estoque *</label>
                    <input type="number" id="quantidade" name="quantidade" min="0"
                           value="<?= htmlspecialchars($dados['quantidade']) ?>" required>
                </div>
            </div>

            <div class="campo">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao"><?= htmlspecialchars($dados['descricao'] ?? '') ?></textarea>
            </div>

            <div class="acoes-form">
                <button type="submit" class="btn btn-primario">Salvar Alterações</button>
                <a href="index.php" class="btn btn-secundario">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>

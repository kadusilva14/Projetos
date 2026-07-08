<?php
require "config.php";

$resultado = null;
$erro = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome   = trim($_POST["nome"] ?? "");
    $peso   = str_replace(",", ".", $_POST["peso"] ?? "");
    $altura = str_replace(",", ".", $_POST["altura"] ?? "");

    if ($nome === "" || $peso === "" || $altura === "") {
        $erro = "Preencha todos os campos.";
    } elseif (!is_numeric($peso) || !is_numeric($altura) || $peso <= 0 || $altura <= 0) {
        $erro = "Peso e altura devem ser números válidos maiores que zero.";
    } else {
        $peso = (float) $peso;
        $altura = (float) $altura;

        // Cálculo do IMC: peso / (altura * altura)
        $imc = $peso / ($altura * $altura);
        $imc = round($imc, 2);

        // Classificação segundo a OMS
        if ($imc < 18.5) {
            $classificacao = "Abaixo do peso";
            $classeCss = "abaixo";
        } elseif ($imc < 25) {
            $classificacao = "Peso normal";
            $classeCss = "normal";
        } elseif ($imc < 30) {
            $classificacao = "Sobrepeso";
            $classeCss = "sobrepeso";
        } else {
            $classificacao = "Obesidade";
            $classeCss = "obesidade";
        }

        // Salva o registro no banco de dados
        $stmt = $conexao->prepare(
            "INSERT INTO registros_imc (nome, peso, altura, imc, classificacao) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sddds", $nome, $peso, $altura, $imc, $classificacao);
        $stmt->execute();
        $stmt->close();

        $resultado = [
            "nome" => htmlspecialchars($nome),
            "imc" => $imc,
            "classificacao" => $classificacao,
            "classeCss" => $classeCss
        ];
    }
}

$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calculadora de IMC</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Calculadora de IMC</h1>
        <p class="subtitulo">Calcule seu Índice de Massa Corporal</p>

        <?php if ($erro): ?>
            <div class="erro"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php">
            <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome"
                       value="<?= isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '' ?>" required>
            </div>
            <div class="campo">
                <label for="peso">Peso (kg)</label>
                <input type="text" id="peso" name="peso" placeholder="Ex: 70.5"
                       value="<?= isset($_POST['peso']) ? htmlspecialchars($_POST['peso']) : '' ?>" required>
            </div>
            <div class="campo">
                <label for="altura">Altura (m)</label>
                <input type="text" id="altura" name="altura" placeholder="Ex: 1.75"
                       value="<?= isset($_POST['altura']) ? htmlspecialchars($_POST['altura']) : '' ?>" required>
            </div>
            <button type="submit">Calcular IMC</button>
        </form>

        <?php if ($resultado): ?>
            <div class="resultado <?= $resultado['classeCss'] ?>">
                <h2>Olá, <?= $resultado['nome'] ?>! Seu resultado:</h2>
                <div class="valor-imc"><?= number_format($resultado['imc'], 2, ',', '.') ?></div>
                <span class="classificacao"><?= $resultado['classificacao'] ?></span>
            </div>
        <?php endif; ?>

        <a class="link-historico" href="historico.php">Ver histórico de cálculos →</a>
    </div>
</body>
</html>

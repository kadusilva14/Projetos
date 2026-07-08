<?php
require "config.php";

$resultado = $conexao->query(
    "SELECT nome, peso, altura, imc, classificacao, data_calculo
     FROM registros_imc
     ORDER BY data_calculo DESC
     LIMIT 50"
);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Histórico de IMC</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container container-historico">
        <h1>Histórico de Cálculos</h1>
        <p class="subtitulo">Últimos registros salvos no banco de dados</p>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Peso (kg)</th>
                    <th>Altura (m)</th>
                    <th>IMC</th>
                    <th>Classificação</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && $resultado->num_rows > 0): ?>
                    <?php while ($linha = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($linha['nome']) ?></td>
                            <td><?= number_format($linha['peso'], 2, ',', '.') ?></td>
                            <td><?= number_format($linha['altura'], 2, ',', '.') ?></td>
                            <td><?= number_format($linha['imc'], 2, ',', '.') ?></td>
                            <td><?= htmlspecialchars($linha['classificacao']) ?></td>
                            <td><?= date("d/m/Y H:i", strtotime($linha['data_calculo'])) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6">Nenhum registro encontrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a class="link-historico" href="index.php">← Voltar para a calculadora</a>
    </div>
</body>
</html>
<?php $conexao->close(); ?>

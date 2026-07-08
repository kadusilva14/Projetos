<?php
include("conexao.php");

$cpf = $_POST['cpf'];

$sql = "SELECT * FROM clientes WHERE cpf = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cpf);
$stmt->execute();

$resultado = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resultado</title>
<link rel="stylesheet" href="styleres.css">
</head>
<body>

<div class="container">

<?php

if($resultado->num_rows > 0){

    $cliente = $resultado->fetch_assoc();
    echo "<h2>Cliente: {$cliente['cliente']}</h2>";
    echo "<p>Status: {$cliente['pendencia']}</p>";

    if($cliente['pendencia'] == "pendente"){
        echo "<div class='negado'>";
        echo "❌ Empréstimo NEGADO ❌";
        echo "</div>";
    }
    else{
        echo "<div class='aprovado'>";
        echo "✅ Empréstimo APROVADO ✅";
        echo "</div>";
    }

}else{
    echo "<h2>CPF não encontrado!</h2>";
}

?>

<br>
<a href="index.php">Nova Consulta</a>

</div>

</body>
</html>
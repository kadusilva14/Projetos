<html>
<head>
    <title>Sistema de Medição de Temperatura</title>
</head>

<body>
    <h1>TEMPERATURA</h1>

    <hr>
    
    <form method = "POST">
        Digite a temperatura:
        <input type = "number" name = "Temperatura">
        <br><br>
        <input type = "submit" value = "Enviar">
    </form>

    <?php
    $F = "Quem não tem sua morena, loira, ou ruiva, <strong>Boa Sorte!</strong>, temperatura abaixo de 29 °C";
    $M = "Ta calor mas não ta sol, vulgo neblina quente, temperatura maior que 30 °C";
    $C = "Chegamos em <strong>Bangu</strong>, o Dianho está a esquerda junto com o termômetro, que está batendo apenas <strong>40 °C</strong>";
    $Temp;

    echo "<hr>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Temp = (int) $_POST["Temperatura"];
        echo "Temperatura digitada: $Temp °C";
        echo "<hr>";
        
        if ($Temp >= 40) {
            echo "<p>$C</p>"; 
        } elseif ($Temp >= 30) {
            echo "<p>$M</p>";
        } else {
            echo "<p>$F</p>";
        } 
    echo "<hr>";
    } 
    ?>
    
        <p>Fim do relatório de Temperatura.</p>

</body>
</html>
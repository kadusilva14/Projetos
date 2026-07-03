<?php
//1. Verifica se a pagina foi acessada atraves do envio do formulario (metodo POST)
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //2.Captura os dados enviados usando a superglobal $_POST.
    //Usamos htmlspecialchars() como uma boa pratica de seguranca inicial para evitar
    //a execucao de codigos maliciosos ( XSS ) caso alguem digite tags HTML nos campos.
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    //3. Exibe os dados recebidos de volta na tela
    echo "<h2>Dados recebidos com sucesso no servidor!</h2>";
    echo "<p><strong>Nome:</strong>" . $nome . "</p>";
    echo "<p><strong>E-mail:</strong>" . $email . "</p>";
    echo "<p><strong>Mensagem:</strong>" . $mensagem . "</p>";
    // Link simples pra voltar a pagina anterior
    echo '<br><a href="formContato.html">Voltar para o formulario</a>';
} else {
    // Se alguem tentar acessar 'processa.php' digitando direto na barra de enderecos
    echo "<h2>Acesso invalido.</h2>";
    echo "<p>Por favor, preencha o formulario primeiro.</p>";
}
?>
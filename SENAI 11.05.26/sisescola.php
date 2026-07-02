<html>
    <head>
        <title>Sistema de Notas Escolares</title>
    </head>
    <body>
        <h1>Boletim de Notas - Turma ABC </h1>
        <p>Abaixo estão os resultados do semestre dos nossos alunos.</p>
        <hr>
        <?php
        $nomeAluno1 = "Carlos Silva";
        $nota1_aluno1 = 8.5;
        $nota2_aluno1 = 7.0;

        $media_aluno1 = ($nota1_aluno1 + $nota2_aluno1) / 2;

        echo "<p>Aluno: " . $nomeAluno1 . "</p>";
        echo "<p>Nota 1: " . $nota1_aluno1 . " | Nota 2: " $nota2_aluno1 . "</p>";
        echo "<p>Média Final: " . $media_aluno1 . "</p>";

        if ($media_aluno1 >= 7.0){
            echo "<p>Status: Aprovado! Parabéns pelo esforço.</p>";
        }elseif ($media_aluno1 >= 5.0){
            echo "<p>Status: Em Recuperação. Estude mais um pouco <;p>";
        }else {
            echo "<p>Status: Reprovado. Nos vemos no próximo ano.</p>";
        }

        echo "<hr>";
        $nomeAluno2 = "Mariana Costa";
        $nota1_aluno2 = 5.5;
        $nota2_aluno2 = 6.0;

        $media_aluno1 = ($nota1_aluno1 + $nota2_aluno1) / 2;

        echo "<p>Aluno: " . $nomeAluno2 . "</p>";
        echo "<p>Nota 1: " . $nota1_aluno2 . " | Nota 2: " $nota2_aluno2 . "</p>";
        echo "<p>Média Final: " . $media_aluno2 . "</p>";

        if ($media_aluno1 >= 7.0){
            echo "<p>Status: Aprovado! Parabéns pelo esforço.</p>";
        }elseif ($media_aluno1 >= 5.0){
            echo "<p>Status: Em Recuperação. Estude mais um pouco <;p>";
        }else {
            echo "<p>Status: <strong>Reprovado.</strong> Nos vemos no próximo ano.</p>";
        }
    </body>
</html>
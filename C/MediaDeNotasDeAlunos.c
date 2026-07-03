/* Desafio 2: Lógica de Programação - Média de Notas de Alunos
Complete as lacunas para calcular média de 3 notas de 6 alunos e verificar aprovação (>=7).
Corrija o loop for e use if/else.
Compile com: gcc desafio_2.c -o desafio_2 && desafio_2.exe
*/

#include <stdio.h>
#include <stdlib.h>
int main(){
    float nota1,nota2,nota3,media;
    int contalunos;
    
    /* COMPLETE AQUI: Loop for corrigido para 6 alunos (sem ; após for) */
    for(contalunos=1; contalunos<=6; contalunos++)
    {
        printf(" Entre com a nota 1 do aluno: \n");
        scanf( "%f", &nota1);
        printf(" Entre com a nota 2 do aluno: \n");
        scanf ( "%f", &nota2);
        printf( " Entre com a nota 3 do aluno: \n");
        scanf( "%f", &nota3);
        
        /* COMPLETE AQUI: Calcule média */
        media = (nota1+nota2+nota3)/3;
        
        /* COMPLETE AQUI: Condição de aprovação */
        if ( media >= 7 )
        { 
            printf(" Aluno Aprovado com media: %.2f\n", media);
        }
        else {
            printf(" Aluno Reprovado com media: %.2f\n", media);
        }
        printf("\n"); /* Separação entre alunos */
    }
    return 0;
}

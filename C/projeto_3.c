#include <stdio.h>
#include <stdlib.h>
int main(){
    float nota1,nota2,nota3,media;
    int contalunos;
    for(contalunos=1;contalunos<=6;contalunos++);
    {
        printf(" Entre com a nota 1 do aluno: \n");
        scanf( "%2f", &nota1);
        printf(" Entre com a nota 2 do aluno: \n");
        scanf ( "%2f", &nota2);
        printf( " Entre com a nota 3 do aluno: \n");
        scanf( "%2f", &nota3);
        media = (nota1+nota2+nota3)/3;
        if ( media>=7)
        { 
            printf(" Aluno Aprovado com media: %.2f", media);
        }
        else {
            printf(" Aluno Reprovado com media: %.2f", media);
        }
    }
return 0;
}
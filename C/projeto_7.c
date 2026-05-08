#include <stdio.h>
#include <stdlib.h>
int main(){
    float nota1,nota2,nota3,media;
    int contalunos;
    for(contalunos=1;contalunos<=40;contalunos++);
    {
        printf("Digite a nota 1 do aluno: ");
        scanf("%2f", &nota1);
        printf("Digite a nota 2 do aluno: ");
        scanf("%2f", &nota2);
        printf("Digite a nota 3 do aluno: ");
        scanf("%2f", &nota3);
        media=(nota1+nota2+nota3)/3;
        if (media>=7)
        {
            printf("Parabens, Voce foi Aprovado com media: %2f", media);
        }
        else 
        {
            printf("Voce foi Reprovado com nota: %2f", media);
        }
    }
return 0;
}
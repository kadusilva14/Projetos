#include <stdio.h>
#include <stdlib.h>
int main(){
    float nota1,nota2,nota3,media;
    int contalunos=1;
    while (contalunos<=6)
    {
        printf("Digite a nota 1 do aluno:");
        scanf("%f", &nota1);
        printf("Digite a nota 2 do aluno:");
        scanf("%f", &nota2);
        printf("Digite a nota 3 do aluno:");
        scanf("%f", &nota3);
        media=(nota1+nota2+nota3)/3;
        if (media>=7)
            printf("Aprovado com nota: %.2f\n\n", media);
        else
            printf("Reprovado com nota: %.2f\n\n", media);
contalunos++;
    }
    return 0;
}
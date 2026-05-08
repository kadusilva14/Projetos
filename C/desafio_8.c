/* Desafio 8: Lógica de Programação - Notas com While Loop
Complete as lacunas para processar 6 alunos com while, calcular média e aprovação.
Incremente contador no final.
Compile com: gcc desafio_8.c -o desafio_8 && desafio_8.exe
*/

#include <stdio.h>
#include <stdlib.h>
int main(){
    float nota1,nota2,nota3,media;
    int contalunos=1;
    
    /* COMPLETE AQUI: Condição while para 6 alunos */
    while (contalunos <= 6)
    {
        printf("Digite a nota 1 do aluno:");
        scanf("%f", &nota1);
        printf("Digite a nota 2 do aluno:");
        scanf("%f", &nota2);
        printf("Digite a nota 3 do aluno:");
        scanf("%f", &nota3);
        
        /* COMPLETE AQUI: Calcule média */
        media=(nota1+nota2+nota3)/3;
        
        /* COMPLETE AQUI: If else para aprovação */
        if (media>=7)
            printf("Aprovado com nota: %.2f\n\n", media);
        else
            printf("Reprovado com nota: %.2f\n\n", media);
        
        /* COMPLETE AQUI: Incremente contador */
        contalunos++;
    }
    return 0;
}

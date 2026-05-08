/* Desafio 3: Lógica de Programação - Média de Notas de 40 Alunos
Complete as lacunas para processar 40 alunos com 3 notas cada, aprovação se media >=7.
Corrija o loop for (sem ;) e adicione \n.
Compile com: gcc desafio_3.c -o desafio_3 && desafio_3.exe
*/

#include <stdio.h>
#include <stdlib.h>
int main(){
    float nota1,nota2,nota3,media;
    int contalunos;
    
    /* COMPLETE AQUI: Loop for para 40 alunos corrigido */
    for(contalunos=1; contalunos<=40; contalunos++)
    {
        printf("Digite a nota 1 do aluno: ");
        scanf("%f", &nota1);
        printf("Digite a nota 2 do aluno: ");
        scanf("%f", &nota2);
        printf("Digite a nota 3 do aluno: ");
        scanf("%f", &nota3);
        
        /* COMPLETE AQUI: Calcule média das 3 notas */
        media = (nota1 + nota2 + nota3) / 3;
        
        /* COMPLETE AQUI: Verifique aprovação com printf apropriado */
        if (media >= 7)
        {
            printf("Parabens, Voce foi Aprovado com media: %.2f\n\n", media);
        }
        else 
        {
            printf("Voce foi Reprovado com nota: %.2f\n\n", media);
        }
    }
return 0;
}

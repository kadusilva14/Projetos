/* Desafio 1: Lógica de Programação - Salários dos Funcionários
Complete as lacunas para calcular a média salarial e o maior salário de 10 funcionários.
Use loops for, variáveis float, soma e comparação if.
Compile com: gcc desafio_1.c -o desafio_1 && desafio_1.exe
*/

#include <stdio.h>
#include <stdlib.h>

int main(){
    int cont;
    float salario, media, soma, maior;
    
    /* COMPLETE AQUI: Inicialize soma e maior */
    soma = 0;
    maior = 0;
    
    /* COMPLETE AQUI: Loop for para 10 funcionários */
    for ( cont=1; cont <= 10; cont++)
    {
        printf( "Digite o salario do funcionario: \n");
        scanf("%f", &salario);
        /* COMPLETE AQUI: Acumule soma */
        soma = soma + salario;
        /* COMPLETE AQUI: Verifique se é maior */
        if (salario > maior)
        {
            maior = salario;
        }
    }
    
    /* COMPLETE AQUI: Calcule média */
    media = soma / 10;
    
    printf ("O maior salario da empresa e = %.2f \n", maior);
    printf ("a media salarial da empresa e = %.2f \n", media);
    return 0;
}

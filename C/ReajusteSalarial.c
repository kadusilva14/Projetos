/* Desafio 4: Lógica de Programação - Reajuste Salarial
Complete as lacunas para reajustar salário de 8 funcionários com percentual dado, mostrar reajustado e maior.
Corrija o loop for e if.
Compile com: gcc desafio_4.c -o desafio_4 && desafio_4.exe
*/

#include <stdio.h>
#include <stdlib.h>
int main(){
    float percreaj,salario,salarioreaj,maiorsal;
    
    /* COMPLETE AQUI: Inicialize maiorsal */
    maiorsal = 0;
    
    printf("Percentual de reajuste salarial: \n");
    scanf( "%f", &percreaj);
    
    /* COMPLETE AQUI: Loop for para 8 funcionários (sem ;) */
    for (int cont=1; cont<=8; cont++)
    {
        printf("Informe o salario do funcionario: \n");
        scanf("%f", &salario);
        
        /* COMPLETE AQUI: Calcule salário reajustado */
        salarioreaj = salario + (salario * percreaj / 100);
        
        printf("O salario reajustado e: %.2f \n\n", salarioreaj);
        
        /* COMPLETE AQUI: Atualize maior se maior (sem ;) */
        if (salarioreaj > maiorsal)
        {
            maiorsal = salarioreaj;
        }
    }
    printf("O maior salario reajustado e: %.2f \n", maiorsal);
    return 0;
}

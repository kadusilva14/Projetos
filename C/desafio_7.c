/* Desafio 7: Lógica de Programação - Maior de 4 Números
Complete as lacunas para ler 4 números e encontrar o maior.
Use for loop e if comparação.
Compile com: gcc desafio_7.c -o desafio_7 && desafio_7.exe
*/

#include <stdio.h>
#include <stdlib.h>
int main()
{
    int cont,num,maior;
    
    /* COMPLETE AQUI: Inicialize maior */
    maior = 0;
    
    /* COMPLETE AQUI: Loop for para 4 números */
    for (cont=1;cont<=4;cont++)
    {
        printf ("Digite um número: ");
        scanf("%d",&num);
        /* COMPLETE AQUI: Verifique se num é maior */
        if (num > maior)
        {
            maior=num;
        }
    }
    
    printf ("O maior dos números lidos = %d\n",maior);
    return 0;
}

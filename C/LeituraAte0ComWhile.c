/* Desafio 6: Lógica de Programação - Leitura até 0 com While
Complete as lacunas para ler números até digitar 0, imprimindo cada um.
Use while com condição.
Compile com: gcc desafio_6.c -o desafio_6 && desafio_6.exe
*/

#include <stdio.h>
#include <stdlib.h>
int main()
{
    int num;
    printf ("Digite um número: ");
    scanf("%d",&num);
    
    /* COMPLETE AQUI: Loop while até num != 0 */
    while (num!=0)
    {
        printf ("O número lido foi = %d\n\n ",num);
        printf ("Digite um número: ");
        scanf("%d",&num);
    }
    return 0;
}

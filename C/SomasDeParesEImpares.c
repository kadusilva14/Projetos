/* Desafio 5: Lógica de Programação - Soma de Pares e Ímpares
Complete as lacunas para ler N números, somar pares e ímpares separadamente.
Valide N >0 e entrada numérica.
Compile com: gcc desafio_5.c -o desafio_5 && desafio_5.exe
*/

#include <stdio.h>
#include <stdlib.h>

int main()
{
    int cont, n, num, somapar = 0, somaimpar = 0;

    printf("Digite a quantidade de números da lista:\n");
    scanf("%d", &n);

    /* COMPLETE AQUI: Validação de N positiva */
    if (n <= 0) {
        printf("Quantidade inválida!\n");
        return 0;
    }

    /* COMPLETE AQUI: Loop for de 1 a N */
    for (cont = 1; cont <= n; cont++)
    {
        printf("Digite um número:\n");

        /* COMPLETE AQUI: Leitura com validação scanf */
        if (scanf("%d", &num) != 1) {
            printf("Entrada inválida!\n");
            return 0;
        }

        /* COMPLETE AQUI: Verifique par/ímpar e some */
        if (num % 2 == 0)
            somapar += num;
        else
            somaimpar += num;
    }

    printf("A soma dos números pares = %d\n", somapar);
    printf("A soma dos números ímpares = %d\n", somaimpar);

    return 0;
}

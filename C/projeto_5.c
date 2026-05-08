#include <stdio.h>
#include <stdlib.h>

int main()
{
    int cont, n, num, somapar = 0, somaimpar = 0;

    printf("Digite a quantidade de números da lista:\n");
    scanf("%d", &n);

    if (n <= 0) {
        printf("Quantidade inválida!\n");
        return 0;
    }

    for (cont = 1; cont <= n; cont++)
    {
        printf("Digite um número:\n");

        if (scanf("%d", &num) != 1) {
            printf("Entrada inválida!\n");
            return 0;
        }

        if (num % 2 == 0)
            somapar += num;
        else
            somaimpar += num;
    }

    printf("A soma dos números pares = %d\n", somapar);
    printf("A soma dos números ímpares = %d\n", somaimpar);

    return 0;
}
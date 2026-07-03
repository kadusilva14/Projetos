#include <stdio.h>
#include <stdlib.h>
int main()
{
    int cont,num,maior;
    maior=0;
    for (cont=1;cont<=4;cont++)
    {
        printf ("Digite um número: ");
        scanf("%d",&num);
        if (num > maior)
        {
            maior=num;
        }
    }
    
    printf ("O maior dos números lidos = %d\n",maior);
    return 0;
}
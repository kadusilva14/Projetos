#include <stdio.h>
int main(){
    int num[10];
    int numero;
    for(numero=0;numero<10;numero++)
     scanf("%d", &(num[numero]));
    for(numero=9;numero>=0;numero--)
     printf("%d \n", num[numero]);
    return 0;
}
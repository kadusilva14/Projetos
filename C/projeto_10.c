#include <stdio.h>
#include <stdlib.h>
int main(){
    int num;
    printf("Digite um Num: \n");
    scanf("%d", &num);
    while (num!=0)
    {
        printf("O numero Digitado foi: %d \n",num);
        printf("Escreva um numero: \n");
        scanf("%d", &num);
    }
    return 0;
}
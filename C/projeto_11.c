#include <stdio.h>
#include <stdlib.h>
int main(){
    int num;
    do
    {
    printf("Digite um numero: \n");
    scanf("%d", &num);
    if (num!=0)
    printf("O numero digitado foi: %d \n", num);
    } while (num!=0);
    return 0;
}
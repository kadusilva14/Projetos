#include <stdio.h>
int main(){
    float vet[20], soma=0, media;
    int i;
    for(i=0;i<20;i++)
    {
    scanf("%f", &vet[i]);
    soma=soma +vet[i];
    }
    media=soma/20;
    printf("numeros maiores que a media: %.2f \n", media);
    for(i=0;i<20;i++)
    {
    if (vet[i] >= media)
    printf( "%.2f \n", vet[i]);
    }

    return 0;
}
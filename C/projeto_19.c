#include <stdio.h>
int main(){
    int mat[3][3], lin, col, maior, igual;
    printf("Digite o Valor da Matriz: \n\n");
    for(lin=0;lin<3;lin++)
    for(col=0;col<3;col++){
    printf("Elemento[%d][%d]\n", lin, col);
    scanf("%d", &mat[lin][col]);
    if (mat[lin][col]>maior)
    {
    maior=mat[lin][col];
    igual=1;
}
    else
    if (mat[lin][col]==maior)
    igual++;
}
    
printf("O maior numero e: %d \n", maior);
printf("A recorrencia do numero igual ao maior numero e: %d \n", igual);
    return 0;
}
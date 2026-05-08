#include <stdio.h>
int main(){
    int mat[5][5], lin, col;
    printf("Informe o Elemento: \n");
    for(lin=0;lin<5;lin++)
    for(col=0;col<5;col++)
    {
        mat[lin][col]=1;
        if (lin==col)
        mat[lin][col]=0;
        printf("%d", mat[lin][col]);
    }
    printf("\n");

    return 0;

}
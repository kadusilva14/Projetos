#include <stdio.h>
int main(){
    int mato[4][4],mate[4][4], lin, col;
    printf ("\nDigite a matriz original\n");
    for (lin=0;lin<4;lin++)
    for (col=0; col<4; col++){
    scanf("%d", &mato[lin][col]);
    mate[col][lin]=mato[lin][col];
    }
    printf("Matriz Gerada: \n");

    for (lin=0;lin<4;lin++) {
    for (col=0;col<4;col++)
    printf ("%d ",mate[lin][col]);
    printf ("\n");
    }
    return 0;
    }

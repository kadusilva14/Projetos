#include <stdio.h>
#include <stdlib.h>
int main(){
    float percreaj,salario,salarioreaj,maiorsal;
    int cont;
    maiorsal = 0;
    printf("Percentual de reajuste salaria: \n");
    scanf( "%f", &percreaj);
    for (cont=1;cont<=8;cont++);
    {
        printf("Informe o salario do funcionario: \n");
        scanf("%f", &salario);
        salarioreaj = salario + (salario * percreaj/100);
        printf("O salario reajustado e: %f \n\n", salarioreaj);
        if ( salarioreaj > maiorsal);
        maiorsal = salarioreaj;
    }
    printf("O maior salario resjustado e: %f \n", maiorsal);
    return 0;
}
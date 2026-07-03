/* Desafio 9: Lógica de Programação - Contador de Vogais
Complete as lacunas para contar vogais (a e i o u) em sequência de letras até '.'.
Use while e switch. Corrija labels dos printf.
Compile com: gcc desafio_9.c -o desafio_9 && desafio_9.exe
*/

#include <stdio.h>
#include <stdlib.h>
int main()
{
    char letra;
    int conta=0, conte=0, conti=0, conto=0, contu=0;
    printf("Digite uma letra minúscula (a..z) a cada linha e tecle ENTER ( . para parar): \n");
    scanf("%c",&letra);
    
    /* COMPLETE AQUI: Loop while até letra == '.' */
    while (letra != '.')
    {
        /* COMPLETE AQUI: Switch para vogais */
        switch (letra)
        {
            case 'a':
                conta++; break;
            case 'e':
                conte++; break;
            case 'i':
                conti++; break;
            case 'o':
                conto++; break;
            case 'u':
                contu++; break;
        }
        scanf("%c",&letra);
    }
    
    printf("Total de a's: %d \n",conta);
    printf("Total de e's: %d \n",conte);
    printf("Total de i's: %d \n",conti);
    printf("Total de o's: %d \n",conto);
    printf("Total de u's: %d \n",contu);
    return 0;
}

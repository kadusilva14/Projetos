import java.util.Scanner;

public class Main {

    public static void main(String[] args) {
        var scanner = new Scanner(System.in);
        System.out.println("Entre com um numero:");
        var num = scanner.nextInt();
        System.out.println("Entre com outro numero maior que o primeiro:");
        var secnum = scanner.nextInt();
        if ( secnum < num ){
            System.out.println("Erro: O segundo numero deve ser maior que o primeiro");
            return;
        }
        System.out.println("Escolha 1 para Par e 2 para Impar");
        var parImpar = scanner.nextInt();

        for (int i=secnum;i >=num; i--){
            if (parImpar == 1 && i %2 == 0) {
                System.out.printf("%s \n", i);
            }else if (parImpar == 2 && i % 2 !=0 ) {
                System.out.printf("%s \n", i);
            }
            }
            }

    }

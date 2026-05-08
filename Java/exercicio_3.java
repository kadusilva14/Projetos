import java.util.Scanner;

public class Main {

     public static void main(String[] args) {
         var baseYear = 2026;
         var scanner = new Scanner(System.in);
         System.out.println("Informe o valor da base do Retangulo:");
         var base = scanner.nextInt();
         System.out.println("Informe o valor da altura do Retangulo");
         var altura = scanner.nextInt();
         var area = (base * altura)/2;
         System.out.printf("A area do quadrado e: %s", area);

     }
}


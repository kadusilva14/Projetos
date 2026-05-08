import java.util.Scanner;

public class Main {

     public static void main(String[] args) {
         var baseYear = 2026;
         var scanner = new Scanner(System.in);
         System.out.println("Informe o valor do Lado do quadrado:");
         var lado = scanner.nextInt();
         var area = lado * lado;
         System.out.printf("A area do quadrado e: %s", area);

     }
}


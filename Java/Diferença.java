import java.util.Scanner;

public class Main {

     public static void main(String[] args) {
         var baseYear = 2026;
         var scanner = new Scanner(System.in);
         System.out.println("Informe a idade da 1 pessoa:");
         var ps1 = scanner.nextInt();
         System.out.println("Informe a idade da 2 pessoa");
         var ps2 = scanner.nextInt();
         var dif = ps1 - ps2;
         System.out.printf("A diferenca da idade entre as 2 pessoas e de %s anos.", dif);

     }
}


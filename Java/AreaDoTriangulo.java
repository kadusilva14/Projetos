import java.util.Scanner;

public class Main {

     public static void main(String[] args) {
         var baseYear = 2026;
         var scanner = new Scanner(System.in);
         System.out.println("Informe o valor da base do Triângulo:");
         var base = scanner.nextInt();
         System.out.println("Informe o valor da altura do Triângulo");
         var altura = scanner.nextInt();
         var area = (base * altura)/2;
         System.out.printf("A area do triângulo e: %s", area);

     }
}


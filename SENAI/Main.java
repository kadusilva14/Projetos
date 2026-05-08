import java.util.Scanner;

public class Main {
    static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Escreva sua altura (em centímetros): ");
        int alt = scanner.nextInt();
        if ( alt >= 140 ){
            System.out.println("Acesso Liberado! Divirta-se!");
        } else {
            System.out.println("Poxa, você ainda não tem altura suficiente para este brinquedo.");
        }
scanner.close();
    }
}

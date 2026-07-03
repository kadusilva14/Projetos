import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.printf("Escreva seu nome e sua idade: \n");
        String entrada = scanner.nextLine();
        String[] partes = entrada.split(" ");
        String name = partes[0];
        int age = Integer.parseInt(partes[1]);

        if (!name.isEmpty() && age >= 18) {
            System.out.println("Cadastro aprovado");
        } else {
            System.out.println("Cadastro reprovado");
        }
    }
}
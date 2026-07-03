import java.util.Scanner;

public class Main {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        double salgado = 5.00;
        double suco = 3.00;
        System.out.println("Digite seu nome");
        String nome = scanner.nextLine();
        System.out.println("Digite quantos salgados e quantos sucos voce consumiu: ");
        String qtd = scanner.nextLine();
        String [] dif = qtd.split(" ");
        int qtdSalgado = Integer.parseInt(dif[0]);
        int qtdSuco = Integer.parseInt(dif[1]);
        double totCompra = (salgado * qtdSalgado) + (suco * qtdSuco);
        System.out.format("O total da compra e de: " + totCompra);
    }
}
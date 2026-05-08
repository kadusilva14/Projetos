import java.util.Scanner;

public class Senha {

    static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        String senhaCofre = "senha123";
        System.out.println("Tente adivinhar a Senha: ");
        String tentSenha = scanner.next();
        if(!tentSenha.equals(senhaCofre)){
            System.out.println("Alarme! Acesso Negado");
        }else {
            System.out.println("Bem-Vindo ao seu Diario Secreto!");
        }
        scanner.close();
    }
}

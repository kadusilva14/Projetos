import java.util.Scanner;

public class Main {

    public static void main(String[] args) {
        var scanner = new Scanner(System.in);
        System.out.println("Entre com sua Altura:");
        float alt = scanner.nextFloat();
        System.out.printf("Sua altura e: %s \n", alt);
        System.out.println("Entre com seu peso:");
        float peso = scanner.nextFloat();
        System.out.printf("Seu peso e: %s\n", peso);
        float imc = (peso / (alt * alt));
        System.out.printf("Seu IMC e: %s \n", imc);
        if (imc <= 18.5) {
            System.out.printf("Abaixo do Peso");}
        else if (imc >= 18.6 && imc <= 24.9)
            System.out.printf("Peso Ideal");
        else if (imc >= 25.0 && imc <= 29.9){
            System.out.printf("Levemente acima do peso");}
        else if (imc >= 30.0 && imc <= 34.9)
            System.out.printf("Obesidade Grau I");
        else if (imc >= 35.0 && imc <=39.9)
            System.out.printf("Obesidade Grau II (Severa)");
        else if (imc >= 40)
            System.out.printf("Obesidade Grau III (Morbida)");}
        }
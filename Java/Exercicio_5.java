import java.util.Scanner;

public class Main {

    public static void main(String[] args){
        var scanner = new Scanner(System.in);
        System.out.println("Entre com um numero:");
        var num = scanner.nextInt();
        var i=0;
        for (i = 0; i <= 10; i++) {
            var result = num * i;
            System.out.printf("A Tabuada e: %s \n", result);
        }
    }
}
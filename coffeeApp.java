import java.util.Scanner;

interface Coffee {
    void prepare();
}

class Espresso implements Coffee {
    public void prepare() {
        System.out.println("Смилане на еспресо зърната");
        System.out.println("Прави се");
        System.out.println("Сипване на еспресото в чашка");
    }
}

class Cappuccino implements Coffee {
    public void prepare() {
        System.out.println("Смилане на капучино зърната");
        System.out.println("Прави се");
        System.out.println("Сипване на капучиното в чашка");
    }
}

class Americano implements Coffee {
    public void prepare() {
        System.out.println("Смилане на американо зърната");
        System.out.println("Прави се");
        System.out.println("Сипване на американото в чашка");
    }
}

class CoffeeFactory {
    public static Coffee createCoffee(String type) {
        switch (type.toLowerCase()) {
            case "espresso":
                return new Espresso();
            case "cappuccino":
                return new Cappuccino();
            case "americano":
                return new Americano();
            default:
                throw new IllegalArgumentException("Сори пи4,нямаме таковаа кафе: " + type);
        }
    }
}

public class coffeeApp {
    public static void main(String[] args) {
        try (Scanner scanner = new Scanner(System.in)) {
            System.out.println("Добре дошли в нашия кафене!");

            System.out.println("Моля, изберете вид кафе: (espresso/cappuccino/americano)");
            String coffeeType = scanner.nextLine();

            Coffee coffee = CoffeeFactory.createCoffee(coffeeType);

            orderAndMakeCoffee(coffee);
        }
    }

    private static void orderAndMakeCoffee(Coffee coffee) {
        System.out.println("Вашата поръчка: " + coffee.getClass().getSimpleName());
        coffee.prepare();
        System.out.println("Добър апетит!");
    }
}

import java.util.Scanner;
interface Coffee {
    void grindCoffee();
    void makeCoffee();
    void pourIntoCup();
}
class Espresso implements Coffee {
    @Override
    public void grindCoffee() {
        System.out.println("Смилане на еспресо зърната");
    }

    @Override
    public void makeCoffee() {
        System.out.println("Приготвяне на еспресо");
    }

    @Override
    public void pourIntoCup() {
        System.out.println("Сипване на еспресо в чаша");
    }
}
class Cappuccino implements Coffee {
    @Override
    public void grindCoffee() {
        System.out.println("Смилане на капучино зърната");
    }

    @Override
    public void makeCoffee() {
        System.out.println("Приготвяне на капучино");
    }

    @Override
    public void pourIntoCup() {
        System.out.println("Сипване на капучино в чаша");
    }
}

class Americano implements Coffee {
    @Override
    public void grindCoffee() {
        System.out.println("Смилане на американо зърната");
    }

    @Override
    public void makeCoffee() {
        System.out.println("Приготвяне на американо");
    }

    @Override
    public void pourIntoCup() {
        System.out.println("Сипване на американо в чаша");
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
                throw new IllegalArgumentException("Сори пи4,нямаме такова кафе :(: " + type);
        }
    }
}
public class coffeeApp {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Добре дошли в нашия кафене!");
        System.out.println("Моля, изберете вид кафе: (espresso/cappuccino/americano)");
        String coffeeType = scanner.nextLine();

        Coffee coffee = CoffeeFactory.createCoffee(coffeeType);

        orderAndMakeCoffee(coffee);

        scanner.close();
    }

    private static void orderAndMakeCoffee(Coffee coffee) {
        System.out.println("Вашата поръчка: " + coffee.getClass().getSimpleName());
        coffee.grindCoffee();
        coffee.makeCoffee();
        coffee.pourIntoCup();
        System.out.println("Добър апетит!");
    }
}

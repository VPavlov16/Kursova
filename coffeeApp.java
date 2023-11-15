import java.util.Scanner;

// Интерфейс за кафе
interface Coffee {
    void grindCoffee();
    void makeCoffee();
    void pourIntoCup();
}

// Реализация на Espresso
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

// Реализация на Cappuccino
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

// Реализация на Americano
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

// Фабричен клас за създаване на различни видове кафе
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

// Пример за използване на фабричния клас
public class coffeeApp {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Добре дошли в нашия кафене!");

        // Избор на вид кафе
        System.out.println("Моля, изберете вид кафе: (espresso/cappuccino/americano)");
        String coffeeType = scanner.nextLine();

        // Създаване на кафе чрез фабричния клас
        Coffee coffee = CoffeeFactory.createCoffee(coffeeType);

        // Поръчване на кафето и извикване на методите
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

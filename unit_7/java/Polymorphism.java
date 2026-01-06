/**
 * POLYMORPHISM in Java
 * ====================
 * Compare with: ../5_polymorphism.php
 *
 * Polymorphism = Same method name, different behavior
 */

// Base class
class Shape {
    protected String name;

    public Shape(String name) {
        this.name = name;
    }

    // Method to be overridden
    public double calculateArea() {
        return 0;
    }

    public String describe() {
        return "This is a " + name + ".";
    }
}

// Circle class
class Circle extends Shape {
    private double radius;

    public Circle(double radius) {
        super("Circle");
        this.radius = radius;
    }

    @Override
    public double calculateArea() {
        return Math.PI * radius * radius;
    }

    @Override
    public String describe() {
        return super.describe() + " Radius: " + radius;
    }
}

// Rectangle class
class Rectangle extends Shape {
    private double length;
    private double width;

    public Rectangle(double length, double width) {
        super("Rectangle");
        this.length = length;
        this.width = width;
    }

    @Override
    public double calculateArea() {
        return length * width;
    }

    @Override
    public String describe() {
        return super.describe() + " Length: " + length + ", Width: " + width;
    }
}

// Triangle class
class Triangle extends Shape {
    private double base;
    private double height;

    public Triangle(double base, double height) {
        super("Triangle");
        this.base = base;
        this.height = height;
    }

    @Override
    public double calculateArea() {
        return 0.5 * base * height;
    }

    @Override
    public String describe() {
        return super.describe() + " Base: " + base + ", Height: " + height;
    }
}

// Interface example
interface Payable {
    double calculatePay();
    String getPaymentDetails();
}

class FullTimeEmployee implements Payable {
    private String name;
    private double monthlySalary;

    public FullTimeEmployee(String name, double monthlySalary) {
        this.name = name;
        this.monthlySalary = monthlySalary;
    }

    @Override
    public double calculatePay() {
        return monthlySalary;
    }

    @Override
    public String getPaymentDetails() {
        return name + " (Full-Time): Rs. " + calculatePay() + "/month";
    }
}

class PartTimeEmployee implements Payable {
    private String name;
    private double hourlyRate;
    private int hoursWorked;

    public PartTimeEmployee(String name, double hourlyRate, int hoursWorked) {
        this.name = name;
        this.hourlyRate = hourlyRate;
        this.hoursWorked = hoursWorked;
    }

    @Override
    public double calculatePay() {
        return hourlyRate * hoursWorked;
    }

    @Override
    public String getPaymentDetails() {
        return name + " (Part-Time): Rs. " + calculatePay() + " (" + hoursWorked + " hrs)";
    }
}

public class Polymorphism {
    // Function accepting any Shape - demonstrates polymorphism
    public static void printShapeArea(Shape shape) {
        System.out.println(shape.describe() + " | Area: " + String.format("%.2f", shape.calculateArea()));
    }

    public static void main(String[] args) {
        System.out.println("=== POLYMORPHISM IN JAVA ===\n");

        // Method Overriding
        System.out.println("--- 1. Method Overriding (Shapes) ---");
        Shape[] shapes = {
            new Circle(5),
            new Rectangle(10, 6),
            new Triangle(8, 4)
        };

        // Same method call, different results - THIS IS POLYMORPHISM!
        for (Shape shape : shapes) {
            printShapeArea(shape);
        }

        // Interface-based Polymorphism
        System.out.println("\n--- 2. Interface Polymorphism (Payable) ---");
        Payable[] workers = {
            new FullTimeEmployee("Ram Sharma", 50000),
            new PartTimeEmployee("Sita Devi", 500, 80)
        };

        for (Payable worker : workers) {
            System.out.println(worker.getPaymentDetails());
        }
    }
}

/*
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                      POLYMORPHISM: JAVA vs PHP                               ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Feature              │ Java                      │ PHP                       ║
 * ╠══════════════════════╪═══════════════════════════╪═══════════════════════════╣
 * ║ Method override      │ @Override annotation      │ Just redefine method      ║
 * ║ Interface            │ interface Payable { }     │ interface Payable { }     ║
 * ║ Implement interface  │ implements Payable        │ implements Payable        ║
 * ║ Type hinting param   │ Shape shape (required)    │ Shape $shape (optional)   ║
 * ║ Method overloading   │ Supported                 │ Not directly supported    ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Key Similarity: Both support runtime polymorphism via method overriding     ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

/**
 * CLASSES AND OBJECTS in Java
 * ===========================
 * Compare with: ../1_classes_and_objects.php
 */

// Simple Class
class Car {
    // Properties (attributes)
    public String brand;
    public String color;
    public int price;

    // Method
    public String startEngine() {
        return "The " + this.brand + " car engine is starting... Vroom!";
    }

    public String displayInfo() {
        return "Brand: " + brand + ", Color: " + color + ", Price: Rs. " + price;
    }
}

// Class with Constructor
class Student {
    public String name;
    public int rollNo;
    public String course;

    // Constructor
    public Student(String name, int rollNo, String course) {
        this.name = name;
        this.rollNo = rollNo;
        this.course = course;
        System.out.println("Constructor called: Student '" + name + "' created!");
    }

    public String introduce() {
        return "Hi, I am " + name + " (Roll No: " + rollNo + ") studying " + course + ".";
    }
}

// Main class to run the program
public class ClassesAndObjects {
    public static void main(String[] args) {
        System.out.println("=== CLASSES AND OBJECTS IN JAVA ===\n");

        // Creating objects
        Car car1 = new Car();
        car1.brand = "Toyota";
        car1.color = "Red";
        car1.price = 3500000;

        Car car2 = new Car();
        car2.brand = "Honda";
        car2.color = "Blue";
        car2.price = 3200000;

        System.out.println("Car 1: " + car1.displayInfo());
        System.out.println("Car 2: " + car2.displayInfo());
        System.out.println(car1.startEngine());

        System.out.println("\n--- Students ---");
        Student s1 = new Student("Ram Sharma", 101, "BIT");
        Student s2 = new Student("Sita Devi", 102, "BCA");

        System.out.println(s1.introduce());
        System.out.println(s2.introduce());
    }
}

/*
 * ╔═══════════════════════════════════════════════════════════════════════════╗
 * ║                        JAVA vs PHP COMPARISON                             ║
 * ╠═══════════════════════════════════════════════════════════════════════════╣
 * ║ Concept          │ Java                      │ PHP                        ║
 * ╠══════════════════╪═══════════════════════════╪════════════════════════════╣
 * ║ Define class     │ class Car { }             │ class Car { }              ║
 * ║ Create object    │ Car c = new Car();        │ $c = new Car();            ║
 * ║ Access property  │ c.brand                   │ $c->brand                  ║
 * ║ Call method      │ c.startEngine()           │ $c->startEngine()          ║
 * ║ Constructor      │ public Car() { }          │ public function __construct() ║
 * ║ this keyword     │ this.brand                │ $this->brand               ║
 * ║ Data types       │ String, int (required)    │ Not required (dynamic)     ║
 * ║ Semicolon        │ Required                  │ Required                   ║
 * ║ File name        │ Must match class name     │ Any name allowed           ║
 * ╚═══════════════════════════════════════════════════════════════════════════╝
 */

/**
 * PROPERTIES AND METHODS in Java
 * ==============================
 * Compare with: ../2_properties_and_methods.php
 */

class Person {
    // Public property
    public String name;

    // Private property
    private int age;

    // Protected property
    protected String address;

    // Property with default value
    public String country = "Nepal";

    // Constructor
    public Person(String name, int age, String address) {
        this.name = name;
        this.age = age;
        this.address = address;
    }

    // Getter for private property
    public int getAge() {
        return this.age;
    }

    // Setter with validation
    public boolean setAge(int age) {
        if (age > 0 && age < 150) {
            this.age = age;
            return true;
        }
        return false;
    }

    public String getAddress() {
        return this.address;
    }

    public String displayInfo() {
        return "Name: " + name + ", Age: " + age + ", Address: " + address;
    }
}

class Calculator {
    private int result = 0;

    // Method with no parameters
    public String reset() {
        this.result = 0;
        return "Calculator reset to 0";
    }

    // Method with parameters
    public int add(int a, int b) {
        this.result = a + b;
        return this.result;
    }

    // Method overloading (Java supports this, PHP doesn't directly)
    public int multiply(int a) {
        return a * 1;
    }

    public int multiply(int a, int b) {
        this.result = a * b;
        return this.result;
    }

    public int getResult() {
        return this.result;
    }

    // Private method
    private String logOperation(String operation) {
        return "Operation performed: " + operation;
    }

    public String performAddition(int a, int b) {
        int res = a + b;
        String log = logOperation("Addition of " + a + " + " + b);
        return log + " = " + res;
    }
}

public class PropertiesAndMethods {
    public static void main(String[] args) {
        System.out.println("=== PROPERTIES AND METHODS IN JAVA ===\n");

        // Person example
        Person person = new Person("Ram Sharma", 25, "Kathmandu");

        System.out.println("--- Accessing Properties ---");
        System.out.println("Public (name): " + person.name);
        System.out.println("Private via getter (age): " + person.getAge());
        System.out.println("Protected via getter (address): " + person.getAddress());
        System.out.println("Default value (country): " + person.country);

        // This would cause error:
        // System.out.println(person.age);  // Cannot access private

        System.out.println("\n--- Calculator Methods ---");
        Calculator calc = new Calculator();
        System.out.println("add(10, 5) = " + calc.add(10, 5));
        System.out.println("multiply(4, 3) = " + calc.multiply(4, 3));
        System.out.println("multiply(4) overloaded = " + calc.multiply(4));
        System.out.println(calc.performAddition(7, 3));
    }
}

/*
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                    PROPERTIES & METHODS: JAVA vs PHP                         ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Feature              │ Java                      │ PHP                       ║
 * ╠══════════════════════╪═══════════════════════════╪═══════════════════════════╣
 * ║ Public property      │ public String name;       │ public $name;             ║
 * ║ Private property     │ private int age;          │ private $age;             ║
 * ║ Protected property   │ protected String addr;    │ protected $addr;          ║
 * ║ Access property      │ obj.name                  │ $obj->name                ║
 * ║ Getter               │ public int getAge()       │ public function getAge()  ║
 * ║ Setter               │ public void setAge(int a) │ public function setAge($a)║
 * ║ Method overloading   │ Supported                 │ Not directly supported    ║
 * ║ Type declaration     │ Required                  │ Optional (PHP 7+)         ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

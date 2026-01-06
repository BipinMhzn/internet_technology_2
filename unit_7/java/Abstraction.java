/**
 * ABSTRACTION in Java
 * ===================
 * Compare with: ../6_abstraction.php
 *
 * Abstraction = Hiding complexity, showing only essential features
 * Achieved using: Abstract Classes and Interfaces
 */

// Abstract class - cannot be instantiated
abstract class Vehicle {
    protected String brand;
    protected String model;
    protected String fuelType;

    public Vehicle(String brand, String model, String fuelType) {
        this.brand = brand;
        this.model = model;
        this.fuelType = fuelType;
    }

    // Concrete method - has implementation
    public String getInfo() {
        return brand + " " + model + " (" + fuelType + ")";
    }

    // Abstract methods - MUST be implemented by child classes
    public abstract String start();
    public abstract String stop();
    public abstract String getFuelEfficiency();
}

// Concrete class implementing abstract class
class Car extends Vehicle {
    private int numDoors;

    public Car(String brand, String model, String fuelType, int numDoors) {
        super(brand, model, fuelType);
        this.numDoors = numDoors;
    }

    @Override
    public String start() {
        return "The " + brand + " car engine starts with a key turn. Vroom!";
    }

    @Override
    public String stop() {
        return "The " + brand + " car engine stops.";
    }

    @Override
    public String getFuelEfficiency() {
        return "15 km/liter (City), 20 km/liter (Highway)";
    }
}

// Another concrete class
class Motorcycle extends Vehicle {
    private int engineCC;

    public Motorcycle(String brand, String model, String fuelType, int engineCC) {
        super(brand, model, fuelType);
        this.engineCC = engineCC;
    }

    @Override
    public String start() {
        return "The " + brand + " motorcycle starts with a kick. Brum brum!";
    }

    @Override
    public String stop() {
        return "The " + brand + " motorcycle stops.";
    }

    @Override
    public String getFuelEfficiency() {
        return "45 km/liter (City), 55 km/liter (Highway)";
    }
}

// Interface for database operations
interface DatabaseConnection {
    void connect();
    void disconnect();
    String query(String sql);
}

// MySQL implementation
class MySQLConnection implements DatabaseConnection {
    private String host;
    private String database;

    public MySQLConnection(String host, String database) {
        this.host = host;
        this.database = database;
    }

    @Override
    public void connect() {
        System.out.println("Connected to MySQL: " + database + " at " + host);
    }

    @Override
    public void disconnect() {
        System.out.println("Disconnected from MySQL");
    }

    @Override
    public String query(String sql) {
        return "MySQL executing: " + sql;
    }
}

// PostgreSQL implementation
class PostgreSQLConnection implements DatabaseConnection {
    private String host;
    private String database;

    public PostgreSQLConnection(String host, String database) {
        this.host = host;
        this.database = database;
    }

    @Override
    public void connect() {
        System.out.println("Connected to PostgreSQL: " + database + " at " + host);
    }

    @Override
    public void disconnect() {
        System.out.println("Disconnected from PostgreSQL");
    }

    @Override
    public String query(String sql) {
        return "PostgreSQL executing: " + sql;
    }
}

// Multiple interface implementation
interface Printable {
    void printDocument();
}

interface Scannable {
    void scanDocument();
}

class AllInOnePrinter implements Printable, Scannable {
    private String name;

    public AllInOnePrinter(String name) {
        this.name = name;
    }

    @Override
    public void printDocument() {
        System.out.println(name + ": Printing...");
    }

    @Override
    public void scanDocument() {
        System.out.println(name + ": Scanning...");
    }
}

public class Abstraction {
    public static void main(String[] args) {
        System.out.println("=== ABSTRACTION IN JAVA ===\n");

        // Cannot instantiate abstract class:
        // Vehicle v = new Vehicle("Test", "Model", "Petrol"); // Error!

        System.out.println("--- 1. Abstract Class (Vehicle) ---");
        Vehicle car = new Car("Toyota", "Corolla", "Petrol", 4);
        Vehicle bike = new Motorcycle("Honda", "CBR", "Petrol", 650);

        System.out.println(car.getInfo() + " | " + car.start());
        System.out.println(bike.getInfo() + " | " + bike.start());

        System.out.println("\n--- 2. Interface (DatabaseConnection) ---");
        DatabaseConnection mysql = new MySQLConnection("localhost", "school_db");
        DatabaseConnection postgres = new PostgreSQLConnection("localhost", "college_db");

        mysql.connect();
        System.out.println(mysql.query("SELECT * FROM students"));
        mysql.disconnect();

        System.out.println();
        postgres.connect();
        System.out.println(postgres.query("SELECT * FROM teachers"));
        postgres.disconnect();

        System.out.println("\n--- 3. Multiple Interfaces ---");
        AllInOnePrinter printer = new AllInOnePrinter("HP OfficeJet");
        printer.printDocument();
        printer.scanDocument();
    }
}

/*
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                       ABSTRACTION: JAVA vs PHP                               ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Feature              │ Java                      │ PHP                       ║
 * ╠══════════════════════╪═══════════════════════════╪═══════════════════════════╣
 * ║ Abstract class       │ abstract class Vehicle    │ abstract class Vehicle    ║
 * ║ Abstract method      │ public abstract void go();│ abstract public function go();║
 * ║ Interface            │ interface Printable { }   │ interface Printable { }   ║
 * ║ Implement interface  │ implements Printable      │ implements Printable      ║
 * ║ Multiple interfaces  │ implements A, B           │ implements A, B           ║
 * ║ Extend + implement   │ extends X implements Y    │ extends X implements Y    ║
 * ║ Interface constants  │ Supported                 │ Supported                 ║
 * ║ Default methods      │ Supported (Java 8+)       │ Not supported             ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Key Similarity: Abstract classes & interfaces work almost identically!      ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

<?php
/**
 * ABSTRACTION in PHP
 * ==================
 * Abstraction is hiding complex implementation details and showing only
 * the necessary features of an object. It focuses on WHAT an object does
 * rather than HOW it does it.
 *
 * Implemented using:
 * 1. Abstract Classes - Can have both abstract and concrete methods
 * 2. Interfaces - Only method signatures, no implementation
 */

// ==================== EXAMPLE 1: Abstract Class ====================

// Abstract class - cannot be instantiated directly
abstract class Vehicle {
    protected $brand;
    protected $model;
    protected $fuelType;

    public function __construct($brand, $model, $fuelType) {
        $this->brand = $brand;
        $this->model = $model;
        $this->fuelType = $fuelType;
    }

    // Concrete method - has implementation
    public function getInfo() {
        return "{$this->brand} {$this->model} ({$this->fuelType})";
    }

    // Abstract methods - MUST be implemented by child classes
    abstract public function start();
    abstract public function stop();
    abstract public function getFuelEfficiency();
}

// Concrete class implementing abstract class
class Car extends Vehicle {
    private $numDoors;

    public function __construct($brand, $model, $fuelType, $numDoors) {
        parent::__construct($brand, $model, $fuelType);
        $this->numDoors = $numDoors;
    }

    // Must implement all abstract methods
    public function start() {
        return "The {$this->brand} car's engine starts with a key turn. Vroom!";
    }

    public function stop() {
        return "The {$this->brand} car's engine stops. Engine off.";
    }

    public function getFuelEfficiency() {
        return "15 km/liter (City), 20 km/liter (Highway)";
    }

    public function openTrunk() {
        return "Car trunk is now open.";
    }
}

// Another concrete class
class Motorcycle extends Vehicle {
    private $engineCC;

    public function __construct($brand, $model, $fuelType, $engineCC) {
        parent::__construct($brand, $model, $fuelType);
        $this->engineCC = $engineCC;
    }

    public function start() {
        return "The {$this->brand} motorcycle starts with a kick. Brum brum!";
    }

    public function stop() {
        return "The {$this->brand} motorcycle stops. Engine silent.";
    }

    public function getFuelEfficiency() {
        return "45 km/liter (City), 55 km/liter (Highway)";
    }

    public function doWheelie() {
        return "The motorcycle does a wheelie!";
    }
}

// Electric vehicle - different implementation
class ElectricCar extends Vehicle {
    private $batteryCapacity;

    public function __construct($brand, $model, $batteryCapacity) {
        parent::__construct($brand, $model, "Electric");
        $this->batteryCapacity = $batteryCapacity;
    }

    public function start() {
        return "The {$this->brand} electric car silently powers on. Ready to drive.";
    }

    public function stop() {
        return "The {$this->brand} electric car powers off. System shutdown.";
    }

    public function getFuelEfficiency() {
        return "{$this->batteryCapacity} kWh battery, 400 km range per charge";
    }

    public function charge() {
        return "Charging the {$this->brand}... Battery at 100%!";
    }
}

// ==================== EXAMPLE 2: Interfaces ====================

// Interface for database operations
interface DatabaseConnection {
    public function connect();
    public function disconnect();
    public function query($sql);
}

// MySQL implementation
class MySQLConnection implements DatabaseConnection {
    private $host;
    private $database;

    public function __construct($host, $database) {
        $this->host = $host;
        $this->database = $database;
    }

    public function connect() {
        return "Connected to MySQL database '{$this->database}' at {$this->host}";
    }

    public function disconnect() {
        return "Disconnected from MySQL database";
    }

    public function query($sql) {
        return "Executing MySQL query: {$sql}";
    }
}

// PostgreSQL implementation
class PostgreSQLConnection implements DatabaseConnection {
    private $host;
    private $database;

    public function __construct($host, $database) {
        $this->host = $host;
        $this->database = $database;
    }

    public function connect() {
        return "Connected to PostgreSQL database '{$this->database}' at {$this->host}";
    }

    public function disconnect() {
        return "Disconnected from PostgreSQL database";
    }

    public function query($sql) {
        return "Executing PostgreSQL query: {$sql}";
    }
}

// ==================== EXAMPLE 3: Multiple Interfaces ====================

interface Printable {
    public function printDocument();
}

interface Scannable {
    public function scanDocument();
}

interface Faxable {
    public function sendFax($number);
}

// Class implementing multiple interfaces
class AllInOnePrinter implements Printable, Scannable, Faxable {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function printDocument() {
        return "{$this->name}: Printing document...";
    }

    public function scanDocument() {
        return "{$this->name}: Scanning document...";
    }

    public function sendFax($number) {
        return "{$this->name}: Sending fax to {$number}...";
    }
}

// Basic printer only prints
class BasicPrinter implements Printable {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function printDocument() {
        return "{$this->name}: Printing document (basic mode)...";
    }
}

// ==================== DEMONSTRATION ====================
echo "<h1>ABSTRACTION Example</h1>";

// Example 1: Abstract Classes
echo "<h2>1. Abstract Class (Vehicle Example)</h2>";

// This would cause error: Cannot instantiate abstract class
// $vehicle = new Vehicle("Test", "Model", "Petrol");

$car = new Car("Toyota", "Corolla", "Petrol", 4);
$bike = new Motorcycle("Honda", "CBR", "Petrol", 650);
$tesla = new ElectricCar("Tesla", "Model 3", 75);

$vehicles = [$car, $bike, $tesla];

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Vehicle</th><th>Start Action</th><th>Fuel Efficiency</th></tr>";

foreach ($vehicles as $vehicle) {
    echo "<tr>";
    echo "<td>" . $vehicle->getInfo() . "</td>";
    echo "<td>" . $vehicle->start() . "</td>";
    echo "<td>" . $vehicle->getFuelEfficiency() . "</td>";
    echo "</tr>";
}
echo "</table>";

// Example 2: Interfaces
echo "<h2>2. Interface (Database Connection Example)</h2>";

$mysql = new MySQLConnection("localhost", "school_db");
$postgres = new PostgreSQLConnection("localhost", "college_db");

echo "<h3>MySQL:</h3>";
echo "<p>" . $mysql->connect() . "</p>";
echo "<p>" . $mysql->query("SELECT * FROM students") . "</p>";
echo "<p>" . $mysql->disconnect() . "</p>";

echo "<h3>PostgreSQL:</h3>";
echo "<p>" . $postgres->connect() . "</p>";
echo "<p>" . $postgres->query("SELECT * FROM teachers") . "</p>";
echo "<p>" . $postgres->disconnect() . "</p>";

// Example 3: Multiple Interfaces
echo "<h2>3. Multiple Interfaces (Printer Example)</h2>";

$allInOne = new AllInOnePrinter("HP OfficeJet Pro");
$basic = new BasicPrinter("Canon PIXMA");

echo "<h3>All-in-One Printer:</h3>";
echo "<p>" . $allInOne->printDocument() . "</p>";
echo "<p>" . $allInOne->scanDocument() . "</p>";
echo "<p>" . $allInOne->sendFax("01-4123456") . "</p>";

echo "<h3>Basic Printer:</h3>";
echo "<p>" . $basic->printDocument() . "</p>";

echo "<hr>";
echo "<h2>Abstract Class vs Interface</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Feature</th><th>Abstract Class</th><th>Interface</th></tr>";
echo "<tr><td>Methods</td><td>Can have both abstract and concrete methods</td><td>Only method signatures (PHP 8+ allows default methods)</td></tr>";
echo "<tr><td>Properties</td><td>Can have properties</td><td>Can only have constants</td></tr>";
echo "<tr><td>Inheritance</td><td>Single inheritance (extends one class)</td><td>Multiple interfaces (implements many)</td></tr>";
echo "<tr><td>Constructor</td><td>Can have constructor</td><td>Cannot have constructor</td></tr>";
echo "<tr><td>Access Modifiers</td><td>Can use any access modifier</td><td>Methods are implicitly public</td></tr>";
echo "<tr><td>Use Case</td><td>When classes share common behavior</td><td>When classes share capability/contract</td></tr>";
echo "</table>";

echo "<h2>Key Points:</h2>";
echo "<ul>";
echo "<li><strong>Abstract Class:</strong> Use 'abstract' keyword, cannot be instantiated</li>";
echo "<li><strong>Abstract Method:</strong> Declared without implementation, must be implemented by child</li>";
echo "<li><strong>Interface:</strong> Contract that classes must follow</li>";
echo "<li><strong>Multiple Interfaces:</strong> A class can implement multiple interfaces</li>";
echo "<li><strong>Hiding Complexity:</strong> Users don't need to know internal implementation</li>";
echo "</ul>";
?>

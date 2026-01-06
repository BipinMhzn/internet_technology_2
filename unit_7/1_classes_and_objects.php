<?php
/**
 * CLASSES AND OBJECTS in PHP
 * ==========================
 *
 * CLASS: A blueprint/template for creating objects
 *        - Defines properties (data) and methods (functions)
 *        - Like a design plan for a house
 *
 * OBJECT: An instance of a class
 *         - Created from the class blueprint
 *         - Like an actual house built from the plan
 *
 * Syntax:
 *   class ClassName {
 *       // properties and methods
 *   }
 *
 *   $object = new ClassName();
 */

// ==================== EXAMPLE 1: Simple Class ====================

// Define a simple class
class Car {
    // Properties (attributes/variables)
    public $brand;
    public $color;
    public $price;
    private $code;

    public function __construct()
    {
        $this->code = rand(0,9);
    }

    protected function getCode() {
        return $this->code;
    }

    // Method (function inside class)
    public function startEngine() {
        //logic operations
        return "The $this->brand car engine is starting... Vroom!";
    }

    public function displayInfo() {
        return "Brand: $this->brand, Color: $this->color, Price: Rs. $this->price";
    }
}
$car1 = new Car();
$car1->brand = "Toyota";
$car1->color = "Red";
$car1->price = 3500000;
echo $car1->startEngine();
echo $car1->displayInfo();
// ==================== Creating Objects ====================
echo "<h1>Classes and Objects in PHP</h1>";

echo "<h2>1. Creating Objects from Class</h2>";

// Create first object (instance) of Car class
$car1 = new Car();
$car1->brand = "Toyota";
$car1->color = "Red";
$car1->price = 3500000;

// Create second object
$car2 = new Car();
$car2->brand = "Honda";
$car2->color = "Blue";
$car2->price = 3200000;

// Create third object
$car3 = new Car();
$car3->brand = "Suzuki";
$car3->color = "White";
$car3->price = 2800000;

echo "<h3>Three Car Objects Created:</h3>";
echo "<p><strong>Car 1:</strong> " . $car1->displayInfo() . "</p>";
echo "<p><strong>Car 2:</strong> " . $car2->displayInfo() . "</p>";
echo "<p><strong>Car 3:</strong> " . $car3->displayInfo() . "</p>";

echo "<h3>Calling Methods:</h3>";
echo "<p>" . $car1->startEngine() . "</p>";
echo "<p>" . $car2->startEngine() . "</p>";

// ==================== EXAMPLE 2: Class with Constructor ====================
echo "<hr>";
echo "<h2>2. Class with Constructor</h2>";

class Student {
    public $name;
    public $rollNo;
    public $course;
    // Constructor - automatically called when object is created
    public function __construct($name, $rollNo, $course) {
        $this->name = $name;
        $this->rollNo = $rollNo;
        $this->course = $course;
        echo "<p><em>Constructor called: Student '$name' created!</em></p>";
    }
    public function introduce() {
        return "Hi, I am $this->name (Roll No: $this->rollNo) studying $this->course.";
    }
}
$student1 = new Student("Ram Sharma", 101, "BIT");
// Create objects using constructor
$student2 = new Student("Sita Devi", 102, "BCA");
$student3 = new Student("Hari Prasad", 103, "BCSIT");

echo "<h3>Student Introductions:</h3>";
echo "<p>" . $student1->introduce() . "</p>";
echo "<p>" . $student2->introduce() . "</p>";
echo "<p>" . $student3->introduce() . "</p>";

// ==================== EXAMPLE 3: Multiple Objects ====================
echo "<hr>";
echo "<h2>3. Storing Objects in Array</h2>";

class Product {
    public $name;
    public $price;
    public $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getTotalValue() {
        return $this->price * $this->quantity;
    }
}

// Create array of objects
$products = [
    new Product("Laptop", 85000, 5),
    new Product("Mouse", 1500, 20),
    new Product("Keyboard", 2500, 15),
    new Product("Monitor", 25000, 8)
];

echo "<table border='1' cellpadding='8'>";
echo "<tr><th>Product</th><th>Price (Rs.)</th><th>Quantity</th><th>Total Value</th></tr>";

$grandTotal = 0;
foreach ($products as $product) {
    $total = $product->getTotalValue();
    $grandTotal += $total;
    echo "<tr>";
    echo "<td>{$product->name}</td>";
    echo "<td>" . number_format($product->price) . "</td>";
    echo "<td>{$product->quantity}</td>";
    echo "<td>Rs. " . number_format($total) . "</td>";
    echo "</tr>";
}
echo "<tr><td colspan='3'><strong>Grand Total</strong></td><td><strong>Rs. " . number_format($grandTotal) . "</strong></td></tr>";
echo "</table>";

// ==================== EXAMPLE 4: The $this Keyword ====================
echo "<hr>";
echo "<h2>4. The \$this Keyword</h2>";

class Counter {
    public $count = 0;

    public function increment() {
        $this->count++;      // $this refers to current object
        return $this;        // Return $this for method chaining
    }

    public function decrement() {
        $this->count--;
        return $this;
    }

    public function getCount() {
        return $this->count;
    }
}

$counter = new Counter();
echo "<p>Initial count: " . $counter->getCount() . "</p>";

$counter->increment();
$counter->increment();
$counter->increment();
echo "<p>After 3 increments: " . $counter->getCount() . "</p>";

$counter->decrement();
echo "<p>After 1 decrement: " . $counter->getCount() . "</p>";

// Method chaining using $this
echo "<h3>Method Chaining:</h3>";
$counter2 = new Counter();
$counter2->increment()->increment()->increment()->increment()->decrement();
echo "<p>Using method chaining (4 increments, 1 decrement): " . $counter2->getCount() . "</p>";

// ==================== Summary ====================
echo "<hr>";
echo "<h2>Summary</h2>";

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Concept</th><th>Syntax</th><th>Description</th></tr>";
echo "<tr><td>Define Class</td><td><code>class ClassName { }</code></td><td>Creates a blueprint</td></tr>";
echo "<tr><td>Create Object</td><td><code>\$obj = new ClassName();</code></td><td>Creates instance from class</td></tr>";
echo "<tr><td>Access Property</td><td><code>\$obj->propertyName</code></td><td>Get/set object property</td></tr>";
echo "<tr><td>Call Method</td><td><code>\$obj->methodName()</code></td><td>Execute object method</td></tr>";
echo "<tr><td>Constructor</td><td><code>__construct()</code></td><td>Auto-called when object created</td></tr>";
echo "<tr><td>\$this</td><td><code>\$this->property</code></td><td>Refers to current object</td></tr>";
echo "</table>";

echo "<h3>Key Points:</h3>";
echo "<ul>";
echo "<li><strong>Class</strong> = Blueprint/Template (defines structure)</li>";
echo "<li><strong>Object</strong> = Instance (actual thing created from blueprint)</li>";
echo "<li><strong>new</strong> keyword creates an object from a class</li>";
echo "<li><strong>\$this</strong> refers to the current object inside the class</li>";
echo "<li>Multiple objects can be created from one class</li>";
echo "<li>Each object has its own copy of properties</li>";
echo "</ul>";
?>

<?php
/**
 * POLYMORPHISM in PHP
 * ===================
 * Polymorphism means "many forms". It allows objects of different classes
 * to be treated as objects of a common parent class. The same method name
 * can behave differently based on the object calling it.
 *
 * Types of Polymorphism:
 * 1. Method Overriding (Runtime Polymorphism)
 * 2. Interface-based Polymorphism
 */

// ==================== EXAMPLE 1: Method Overriding ====================

// Base class
class Shape {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    // Method to be overridden by child classes
    public function calculateArea() {
        return 0;
    }

    public function describe() {
        return "This is a {$this->name}.";
    }
}

// Child class: Circle
class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        parent::__construct("Circle");
        $this->radius = $radius;
    }

    // Override calculateArea for circle
    public function calculateArea() {
        return pi() * $this->radius * $this->radius;
    }

    public function describe() {
        return parent::describe() . " Radius: {$this->radius}";
    }
}

// Child class: Rectangle
class Rectangle extends Shape {
    private $length;
    private $width;

    public function __construct($length, $width) {
        parent::__construct("Rectangle");
        $this->length = $length;
        $this->width = $width;
    }

    // Override calculateArea for rectangle
    public function calculateArea() {
        return $this->length * $this->width;
    }

    public function describe() {
        return parent::describe() . " Length: {$this->length}, Width: {$this->width}";
    }
}

// Child class: Triangle
class Triangle extends Shape {
    private $base;
    private $height;

    public function __construct($base, $height) {
        parent::__construct("Triangle");
        $this->base = $base;
        $this->height = $height;
    }

    // Override calculateArea for triangle
    public function calculateArea() {
        return 0.5 * $this->base * $this->height;
    }

    public function describe() {
        return parent::describe() . " Base: {$this->base}, Height: {$this->height}";
    }
}

// ==================== EXAMPLE 2: Interface-based Polymorphism ====================

// Interface definition
interface Payable {
    public function calculatePay();
    public function getPaymentDetails();
}

// Class implementing Payable interface
class FullTimeEmployee implements Payable {
    private $name;
    private $monthlySalary;

    public function __construct($name, $monthlySalary) {
        $this->name = $name;
        $this->monthlySalary = $monthlySalary;
    }

    public function calculatePay() {
        return $this->monthlySalary;
    }

    public function getPaymentDetails() {
        return "{$this->name} (Full-Time): Rs. " . $this->calculatePay() . "/month";
    }
}

// Another class implementing same interface differently
class PartTimeEmployee implements Payable {
    private $name;
    private $hourlyRate;
    private $hoursWorked;

    public function __construct($name, $hourlyRate, $hoursWorked) {
        $this->name = $name;
        $this->hourlyRate = $hourlyRate;
        $this->hoursWorked = $hoursWorked;
    }

    public function calculatePay() {
        return $this->hourlyRate * $this->hoursWorked;
    }

    public function getPaymentDetails() {
        return "{$this->name} (Part-Time): Rs. " . $this->calculatePay() . " ({$this->hoursWorked} hrs @ Rs. {$this->hourlyRate}/hr)";
    }
}

// Freelancer also implements Payable
class Freelancer implements Payable {
    private $name;
    private $projectFee;
    private $projectsCompleted;

    public function __construct($name, $projectFee, $projectsCompleted) {
        $this->name = $name;
        $this->projectFee = $projectFee;
        $this->projectsCompleted = $projectsCompleted;
    }

    public function calculatePay() {
        return $this->projectFee * $this->projectsCompleted;
    }

    public function getPaymentDetails() {
        return "{$this->name} (Freelancer): Rs. " . $this->calculatePay() . " ({$this->projectsCompleted} projects @ Rs. {$this->projectFee}/project)";
    }
}

// ==================== DEMONSTRATION ====================
echo "<h1>POLYMORPHISM Example</h1>";

// Example 1: Method Overriding
echo "<h2>1. Method Overriding (Shape Example)</h2>";

// Create different shapes
$shapes = [
    new Circle(5),
    new Rectangle(10, 6),
    new Triangle(8, 4)
];

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Shape</th><th>Description</th><th>Area</th></tr>";

// Same method call, different behavior - THIS IS POLYMORPHISM!
foreach ($shapes as $shape) {
    echo "<tr>";
    echo "<td>" . get_class($shape) . "</td>";
    echo "<td>" . $shape->describe() . "</td>";
    echo "<td>" . number_format($shape->calculateArea(), 2) . " sq units</td>";
    echo "</tr>";
}
echo "</table>";

echo "<p><em>Notice: The same <code>calculateArea()</code> method produces different results based on the object type!</em></p>";

// Example 2: Interface-based Polymorphism
echo "<h2>2. Interface-based Polymorphism (Payable Example)</h2>";

// Create different types of workers
$workers = [
    new FullTimeEmployee("Ram Sharma", 50000),
    new PartTimeEmployee("Sita Devi", 500, 80),
    new Freelancer("Hari Prasad", 15000, 3)
];

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Worker Type</th><th>Payment Details</th><th>Total Pay</th></tr>";

// Process payment for all workers using same interface
foreach ($workers as $worker) {
    echo "<tr>";
    echo "<td>" . get_class($worker) . "</td>";
    echo "<td>" . $worker->getPaymentDetails() . "</td>";
    echo "<td>Rs. " . number_format($worker->calculatePay(), 2) . "</td>";
    echo "</tr>";
}
echo "</table>";

// Function demonstrating polymorphism
echo "<h2>3. Function Accepting Any Shape</h2>";

function printShapeArea(Shape $shape) {
    return "The area of " . strtolower(get_class($shape)) . " is: " . number_format($shape->calculateArea(), 2) . " sq units";
}

echo "<p>" . printShapeArea(new Circle(7)) . "</p>";
echo "<p>" . printShapeArea(new Rectangle(5, 3)) . "</p>";
echo "<p>" . printShapeArea(new Triangle(6, 4)) . "</p>";

echo "<hr>";
echo "<h2>Key Points:</h2>";
echo "<ul>";
echo "<li><strong>Same Interface, Different Implementation:</strong> Objects respond differently to same method call</li>";
echo "<li><strong>Method Overriding:</strong> Child classes redefine parent's method</li>";
echo "<li><strong>Interface Polymorphism:</strong> Different classes implement same interface</li>";
echo "<li><strong>Type Hinting:</strong> Functions can accept parent class/interface as parameter</li>";
echo "<li><strong>Flexibility:</strong> New shapes/workers can be added without changing existing code</li>";
echo "</ul>";
?>

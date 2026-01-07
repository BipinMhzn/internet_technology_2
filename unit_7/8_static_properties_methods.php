<?php
/**
 * STATIC PROPERTIES AND METHODS in PHP
 * =====================================
 * Static members belong to the class itself, NOT to individual objects.
 * They can be accessed WITHOUT creating an instance of the class.
 *
 * Key Concepts:
 * - static keyword: Declares a property or method as static
 * - self:: Used to access static members within the same class
 * - ClassName:: Used to access static members from outside the class
 * - Static properties are shared across ALL instances of the class
 */

// ==================== EXAMPLE 1: Counter Class ====================
class Counter {
    // Static property - shared by all instances
    private static $count = 0;

    // Constructor increments the counter each time an object is created
    public function __construct() {
        self::$count++;
    }

    // Static method to get the count
    public static function getCount() {
        return self::$count;
    }

    // Static method to reset counter
    public static function resetCount() {
        self::$count = 0;
    }
}

// ==================== EXAMPLE 2: Math Utility Class ====================
class MathHelper {
    // Static constant (PHP 7.1+)
    public const PI = 3.14159;

    // Static method - no need to create an object
    public static function add($a, $b) {
        return $a + $b;
    }

    public static function subtract($a, $b) {
        return $a - $b;
    }

    public static function multiply($a, $b) {
        return $a * $b;
    }

    public static function divide($a, $b) {
        if ($b == 0) {
            return "Error: Division by zero!";
        }
        return $a / $b;
    }

    public static function circleArea($radius) {
        return self::PI * $radius * $radius;
    }
}

// ==================== EXAMPLE 3: Database Connection (Singleton Pattern) ====================
class Database {
    // Static property to hold the single instance
    private static $instance = null;
    private static $connectionCount = 0;

    private $connection;

    // Private constructor prevents direct instantiation
    private function __construct() {
        // Simulating database connection
        $this->connection = "Connected to MySQL Database";
        self::$connectionCount++;
    }

    // Static method to get the single instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public static function getConnectionCount() {
        return self::$connectionCount;
    }
}

// ==================== EXAMPLE 4: User Class with Static ID Generator ====================
class User {
    // Static property to auto-generate unique IDs
    private static $lastId = 0;

    // Instance properties
    private $id;
    private $name;
    private $email;

    public function __construct($name, $email) {
        self::$lastId++;           // Increment static counter
        $this->id = self::$lastId; // Assign to instance
        $this->name = $name;
        $this->email = $email;
    }

    // Instance method
    public function getInfo() {
        return "ID: {$this->id}, Name: {$this->name}, Email: {$this->email}";
    }

    // Static method to get total users created
    public static function getTotalUsers() {
        return self::$lastId;
    }

    // Static method to reset ID counter (useful for testing)
    public static function resetIdCounter() {
        self::$lastId = 0;
    }
}

// ==================== EXAMPLE 5: Configuration Class ====================
class Config {
    // Static properties for application settings
    private static $settings = [
        'app_name' => 'My PHP Application',
        'version' => '1.0.0',
        'debug' => true
    ];

    // Static method to get a setting
    public static function get($key) {
        return self::$settings[$key] ?? null;
    }

    // Static method to set a setting
    public static function set($key, $value) {
        self::$settings[$key] = $value;
    }

    // Static method to get all settings
    public static function getAll() {
        return self::$settings;
    }
}

// ==================== DEMONSTRATION ====================
echo "<h1>STATIC PROPERTIES AND METHODS</h1>";

// ----- Example 1: Counter Demo -----
echo "<h2>Example 1: Counter Class</h2>";
echo "<p>Count before creating objects: " . Counter::getCount() . "</p>";

$obj1 = new Counter();
$obj2 = new Counter();
$obj3 = new Counter();

echo "<p>Count after creating 3 objects: " . Counter::getCount() . "</p>";
echo "<p><em>Notice: Static property is shared across all instances!</em></p>";

// ----- Example 2: Math Helper Demo -----
echo "<h2>Example 2: MathHelper Utility Class</h2>";
echo "<p>No object creation needed - call methods directly on the class!</p>";
echo "<ul>";
echo "<li>MathHelper::add(10, 5) = " . MathHelper::add(10, 5) . "</li>";
echo "<li>MathHelper::subtract(10, 5) = " . MathHelper::subtract(10, 5) . "</li>";
echo "<li>MathHelper::multiply(10, 5) = " . MathHelper::multiply(10, 5) . "</li>";
echo "<li>MathHelper::divide(10, 5) = " . MathHelper::divide(10, 5) . "</li>";
echo "<li>MathHelper::PI = " . MathHelper::PI . "</li>";
echo "<li>MathHelper::circleArea(7) = " . MathHelper::circleArea(7) . "</li>";
echo "</ul>";

// ----- Example 3: Singleton Pattern Demo -----
echo "<h2>Example 3: Database Singleton Pattern</h2>";
$db1 = Database::getInstance();
$db2 = Database::getInstance();
$db3 = Database::getInstance();

echo "<p>Called getInstance() 3 times</p>";
echo "<p>Connection count: " . Database::getConnectionCount() . "</p>";
echo "<p>Are \$db1 and \$db2 the same instance? " . ($db1 === $db2 ? "YES" : "NO") . "</p>";
echo "<p><em>Singleton ensures only ONE database connection is created!</em></p>";

// ----- Example 4: User ID Generator Demo -----
echo "<h2>Example 4: Auto-Generated User IDs</h2>";
$user1 = new User("Ram Sharma", "ram@example.com");
$user2 = new User("Sita Thapa", "sita@example.com");
$user3 = new User("Hari Prasad", "hari@example.com");

echo "<ul>";
echo "<li>" . $user1->getInfo() . "</li>";
echo "<li>" . $user2->getInfo() . "</li>";
echo "<li>" . $user3->getInfo() . "</li>";
echo "</ul>";
echo "<p>Total users created: " . User::getTotalUsers() . "</p>";

// ----- Example 5: Configuration Class Demo -----
echo "<h2>Example 5: Application Configuration</h2>";
echo "<p>App Name: " . Config::get('app_name') . "</p>";
echo "<p>Version: " . Config::get('version') . "</p>";
echo "<p>Debug Mode: " . (Config::get('debug') ? 'ON' : 'OFF') . "</p>";

// Update a setting
Config::set('debug', false);
echo "<p>After Config::set('debug', false): " . (Config::get('debug') ? 'ON' : 'OFF') . "</p>";

// ----- Key Differences -----
echo "<hr>";
echo "<h2>Static vs Instance Members</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Feature</th><th>Instance Members</th><th>Static Members</th></tr>";
echo "<tr><td>Access</td><td>\$object->property</td><td>ClassName::property</td></tr>";
echo "<tr><td>Memory</td><td>Each object has its own copy</td><td>Shared by all objects</td></tr>";
echo "<tr><td>Object Required?</td><td>Yes</td><td>No</td></tr>";
echo "<tr><td>Inside Class</td><td>\$this->property</td><td>self::\$property</td></tr>";
echo "<tr><td>Use Case</td><td>Object-specific data</td><td>Shared data, utilities</td></tr>";
echo "</table>";

echo "<hr>";
echo "<h2>When to Use Static Members?</h2>";
echo "<ul>";
echo "<li><strong>Utility/Helper functions:</strong> Math operations, string formatting, validation</li>";
echo "<li><strong>Counters:</strong> Track number of objects created</li>";
echo "<li><strong>Configuration:</strong> Application-wide settings</li>";
echo "<li><strong>Singleton Pattern:</strong> Ensure only one instance (database connections)</li>";
echo "<li><strong>Factory Methods:</strong> Alternative ways to create objects</li>";
echo "<li><strong>Constants:</strong> Values that never change (PI, tax rates)</li>";
echo "</ul>";
?>

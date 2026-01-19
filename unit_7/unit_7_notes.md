# Unit 7: Advanced PHP Concepts - Object-Oriented Programming (OOP)

**Duration:** 6 Hours

## Learning Objectives
- Understand the importance and benefits of using object-oriented programming in PHP
- Learn to create and use classes and objects
- Understand properties and methods and their role in code organization
- Explore advanced OOP concepts: inheritance, encapsulation, and polymorphism
- Understand static properties and methods
- Learn about PHP magic methods
- Apply OOP concepts in practical PHP development

---

## 7.1 Object-Oriented Programming (OOP) in PHP

### What is OOP?

Object-Oriented Programming is a programming paradigm that organizes code around **objects** rather than functions and logic. Objects represent real-world entities with properties (data) and methods (behavior).

---

### Why Use OOP?

**Without OOP (Procedural):**
```php
// Student 1 data
$student1_name = "Ram Sharma";
$student1_roll = 101;
$student1_course = "BIT";

// Student 2 data
$student2_name = "Sita Devi";
$student2_roll = 102;
$student2_course = "BCA";

// Functions for students
function introduce_student($name, $roll, $course) {
    echo "I am $name, Roll: $roll, Course: $course";
}
```

**Problems:**
- Data and functions are separate
- Hard to manage as code grows
- Difficult to maintain
- No code reusability

---

**With OOP:**
```php
class Student {
    public $name;
    public $rollNo;
    public $course;

    public function introduce() {
        return "I am $this->name, Roll: $this->rollNo, Course: $this->course";
    }
}

$student1 = new Student();
$student1->name = "Ram Sharma";
$student1->rollNo = 101;
$student1->course = "BIT";

$student2 = new Student();
$student2->name = "Sita Devi";
$student2->rollNo = 102;
$student2->course = "BCA";
```

**Benefits:**
- Data and functions bundled together
- Code is organized and reusable
- Easy to maintain and extend
- Models real-world entities

---

### Benefits of OOP

1. **Modularity** - Code is organized into separate classes
2. **Reusability** - Classes can be reused in different programs
3. **Maintainability** - Easier to update and fix bugs
4. **Abstraction** - Hide complex implementation details
5. **Security** - Data can be protected using access modifiers

---

### OOP Terminology

| Term | Description | Example |
|------|-------------|---------|
| **Class** | Blueprint/template for creating objects | `class Car { }` |
| **Object** | Instance of a class | `$car = new Car()` |
| **Property** | Variable inside a class | `public $color;` |
| **Method** | Function inside a class | `public function start()` |
| **Constructor** | Special method called when object is created | `__construct()` |
| **$this** | Refers to the current object | `$this->property` |

---

## 7.2 Creating and Using Classes and Objects

### Defining a Class

**Syntax:**
```php
class ClassName {
    // Properties (variables)
    public $property1;
    public $property2;

    // Methods (functions)
    public function methodName() {
        // Code here
    }
}
```

---

### Creating Objects

**Syntax:**
```php
$objectName = new ClassName();
```

---

### Simple Class Example

```php
<?php
class Car {
    // Properties
    public $brand;
    public $color;
    public $price;

    // Method
    public function startEngine() {
        return "The $this->brand car engine is starting... Vroom!";
    }

    public function displayInfo() {
        return "Brand: $this->brand, Color: $this->color, Price: Rs. $this->price";
    }
}

// Create objects
$car1 = new Car();
$car1->brand = "Toyota";
$car1->color = "Red";
$car1->price = 3500000;

$car2 = new Car();
$car2->brand = "Honda";
$car2->color = "Blue";
$car2->price = 3200000;

// Use objects
echo $car1->displayInfo();  // Brand: Toyota, Color: Red, Price: Rs. 3500000
echo $car1->startEngine();  // The Toyota car engine is starting... Vroom!
echo $car2->displayInfo();  // Brand: Honda, Color: Blue, Price: Rs. 3200000
?>
```

**See:** `1_classes_and_objects.php:22-56`

---

### Constructor Method

A **constructor** is a special method that is automatically called when an object is created. It's used to initialize properties.

**Syntax:**
```php
public function __construct($parameter1, $parameter2, ...) {
    // Initialize properties
}
```

**Example:**
```php
<?php
class Student {
    public $name;
    public $rollNo;
    public $course;

    // Constructor
    public function __construct($name, $rollNo, $course) {
        $this->name = $name;
        $this->rollNo = $rollNo;
        $this->course = $course;
    }

    public function introduce() {
        return "Hi, I am $this->name (Roll No: $this->rollNo) studying $this->course.";
    }
}

// Create object using constructor
$student1 = new Student("Ram Sharma", 101, "BIT");
$student2 = new Student("Sita Devi", 102, "BCA");

echo $student1->introduce();  // Hi, I am Ram Sharma (Roll No: 101) studying BIT.
?>
```

**See:** `1_classes_and_objects.php:92-116`

---

### The $this Keyword

`$this` is a reference to the current object. It's used inside methods to access properties and other methods of the same object.

```php
class Counter {
    public $count = 0;

    public function increment() {
        $this->count++;  // $this refers to current object
        return $this;    // Can return $this for method chaining
    }

    public function getCount() {
        return $this->count;
    }
}

$counter = new Counter();
$counter->increment();
$counter->increment();
echo $counter->getCount();  // 2
```

**See:** `1_classes_and_objects.php:167-183`

---

### Multiple Objects from One Class

```php
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

// Create array of product objects
$products = [
    new Product("Laptop", 85000, 5),
    new Product("Mouse", 1500, 20),
    new Product("Keyboard", 2500, 15)
];

foreach ($products as $product) {
    echo $product->name . ": Rs. " . $product->getTotalValue() . "<br>";
}
```

**See:** `1_classes_and_objects.php:122-161`

---

## 7.3 Properties and Methods

### Properties (Class Variables)

Properties are variables that belong to a class. They store the state/data of an object.

**Access Modifiers:**

| Modifier | Accessible From | Use Case |
|----------|----------------|----------|
| `public` | Anywhere (inside class, outside, child classes) | General access needed |
| `private` | Only inside the class | Internal use only, hide data |
| `protected` | Inside the class and child classes | Inheritance scenarios |

---

**Example:**
```php
class Person {
    // Public - accessible from anywhere
    public $name;

    // Private - only accessible inside this class
    private $age;

    // Protected - accessible in this class and child classes
    protected $address;

    // Default value
    public $country = "Nepal";

    public function __construct($name, $age, $address) {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    // Public method to access private property
    public function getAge() {
        return $this->age;
    }

    // Public method to modify private property
    public function setAge($age) {
        if ($age > 0 && $age < 150) {
            $this->age = $age;
        }
    }
}

$person = new Person("Ram Sharma", 25, "Kathmandu");
echo $person->name;      // OK - public
echo $person->getAge();  // OK - using getter
// echo $person->age;    // ERROR - private property
```

**See:** `2_properties_and_methods.php:20-61`

---

### Methods (Class Functions)

Methods define the behavior of objects. They can access and modify properties.

**Types of Methods:**

1. **Instance Methods** - Called on objects
2. **Static Methods** - Called on the class itself
3. **Getter Methods** - Return property values
4. **Setter Methods** - Set property values with validation

---

**Example:**
```php
class Calculator {
    private $result = 0;

    // Method with parameters
    public function add($a, $b) {
        $this->result = $a + $b;
        return $this->result;
    }

    // Method with default parameter
    public function multiply($a, $b = 1) {
        $this->result = $a * $b;
        return $this->result;
    }

    // Getter method
    public function getResult() {
        return $this->result;
    }

    // Method with type hints (PHP 7+)
    public function divide(float $a, float $b): float {
        if ($b == 0) return 0;
        return $a / $b;
    }

    // Private method - only used internally
    private function logOperation($operation) {
        return "Operation: $operation";
    }
}

$calc = new Calculator();
echo $calc->add(10, 5);       // 15
echo $calc->multiply(4, 3);   // 12
echo $calc->divide(20, 4);    // 5
```

**See:** `2_properties_and_methods.php:86-132`

---

### Getters and Setters

Getters and setters provide controlled access to private properties.

**Why use them?**
- Validate data before setting
- Format data when getting
- Protect sensitive information
- Maintain data integrity

---

**Example:**
```php
class BankAccount {
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $balance) {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    // Getter - with security (mask account number)
    public function getAccountNumber() {
        return "****" . substr($this->accountNumber, -4);
    }

    // Getter
    public function getBalance() {
        return $this->balance;
    }

    // No direct setter for balance - use deposit/withdraw instead
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            return "Deposited Rs. $amount";
        }
        return "Invalid amount";
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return "Withdrawn Rs. $amount";
        }
        return "Invalid amount or insufficient balance";
    }
}

$account = new BankAccount("1234567890", 10000);
echo $account->getAccountNumber();  // ****7890
echo $account->deposit(5000);       // Deposited Rs. 5000
echo $account->getBalance();        // 15000
```

**See:** `2_properties_and_methods.php:147-198`

---

### Method Chaining

Method chaining allows calling multiple methods in one line by returning `$this`.

```php
class QueryBuilder {
    private $query = "";

    public function select($columns) {
        $this->query = "SELECT $columns";
        return $this;  // Return $this for chaining
    }

    public function from($table) {
        $this->query .= " FROM $table";
        return $this;
    }

    public function where($condition) {
        $this->query .= " WHERE $condition";
        return $this;
    }

    public function getQuery() {
        return $this->query;
    }
}

// Method chaining
$sql = (new QueryBuilder())
    ->select("name, email")
    ->from("students")
    ->where("age > 18")
    ->getQuery();

echo $sql;  // SELECT name, email FROM students WHERE age > 18
```

**See:** `2_properties_and_methods.php:217-248`

---

## 7.4 Inheritance, Encapsulation, and Polymorphism

### Inheritance

Inheritance allows a class to inherit properties and methods from another class.

**Benefits:**
- Code reusability
- Avoid code duplication
- Create hierarchical relationships
- Easy to extend functionality

---

**Syntax:**
```php
class ChildClass extends ParentClass {
    // Child class code
}
```

---

**Example:**
```php
// Parent class
class Person {
    protected $name;
    protected $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function introduce() {
        return "Hello, I am $this->name, $this->age years old.";
    }
}

// Child class inheriting from Person
class Student extends Person {
    private $studentId;
    private $course;

    public function __construct($name, $age, $studentId, $course) {
        parent::__construct($name, $age);  // Call parent constructor
        $this->studentId = $studentId;
        $this->course = $course;
    }

    // Override parent's method
    public function introduce() {
        return "Hello, I am $this->name, a student of $this->course.";
    }

    // New method specific to Student
    public function study($subject) {
        return "$this->name is studying $subject.";
    }
}

// Usage
$person = new Person("Hari Bahadur", 45);
$student = new Student("Sita Sharma", 18, "STU001", "BCSIT");

echo $person->introduce();   // Hello, I am Hari Bahadur, 45 years old.
echo $student->introduce();  // Hello, I am Sita Sharma, a student of BCSIT.
echo $student->study("PHP"); // Sita Sharma is studying PHP.
```

**See:** `4_inheritance.php`

---

**Key Concepts:**

| Concept | Keyword | Description |
|---------|---------|-------------|
| **Inherit from parent** | `extends` | Child inherits parent's properties/methods |
| **Call parent constructor** | `parent::__construct()` | Initialize parent properties |
| **Call parent method** | `parent::methodName()` | Use parent's version of method |
| **Method Overriding** | Same method name | Child redefines parent's method |

---

**Inheritance Hierarchy Example:**
```
        Person (Parent)
       /    |    \
      /     |     \
  Student Teacher Employee
  (Child)  (Child)  (Child)
```

**See:** `4_inheritance.php:140-176`

---

### Encapsulation

Encapsulation is the bundling of data and methods that operate on that data within a single unit (class), and restricting direct access to some components.

**Benefits:**
- Data protection (cannot modify directly)
- Validation (setters can validate)
- Flexibility (internal implementation can change)
- Security (sensitive data can be masked)

---

**Example:**
```php
class BankAccount {
    // Private properties - cannot be accessed directly
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $balance) {
        $this->accountNumber = $accountNumber;
        $this->setBalance($balance);
    }

    // Getter with security (masked account number)
    public function getAccountNumber() {
        return "****" . substr($this->accountNumber, -4);
    }

    // Getter
    public function getBalance() {
        return $this->balance;
    }

    // Private setter with validation
    private function setBalance($amount) {
        if ($amount < 0) {
            throw new Exception("Balance cannot be negative!");
        }
        $this->balance = $amount;
    }

    // Public method to deposit
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            return "Deposited Rs. $amount";
        }
        return "Invalid amount";
    }

    // Public method to withdraw
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return "Withdrawn Rs. $amount";
        }
        return "Insufficient funds";
    }
}

$account = new BankAccount("1234567890", 5000);
echo $account->getAccountNumber();  // ****7890
echo $account->deposit(2000);       // Deposited Rs. 2000
echo $account->withdraw(1500);      // Withdrawn Rs. 1500
// $account->balance = -1000;       // ERROR - private property
```

**See:** `3_encapsulation.php`

---

**Why Encapsulation?**
- **Data Protection:** Private properties cannot be modified directly
- **Validation:** Setters validate data before assignment
- **Flexibility:** Internal implementation can change without affecting external code
- **Security:** Sensitive data like account numbers can be masked

---

### Polymorphism

Polymorphism means "many forms". It allows objects of different classes to be treated as objects of a common parent class. The same method name can behave differently based on the object calling it.

**Types:**
1. Method Overriding (Runtime Polymorphism)
2. Interface-based Polymorphism

---

**Example 1: Method Overriding**

```php
// Base class
class Shape {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function calculateArea() {
        return 0;
    }
}

// Child classes override calculateArea()
class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        parent::__construct("Circle");
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * $this->radius * $this->radius;
    }
}

class Rectangle extends Shape {
    private $length;
    private $width;

    public function __construct($length, $width) {
        parent::__construct("Rectangle");
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea() {
        return $this->length * $this->width;
    }
}

// Same method call, different behavior - POLYMORPHISM!
$shapes = [
    new Circle(5),
    new Rectangle(10, 6)
];

foreach ($shapes as $shape) {
    echo get_class($shape) . " area: " . $shape->calculateArea() . "<br>";
}
// Circle area: 78.5
// Rectangle area: 60
```

**See:** `5_polymorphism.php:17-93`

---

**Example 2: Interface-based Polymorphism**

```php
// Interface definition
interface Payable {
    public function calculatePay();
}

// Different classes implement same interface differently
class FullTimeEmployee implements Payable {
    private $monthlySalary;

    public function __construct($monthlySalary) {
        $this->monthlySalary = $monthlySalary;
    }

    public function calculatePay() {
        return $this->monthlySalary;
    }
}

class PartTimeEmployee implements Payable {
    private $hourlyRate;
    private $hoursWorked;

    public function __construct($hourlyRate, $hoursWorked) {
        $this->hourlyRate = $hourlyRate;
        $this->hoursWorked = $hoursWorked;
    }

    public function calculatePay() {
        return $this->hourlyRate * $this->hoursWorked;
    }
}

// Process payment for any Payable object
function processPayment(Payable $worker) {
    return "Payment: Rs. " . $worker->calculatePay();
}

$fullTime = new FullTimeEmployee(50000);
$partTime = new PartTimeEmployee(500, 80);

echo processPayment($fullTime);  // Payment: Rs. 50000
echo processPayment($partTime);  // Payment: Rs. 40000
```

**See:** `5_polymorphism.php:98-162`

---

## 7.5 Static Properties and Methods

Static members belong to the **class itself**, not to individual objects. They can be accessed WITHOUT creating an instance.

**Key Concepts:**
- `static` keyword declares a member as static
- `self::` accesses static members within the same class
- `ClassName::` accesses static members from outside
- Static properties are shared across ALL instances

---

### Static Properties

```php
class Counter {
    private static $count = 0;

    public function __construct() {
        self::$count++;  // Increment each time object is created
    }

    public static function getCount() {
        return self::$count;
    }
}

echo Counter::getCount();  // 0 (no objects created yet)

$obj1 = new Counter();
$obj2 = new Counter();
$obj3 = new Counter();

echo Counter::getCount();  // 3
```

**See:** `8_static_properties_methods.php:16-34`

---

### Static Methods

Static methods can be called without creating an object.

```php
class MathHelper {
    public const PI = 3.14159;

    public static function add($a, $b) {
        return $a + $b;
    }

    public static function multiply($a, $b) {
        return $a * $b;
    }

    public static function circleArea($radius) {
        return self::PI * $radius * $radius;
    }
}

// Call without creating object
echo MathHelper::add(10, 5);        // 15
echo MathHelper::multiply(4, 3);    // 12
echo MathHelper::circleArea(7);     // 153.94
echo MathHelper::PI;                // 3.14159
```

**See:** `8_static_properties_methods.php:37-64`

---

### Practical Uses of Static

#### 1. Utility/Helper Classes

```php
class StringHelper {
    public static function capitalize($str) {
        return ucfirst(strtolower($str));
    }

    public static function truncate($str, $length) {
        return substr($str, 0, $length) . '...';
    }
}

echo StringHelper::capitalize("hello world");
```

#### 2. Counters

```php
class User {
    private static $lastId = 0;
    private $id;

    public function __construct($name) {
        self::$lastId++;
        $this->id = self::$lastId;
    }

    public static function getTotalUsers() {
        return self::$lastId;
    }
}

$user1 = new User("Ram");
$user2 = new User("Sita");
echo User::getTotalUsers();  // 2
```

**See:** `8_static_properties_methods.php:99-129`

#### 3. Configuration

```php
class Config {
    private static $settings = [
        'app_name' => 'My App',
        'version' => '1.0.0'
    ];

    public static function get($key) {
        return self::$settings[$key] ?? null;
    }

    public static function set($key, $value) {
        self::$settings[$key] = $value;
    }
}

echo Config::get('app_name');  // My App
Config::set('debug', true);
```

**See:** `8_static_properties_methods.php:132-154`

#### 4. Singleton Pattern

Ensures only ONE instance of a class exists.

```php
class Database {
    private static $instance = null;

    // Private constructor prevents direct instantiation
    private function __construct() {
        // Connect to database
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$db1 = Database::getInstance();
$db2 = Database::getInstance();

var_dump($db1 === $db2);  // true (same instance)
```

**See:** `8_static_properties_methods.php:67-96`

---

### Static vs Instance Members

| Feature | Instance Members | Static Members |
|---------|-----------------|----------------|
| **Access** | `$object->property` | `ClassName::property` |
| **Memory** | Each object has its own copy | Shared by all objects |
| **Object Required?** | Yes | No |
| **Inside Class** | `$this->property` | `self::$property` |
| **Use Case** | Object-specific data | Shared data, utilities |

---

## 7.6 Magic Methods

Magic methods are special methods that start with double underscores (`__`). They are automatically called in certain situations.

### Common Magic Methods

| Method | Description | Called When |
|--------|-------------|-------------|
| `__construct()` | Constructor | Object is created |
| `__destruct()` | Destructor | Object is destroyed |
| `__toString()` | String representation | Object is used as string |
| `__get($name)` | Get inaccessible property | Accessing undefined property |
| `__set($name, $value)` | Set inaccessible property | Setting undefined property |
| `__call($name, $args)` | Call inaccessible method | Calling undefined method |
| `__clone()` | Clone object | Object is cloned |

---

**Example:**
```php
class Product {
    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
        echo "Product created: $name<br>";
    }

    public function __destruct() {
        echo "Product destroyed: {$this->name}<br>";
    }

    public function __toString() {
        return "{$this->name} - Rs. {$this->price}";
    }

    public function __get($property) {
        if ($property === 'discountedPrice') {
            return $this->price * 0.9;  // 10% discount
        }
        return "Property not found";
    }
}

$product = new Product("Laptop", 85000);
echo $product;  // Calls __toString(): Laptop - Rs. 85000
echo $product->discountedPrice;  // Calls __get(): 76500
// When script ends, __destruct() is called automatically
```

---

## 7.7 Practical Applications of OOP in PHP Development

### Example 1: E-commerce Product Management

```php
class Product {
    private $id;
    private $name;
    private $price;
    private $stock;

    public function __construct($id, $name, $price, $stock) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function isAvailable() {
        return $this->stock > 0;
    }

    public function purchase($quantity) {
        if ($quantity > $this->stock) {
            return "Insufficient stock!";
        }
        $this->stock -= $quantity;
        return "Purchased $quantity {$this->name}(s)";
    }

    public function getTotal($quantity) {
        return $this->price * $quantity;
    }
}

$laptop = new Product(1, "Laptop", 85000, 10);
echo $laptop->purchase(2);  // Purchased 2 Laptop(s)
echo $laptop->getTotal(2);  // 170000
```

---

### Example 2: User Authentication System

```php
class User {
    private $username;
    private $password;
    private $role;

    public function __construct($username, $password, $role = 'user') {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->role = $role;
    }

    public function authenticate($inputPassword) {
        return password_verify($inputPassword, $this->password);
    }

    public function hasPermission($requiredRole) {
        return $this->role === $requiredRole;
    }

    public function getUsername() {
        return $this->username;
    }
}

$user = new User("admin", "admin123", "admin");

if ($user->authenticate("admin123")) {
    if ($user->hasPermission("admin")) {
        echo "Welcome, Admin!";
    }
}
```

---

### Example 3: Logger Class

```php
class Logger {
    private static $instance = null;
    private $logFile;

    private function __construct() {
        $this->logFile = "app.log";
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function log($message, $level = "INFO") {
        $timestamp = date("Y-m-d H:i:s");
        $entry = "[$timestamp] [$level] $message\n";
        file_put_contents($this->logFile, $entry, FILE_APPEND);
    }
}

$logger = Logger::getInstance();
$logger->log("User logged in", "INFO");
$logger->log("Database connection failed", "ERROR");
```

---

## Summary

### Key Takeaways

1. **OOP Benefits**
   - Modularity, reusability, maintainability
   - Models real-world entities
   - Better code organization

2. **Classes and Objects**
   - Class = Blueprint
   - Object = Instance created from class
   - Use `new` keyword to create objects

3. **Properties and Methods**
   - **public** - accessible everywhere
   - **private** - only inside class
   - **protected** - class and child classes
   - Use getters/setters for controlled access

4. **Inheritance**
   - Child class inherits from parent
   - Use `extends` keyword
   - Call parent constructor with `parent::__construct()`
   - Override methods for custom behavior

5. **Encapsulation**
   - Bundle data and methods together
   - Restrict direct access to data
   - Validate input through setters

6. **Polymorphism**
   - Same interface, different implementations
   - Method overriding
   - Interface-based polymorphism

7. **Static Members**
   - Belong to class, not objects
   - Access with `ClassName::member`
   - Use for utilities, counters, configs

---

## Practice Exercises

1. Create a `Library` system with:
   - `Book` class (title, author, ISBN, available)
   - `Member` class (name, memberId, borrowedBooks)
   - Methods to borrow and return books

2. Build a `ShoppingCart` system:
   - `Product` class
   - `Cart` class with add/remove/total methods
   - Apply discounts based on quantity

3. Implement a `BankAccount` hierarchy:
   - Base `Account` class
   - `SavingsAccount` (interest calculation)
   - `CheckingAccount` (overdraft limit)

4. Create a `Shape` calculator:
   - Abstract `Shape` class
   - `Circle`, `Rectangle`, `Triangle` classes
   - Calculate area and perimeter
   - Use polymorphism

5. Design a `User Management` system:
   - `User` base class
   - `Admin`, `Moderator`, `Guest` child classes
   - Role-based permissions
   - Authentication methods

---

## Code Examples Reference

- **1_classes_and_objects.php** - Classes, objects, constructor, $this
- **2_properties_and_methods.php** - Access modifiers, getters/setters, method chaining
- **3_encapsulation.php** - Data protection, validation example
- **4_inheritance.php** - Parent-child relationships, method overriding
- **5_polymorphism.php** - Method overriding, interface-based polymorphism
- **6_abstraction.php** - Abstract classes and methods
- **7_oop_combined_example.php** - Complete OOP application
- **8_static_properties_methods.php** - Static members, singleton pattern
- **ecommerce.php** - E-commerce example
- **logger.php** - Logger class example
- **student_management.php** - Student management system

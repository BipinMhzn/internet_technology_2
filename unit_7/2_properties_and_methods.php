<?php
/**
 * PROPERTIES AND METHODS in PHP
 * =============================
 *
 * PROPERTIES: Variables inside a class (also called attributes/fields)
 * METHODS: Functions inside a class (define behavior)
 *
 * ACCESS MODIFIERS:
 *   public    - Accessible from anywhere
 *   private   - Accessible only within the class
 *   protected - Accessible within class and child classes
 */

// ==================== EXAMPLE 1: Properties ====================
echo "<h1>Properties and Methods in PHP</h1>";

echo "<h2>1. Properties (Class Variables)</h2>";

class Person {
    // Public property - accessible from anywhere
    public $name;

    // Private property - only accessible inside this class
    private $age;

    // Protected property - accessible in this class and child classes
    protected $address;

    // Property with default value
    public $country = "Nepal";

    // Constructor to initialize properties
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
            return true;
        }
        return false;
    }

    public function getAddress() {
        return $this->address;
    }

    public function displayInfo() {
        return "Name: {$this->name}, Age: {$this->age}, Address: {$this->address}, Country: {$this->country}";
    }
}

$person = new Person("Ram Sharma", 25, "Kathmandu");

echo "<h3>Accessing Properties:</h3>";
echo "<p><strong>Public property (\$name):</strong> " . $person->name . "</p>";
echo "<p><strong>Private via getter (\$age):</strong> " . $person->getAge() . "</p>";
echo "<p><strong>Protected via getter (\$address):</strong> " . $person->getAddress() . "</p>";
echo "<p><strong>Default value (\$country):</strong> " . $person->country . "</p>";

// This would cause error: Cannot access private property
// echo $person->age;

// This would cause error: Cannot access protected property
// echo $person->address;

echo "<h3>Modifying Properties:</h3>";
$person->name = "Ram Kumar Sharma";  // Public - can modify directly
$person->setAge(26);                  // Private - modify through setter
echo "<p>After modification: " . $person->displayInfo() . "</p>";

// ==================== EXAMPLE 2: Methods ====================
echo "<hr>";
echo "<h2>2. Methods (Class Functions)</h2>";

class Calculator {
    private $result = 0;

    // Method with no parameters
    public function reset() {
        $this->result = 0;
        return "Calculator reset to 0";
    }

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

    // Method returning value
    public function getResult() {
        return $this->result;
    }

    // Method with type hints (PHP 7+)
    public function divide(float $a, float $b): float {
        if ($b == 0) {
            return 0;
        }
        $this->result = $a / $b;
        return $this->result;
    }

    // Private method - only used internally
    private function logOperation($operation) {
        return "Operation performed: $operation";
    }

    // Public method that uses private method
    public function performAddition($a, $b) {
        $result = $a + $b;
        $log = $this->logOperation("Addition of $a + $b");
        return "$log = $result";
    }
}

$calc = new Calculator();

echo "<h3>Calling Methods:</h3>";
echo "<p>add(10, 5) = " . $calc->add(10, 5) . "</p>";
echo "<p>multiply(4, 3) = " . $calc->multiply(4, 3) . "</p>";
echo "<p>multiply(4) with default = " . $calc->multiply(4) . "</p>";
echo "<p>divide(20, 4) = " . $calc->divide(20, 4) . "</p>";
echo "<p>performAddition(7, 3): " . $calc->performAddition(7, 3) . "</p>";

// ==================== EXAMPLE 3: Getters and Setters ====================
echo "<hr>";
echo "<h2>3. Getters and Setters</h2>";

class BankAccount {
    private $accountNumber;
    private $balance;
    private $ownerName;

    public function __construct($accountNumber, $ownerName, $initialBalance = 0) {
        $this->accountNumber = $accountNumber;
        $this->ownerName = $ownerName;
        $this->balance = $initialBalance;
    }

    // Getter for accountNumber (read-only, masked)
    public function getAccountNumber() {
        return "****" . substr($this->accountNumber, -4);
    }

    // Getter for balance
    public function getBalance() {
        return $this->balance;
    }

    // Getter for ownerName
    public function getOwnerName() {
        return $this->ownerName;
    }

    // Setter for ownerName with validation
    public function setOwnerName($name) {
        if (strlen(trim($name)) >= 2) {
            $this->ownerName = trim($name);
            return true;
        }
        return false;
    }

    // No direct setter for balance - use deposit/withdraw instead
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            return "Deposited Rs. $amount. New balance: Rs. {$this->balance}";
        }
        return "Invalid deposit amount";
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return "Withdrawn Rs. $amount. Remaining: Rs. {$this->balance}";
        }
        return "Invalid withdrawal amount or insufficient balance";
    }
}

$account = new BankAccount("1234567890", "Sita Sharma", 10000);

echo "<h3>Using Getters:</h3>";
echo "<p>Account: " . $account->getAccountNumber() . "</p>";
echo "<p>Owner: " . $account->getOwnerName() . "</p>";
echo "<p>Balance: Rs. " . $account->getBalance() . "</p>";

echo "<h3>Using Setters and Methods:</h3>";
echo "<p>" . $account->deposit(5000) . "</p>";
echo "<p>" . $account->withdraw(3000) . "</p>";
$account->setOwnerName("Sita Devi Sharma");
echo "<p>Updated owner: " . $account->getOwnerName() . "</p>";

// ==================== EXAMPLE 4: Method Chaining ====================
echo "<hr>";
echo "<h2>4. Method Chaining (Fluent Interface)</h2>";

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

    public function orderBy($column, $direction = "ASC") {
        $this->query .= " ORDER BY $column $direction";
        return $this;
    }

    public function limit($count) {
        $this->query .= " LIMIT $count";
        return $this;
    }

    public function getQuery() {
        return $this->query;
    }
}

$query = new QueryBuilder();

// Method chaining - calling multiple methods in one line
$sql = $query->select("name, email, age")
             ->from("students")
             ->where("age > 18")
             ->orderBy("name")
             ->limit(10)
             ->getQuery();

echo "<p><strong>Generated SQL:</strong></p>";
echo "<pre>$sql</pre>";

// ==================== Access Modifiers Summary ====================
echo "<hr>";
echo "<h2>Access Modifiers Summary</h2>";

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Modifier</th><th>Inside Class</th><th>Child Class</th><th>Outside Class</th><th>Use Case</th></tr>";
echo "<tr><td><code>public</code></td><td>Yes</td><td>Yes</td><td>Yes</td><td>General access needed</td></tr>";
echo "<tr><td><code>private</code></td><td>Yes</td><td>No</td><td>No</td><td>Internal use only, hide data</td></tr>";
echo "<tr><td><code>protected</code></td><td>Yes</td><td>Yes</td><td>No</td><td>Inheritance scenarios</td></tr>";
echo "</table>";

echo "<h2>Key Points:</h2>";
echo "<ul>";
echo "<li><strong>Properties</strong> store data/state of an object</li>";
echo "<li><strong>Methods</strong> define behavior/actions of an object</li>";
echo "<li><strong>public</strong> - accessible everywhere</li>";
echo "<li><strong>private</strong> - accessible only inside the class</li>";
echo "<li><strong>protected</strong> - accessible in class and child classes</li>";
echo "<li><strong>Getters</strong> - methods to read private properties</li>";
echo "<li><strong>Setters</strong> - methods to modify private properties with validation</li>";
echo "<li><strong>Method Chaining</strong> - return \$this to chain method calls</li>";
echo "</ul>";
?>

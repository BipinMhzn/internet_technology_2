<?php
/**
 * ENCAPSULATION in PHP
 * ====================
 * Encapsulation is the bundling of data (properties) and methods that operate
 * on that data within a single unit (class), and restricting direct access
 * to some of the object's components.
 *
 * Key Concepts:
 * - Private properties: Can only be accessed within the class
 * - Protected properties: Can be accessed within the class and child classes
 * - Public properties: Can be accessed from anywhere
 * - Getter/Setter methods: Controlled access to private properties
 */

class BankAccount {
    // Private properties - cannot be accessed directly from outside
    private $accountNumber;
    private $balance;
    private $ownerName;

    // Constructor to initialize the object
    public function __construct($accountNumber, $ownerName, $initialBalance = 0) {
        $this->accountNumber = $accountNumber;
        $this->ownerName = $ownerName;
        $this->setBalance($initialBalance);
    }

    // Getter for account number (read-only access)
    public function getAccountNumber() {
        // Return masked account number for security
        return "****" . substr($this->accountNumber, -4);
    }

    // Getter for balance
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

    // Getter for owner name
    public function getOwnerName() {
        return $this->ownerName;
    }

    // Setter for owner name with validation
    public function setOwnerName($name) {
        if (empty(trim($name))) {
            throw new Exception("Owner name cannot be empty!");
        }
        $this->ownerName = trim($name);
    }

    // Public method to deposit money
    public function deposit($amount) {
        if ($amount <= 0) {
            return "Deposit amount must be positive!";
        }
        $this->balance += $amount;
        return "Deposited Rs. $amount. New balance: Rs. {$this->balance}";
    }

    // Public method to withdraw money
    public function withdraw($amount) {
        if ($amount <= 0) {
            return "Withdrawal amount must be positive!";
        }
        if ($amount > $this->balance) {
            return "Insufficient funds! Available balance: Rs. {$this->balance}";
        }
        $this->balance -= $amount;
        return "Withdrawn Rs. $amount. Remaining balance: Rs. {$this->balance}";
    }

    // Display account info
    public function getAccountInfo() {
        return "Account: {$this->getAccountNumber()} | Owner: {$this->ownerName} | Balance: Rs. {$this->balance}";
    }
}

// ==================== DEMONSTRATION ====================
echo "<h1>ENCAPSULATION Example</h1>";
echo "<h2>BankAccount Class Demo</h2>";

// Create a new bank account
$account = new BankAccount("1234567890", "Ram Sharma", 5000);

echo "<h3>Initial Account Info:</h3>";
echo "<p>" . $account->getAccountInfo() . "</p>";

// Try to access private property directly (This would cause an error if uncommented)
// echo $account->balance; // Fatal error: Cannot access private property

// Use public methods instead
echo "<h3>Transactions:</h3>";
echo "<p>" . $account->deposit(2000) . "</p>";
echo "<p>" . $account->withdraw(1500) . "</p>";
echo "<p>" . $account->withdraw(10000) . "</p>"; // Will show insufficient funds

echo "<h3>Final Account Info:</h3>";
echo "<p>" . $account->getAccountInfo() . "</p>";

// Demonstrate getter/setter
echo "<h3>Updating Owner Name:</h3>";
$account->setOwnerName("Ram Kumar Sharma");
echo "<p>Updated owner name: " . $account->getOwnerName() . "</p>";

echo "<hr>";
echo "<h2>Why Encapsulation?</h2>";
echo "<ul>";
echo "<li><strong>Data Protection:</strong> Private properties cannot be modified directly</li>";
echo "<li><strong>Validation:</strong> Setters can validate data before assignment</li>";
echo "<li><strong>Flexibility:</strong> Internal implementation can change without affecting external code</li>";
echo "<li><strong>Security:</strong> Sensitive data like account numbers can be masked</li>";
echo "</ul>";
?>

/**
 * ENCAPSULATION in Java
 * =====================
 * Compare with: ../3_encapsulation.php
 *
 * Encapsulation = Data hiding + bundling data with methods
 */

class BankAccount {
    // Private properties - cannot be accessed directly
    private String accountNumber;
    private double balance;
    private String ownerName;

    // Constructor
    public BankAccount(String accountNumber, String ownerName, double initialBalance) {
        this.accountNumber = accountNumber;
        this.ownerName = ownerName;
        setBalance(initialBalance);
    }

    // Getter - returns masked account number
    public String getAccountNumber() {
        return "****" + accountNumber.substring(accountNumber.length() - 4);
    }

    // Getter for balance
    public double getBalance() {
        return this.balance;
    }

    // Private setter with validation
    private void setBalance(double amount) {
        if (amount < 0) {
            throw new IllegalArgumentException("Balance cannot be negative!");
        }
        this.balance = amount;
    }

    // Getter for owner name
    public String getOwnerName() {
        return this.ownerName;
    }

    // Setter with validation
    public void setOwnerName(String name) {
        if (name == null || name.trim().isEmpty()) {
            throw new IllegalArgumentException("Owner name cannot be empty!");
        }
        this.ownerName = name.trim();
    }

    // Public method to deposit
    public String deposit(double amount) {
        if (amount <= 0) {
            return "Deposit amount must be positive!";
        }
        this.balance += amount;
        return "Deposited Rs. " + amount + ". New balance: Rs. " + this.balance;
    }

    // Public method to withdraw
    public String withdraw(double amount) {
        if (amount <= 0) {
            return "Withdrawal amount must be positive!";
        }
        if (amount > this.balance) {
            return "Insufficient funds! Available: Rs. " + this.balance;
        }
        this.balance -= amount;
        return "Withdrawn Rs. " + amount + ". Remaining: Rs. " + this.balance;
    }

    public String getAccountInfo() {
        return "Account: " + getAccountNumber() + " | Owner: " + ownerName + " | Balance: Rs. " + balance;
    }
}

public class Encapsulation {
    public static void main(String[] args) {
        System.out.println("=== ENCAPSULATION IN JAVA ===\n");

        BankAccount account = new BankAccount("1234567890", "Ram Sharma", 5000);

        System.out.println("Initial Info: " + account.getAccountInfo());

        // Cannot access private properties directly:
        // System.out.println(account.balance);  // Error!

        // Use public methods instead
        System.out.println("\n--- Transactions ---");
        System.out.println(account.deposit(2000));
        System.out.println(account.withdraw(1500));
        System.out.println(account.withdraw(10000));

        System.out.println("\nFinal Info: " + account.getAccountInfo());
    }
}

/*
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                      ENCAPSULATION: JAVA vs PHP                              ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Feature              │ Java                      │ PHP                       ║
 * ╠══════════════════════╪═══════════════════════════╪═══════════════════════════╣
 * ║ Private property     │ private double balance;   │ private $balance;         ║
 * ║ Getter method        │ public double getBalance()│ public function getBalance()║
 * ║ Setter method        │ public void setName(String)│ public function setName($n)║
 * ║ Access private       │ this.balance              │ $this->balance            ║
 * ║ Throw exception      │ throw new Exception()     │ throw new Exception()     ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Key Similarity: Both use private + getters/setters for data protection      ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

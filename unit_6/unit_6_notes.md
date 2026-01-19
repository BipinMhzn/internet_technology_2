# Unit 6: Working with Database

**Duration:** 8 Hours

## Learning Objectives
- Understand the importance of using databases in PHP applications
- Learn to connect PHP applications to MySQL database using MySQLi
- Acquire skills in executing SQL queries dynamically
- Perform CRUD operations (Create, Read, Update, Delete)
- Implement user registration and login systems
- Explore transaction management for data consistency

---

## 6.1 Introduction to MySQL Database Management System

### What is a Database?

A database is an organized collection of structured data stored electronically. It allows efficient storage, retrieval, and management of data.

### Why Use Databases in PHP?

Without databases:
- Data is lost when the script ends
- Cannot handle large amounts of data
- Data cannot be shared across pages
- No persistent storage

With databases:
- Permanent data storage
- Efficient data retrieval
- Handle millions of records
- Support for complex queries
- Data security and integrity

---

### MySQL Overview

**MySQL** is a popular open-source relational database management system (RDBMS).

**Features:**
- Free and open-source
- Fast and reliable
- Easy to use
- Supports large databases
- Cross-platform compatibility
- Works well with PHP

---

### Database Terminology

| Term | Description | Example |
|------|-------------|---------|
| **Database** | Collection of tables | `studentdb` |
| **Table** | Collection of rows and columns | `students` |
| **Row** | Single record | One student's data |
| **Column** | Field/attribute | `name`, `email`, `age` |
| **Primary Key** | Unique identifier for each row | `id` |
| **Foreign Key** | Links two tables together | `student_id` in grades table |

---

### Creating a Database and Table

**SQL to create database:**
```sql
CREATE DATABASE studentdb;
```

**SQL to create table:**
```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    course VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Column Types:**
- `INT` - Integer numbers
- `VARCHAR(n)` - Variable-length string (max n characters)
- `TEXT` - Long text
- `DATE` - Date (YYYY-MM-DD)
- `TIMESTAMP` - Date and time
- `DECIMAL(10,2)` - Decimal numbers (10 digits, 2 after decimal)

**Constraints:**
- `PRIMARY KEY` - Unique identifier
- `AUTO_INCREMENT` - Automatically increment value
- `NOT NULL` - Cannot be empty
- `UNIQUE` - No duplicate values allowed
- `DEFAULT` - Default value if not provided

---

## 6.2 Connecting PHP with MySQL Database

### MySQLi Extension

PHP provides **MySQLi** (MySQL Improved) extension to interact with MySQL databases.

**Two ways to use MySQLi:**
1. **Procedural** - Using functions (`mysqli_connect()`)
2. **Object-Oriented** - Using objects (`new mysqli()`)

We'll focus on the procedural approach as it's simpler for beginners.

---

### Connecting to MySQL Database

**Syntax:**
```php
mysqli_connect(server, username, password, database);
```

**Example:**

```php
<?php
// Step 1: Define connection variables
$servername = "localhost";  // Usually "localhost"
$username = "root";         // Default username in XAMPP/WAMP
$password = "";             // Default password is blank in XAMPP
$database = "studentdb";    // Database name

// Step 2: Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Step 3: Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully to the database!";

// Step 4: Close connection (when done)
mysqli_close($conn);
?>
```

**See:** `db_connect.php` for complete example

---

### Connection Error Handling

**Bad Practice (exposes sensitive information):**
```php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
```

**Good Practice (production):**
```php
if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    die("Sorry, we're experiencing technical difficulties. Please try again later.");
}
```

---

### Creating a Reusable Connection File

**db_connect.php:**
```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "studentdb";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

**Using in other files:**
```php
<?php
include "db_connect.php";  // Now $conn is available

// Use $conn for queries
// ...

mysqli_close($conn);
?>
```

---

## 6.3 Performing CRUD Operations

CRUD stands for **Create, Read, Update, Delete** - the four basic operations on database data.

---

### CREATE - Inserting Data

**SQL Syntax:**
```sql
INSERT INTO table_name (column1, column2, ...) VALUES (value1, value2, ...);
```

**Example:**

```php
<?php
include "db_connect.php";

// Insert query
$sql = "INSERT INTO students (name, email, course)
        VALUES ('John Doe', 'john@example.com', 'BSc CS')";

// Execute query
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
```

---

**Inserting data from form:**

**insert_form.html:**
```html
<form action="insert.php" method="post">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Course: <input type="text" name="course" required><br>
    <input type="submit" value="Add Student">
</form>
```

**insert.php:**
```php
<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course)
            VALUES ('$name', '$email', '$course')";

    if (mysqli_query($conn, $sql)) {
        echo "Student added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
```

**SECURITY WARNING:** The above code is vulnerable to SQL injection! See section on "Error handling and transaction management" for secure methods.

**See:** `crud/insert.php`

---

### READ - Retrieving Data

**SQL Syntax:**
```sql
SELECT column1, column2 FROM table_name WHERE condition;
```

**Example:**

```php
<?php
include "db_connect.php";

// Select all students
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

// Check if any records found
if (mysqli_num_rows($result) > 0) {
    // Loop through each record
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Course: " . $row['course'] . "<br><br>";
    }
} else {
    echo "No records found";
}

mysqli_close($conn);
?>
```

---

**Displaying data in HTML table:**

```php
<?php
include "db_connect.php";

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<body>
<h2>Student Records</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['course']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php mysqli_close($conn); ?>
```

**See:** `crud/view.php`

---

**Different fetch methods:**

```php
// Associative array (column names as keys)
$row = mysqli_fetch_assoc($result);
echo $row['name'];  // Access by column name

// Numeric array (indexes as keys)
$row = mysqli_fetch_row($result);
echo $row[0];  // Access by index

// Both associative and numeric
$row = mysqli_fetch_array($result);
echo $row['name'];  // or $row[0]
```

---

### UPDATE - Modifying Data

**SQL Syntax:**
```sql
UPDATE table_name SET column1=value1, column2=value2 WHERE condition;
```

**Example:**

```php
<?php
include "db_connect.php";

// Update query
$sql = "UPDATE students
        SET course = 'BSc IT', email = 'newemail@example.com'
        WHERE id = 1";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
```

**IMPORTANT:** Always use a WHERE clause, otherwise ALL records will be updated!

---

**Update form with pre-filled data:**

**edit.php:**
```php
<?php
include "db_connect.php";

$id = $_GET['id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students
            SET name='$name', email='$email', course='$course'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: view.php");
        exit;
    }
}

// Fetch existing data
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$student = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<body>
<h2>Edit Student</h2>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $student['name']; ?>" required><br>
    Email: <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br>
    Course: <input type="text" name="course" value="<?php echo $student['course']; ?>" required><br>
    <input type="submit" value="Update">
</form>

</body>
</html>
```

**See:** `crud/edit.php`

---

### DELETE - Removing Data

**SQL Syntax:**
```sql
DELETE FROM table_name WHERE condition;
```

**Example:**

```php
<?php
include "db_connect.php";

$sql = "DELETE FROM students WHERE id = 5";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
```

**IMPORTANT:** Always use a WHERE clause, otherwise ALL records will be deleted!

---

**Delete with confirmation:**

**delete.php:**
```php
<?php
include "db_connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        header("Location: view.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
```

**In view page (with JavaScript confirmation):**
```php
<a href="delete.php?id=<?php echo $row['id']; ?>"
   onclick="return confirm('Are you sure you want to delete this record?');">
   Delete
</a>
```

**See:** `crud/delete.php`

---

### Complete CRUD Example

**view.php** (List all with edit/delete links)
```php
<?php
include "db_connect.php";
$result = mysqli_query($conn, "SELECT * FROM students");
?>

<table border="1">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Actions</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete?');">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="insert.php">Add New Student</a>
```

**See:** Complete CRUD application in `crud/` directory

---

## 6.4 Executing SQL Queries Using PHP

### mysqli_query()

Executes a single SQL query.

```php
mysqli_query($connection, $query);
```

**Returns:**
- `true/false` for INSERT, UPDATE, DELETE
- Result object for SELECT

---

### Prepared Statements (Secure Method)

Prepared statements prevent SQL injection attacks by separating SQL logic from data.

**Syntax:**
```php
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, $types, $var1, $var2, ...);
mysqli_stmt_execute($stmt);
```

**Parameter Types:**
- `i` - integer
- `d` - double/float
- `s` - string
- `b` - blob (binary data)

**Example - INSERT:**

```php
<?php
$name = "Alice";
$email = "alice@example.com";
$course = "BSc CS";

// Prepare statement
$stmt = mysqli_prepare($conn, "INSERT INTO students (name, email, course) VALUES (?, ?, ?)");

// Bind parameters
mysqli_stmt_bind_param($stmt, "sss", $name, $email, $course);

// Execute
if (mysqli_stmt_execute($stmt)) {
    echo "Record inserted successfully";
}

mysqli_stmt_close($stmt);
?>
```

**Example - SELECT:**

```php
<?php
$course = "BSc CS";

// Prepare statement
$stmt = mysqli_prepare($conn, "SELECT * FROM students WHERE course = ?");

// Bind parameter
mysqli_stmt_bind_param($stmt, "s", $course);

// Execute
mysqli_stmt_execute($stmt);

// Get result
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name'] . "<br>";
}

mysqli_stmt_close($stmt);
?>
```

---

## 6.5 User Registration and Login

### User Registration System

**Step 1: Create users table**

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

**Step 2: Registration Form (register.php)**

```php
<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password (NEVER store plain text passwords!)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $checkQuery = "SELECT * FROM users WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<p>Email already registered!</p>";
    } else {
        // Insert new user
        $insertQuery = "INSERT INTO users (email, password)
                        VALUES ('$email', '$hashedPassword')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "<p>Registration successful! You can now login.</p>";
        } else {
            echo "<p>Error during registration.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Register</h2>
<form method="post">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Register">
</form>
<p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
```

**See:** `login/register.php`

---

**Step 3: Login System (login.php)**

```php
<?php
session_start();
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Find user by email
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user["password"])) {
            // Login successful
            $_SESSION["email"] = $email;
            $_SESSION["user_id"] = $user["id"];

            header("Location: dashboard.php");
            exit;
        } else {
            echo "<p>Invalid email or password!</p>";
        }
    } else {
        echo "<p>Invalid email or password!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Login</h2>
<form method="post">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
<p>New user? <a href="register.php">Register here</a></p>
</body>
</html>
```

**See:** `login/login.php`

---

**Step 4: Protected Dashboard (dashboard.php)**

```php
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Welcome, <?php echo $_SESSION["email"]; ?>!</h2>
<p>This is your dashboard.</p>
<a href="logout.php">Logout</a>
</body>
</html>
```

---

**Step 5: Logout (logout.php)**

```php
<?php
session_start();

session_unset();
session_destroy();

header("Location: login.php");
exit;
?>
```

**See:** Complete login system in `login/` directory

---

### Password Security Best Practices

1. **NEVER store plain text passwords**
   ```php
   // BAD
   $password = $_POST['password'];
   INSERT INTO users (password) VALUES ('$password');

   // GOOD
   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   INSERT INTO users (password) VALUES ('$hashedPassword');
   ```

2. **Use password_verify() to check passwords**
   ```php
   if (password_verify($inputPassword, $hashedPasswordFromDB)) {
       // Correct password
   }
   ```

3. **Enforce strong password requirements**
   - Minimum 8 characters
   - Mix of uppercase, lowercase, numbers, symbols

---

## 6.6 Error Handling and Transaction Management

### SQL Injection Prevention

**What is SQL Injection?**

SQL injection is a security vulnerability where attackers can inject malicious SQL code.

**Example of vulnerable code:**
```php
$email = $_POST['email'];  // User input: ' OR '1'='1
$sql = "SELECT * FROM users WHERE email='$email'";
// Becomes: SELECT * FROM users WHERE email='' OR '1'='1'
// Returns ALL users!
```

---

**How to Prevent:**

#### Method 1: Prepared Statements (Best)

```php
$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
```

#### Method 2: mysqli_real_escape_string()

```php
$email = mysqli_real_escape_string($conn, $_POST['email']);
$sql = "SELECT * FROM users WHERE email='$email'";
```

#### Method 3: Input Validation

```php
// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

// Validate integer
if (!is_numeric($id)) {
    die("Invalid ID");
}
```

---

### Transaction Management

Transactions ensure that multiple database operations either ALL succeed or ALL fail together.

**Use cases:**
- Bank transfers (debit one account, credit another)
- Order processing (decrease stock, create order, process payment)
- User registration (create user, create profile, send email)

---

**ACID Properties:**
- **Atomicity** - All or nothing
- **Consistency** - Database remains in valid state
- **Isolation** - Transactions don't interfere with each other
- **Durability** - Changes are permanent

---

**Transaction Example: Bank Transfer**

**Database:**
```sql
CREATE TABLE accounts (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    balance DECIMAL(10,2)
);

INSERT INTO accounts VALUES (1, 'Alice', 5000);
INSERT INTO accounts VALUES (2, 'Bob', 3000);
```

**PHP Code:**
```php
<?php
$conn = mysqli_connect("localhost", "root", "", "bankdb");

// Start transaction
mysqli_begin_transaction($conn);

try {
    // Step 1: Deduct from Alice's account
    $debit = "UPDATE accounts SET balance = balance - 500 WHERE id = 1";
    if (!mysqli_query($conn, $debit)) {
        throw new Exception("Error debiting account: " . mysqli_error($conn));
    }

    // Step 2: Add to Bob's account
    $credit = "UPDATE accounts SET balance = balance + 500 WHERE id = 2";
    if (!mysqli_query($conn, $credit)) {
        throw new Exception("Error crediting account: " . mysqli_error($conn));
    }

    // If both queries succeed, commit the transaction
    mysqli_commit($conn);
    echo "Transfer successful!";

} catch (Exception $e) {
    // If any query fails, rollback all changes
    mysqli_rollback($conn);
    echo "Transfer failed: " . $e->getMessage();
}

mysqli_close($conn);
?>
```

**See:** `transaction.php`

---

**Transaction Methods:**

| Method | Description |
|--------|-------------|
| `mysqli_begin_transaction()` | Start transaction |
| `mysqli_commit()` | Save all changes |
| `mysqli_rollback()` | Undo all changes |

---

### Error Handling Best Practices

1. **Always check for errors**
   ```php
   if (!mysqli_query($conn, $sql)) {
       echo "Error: " . mysqli_error($conn);
   }
   ```

2. **Use try-catch with transactions**
   ```php
   try {
       // Database operations
       mysqli_commit($conn);
   } catch (Exception $e) {
       mysqli_rollback($conn);
       error_log($e->getMessage());
   }
   ```

3. **Log errors, don't expose them**
   ```php
   // Development
   echo "Error: " . mysqli_error($conn);

   // Production
   error_log("DB Error: " . mysqli_error($conn));
   echo "An error occurred. Please try again later.";
   ```

---

## Summary

### Key Takeaways

1. **MySQL Database**
   - Stores data permanently
   - Organizes data in tables (rows and columns)
   - Uses SQL for queries

2. **Connecting to Database**
   - Use `mysqli_connect()` to connect
   - Always check if connection succeeded
   - Close connection with `mysqli_close()`

3. **CRUD Operations**
   - **Create:** `INSERT INTO table VALUES (...)`
   - **Read:** `SELECT * FROM table WHERE ...`
   - **Update:** `UPDATE table SET ... WHERE ...`
   - **Delete:** `DELETE FROM table WHERE ...`

4. **Security**
   - Use prepared statements to prevent SQL injection
   - Hash passwords with `password_hash()`
   - Verify passwords with `password_verify()`
   - Validate and sanitize user input

5. **Transactions**
   - Group multiple queries together
   - Use `begin_transaction()`, `commit()`, `rollback()`
   - Ensure data consistency

---

## Practice Exercises

1. Create a student management system with:
   - Add student
   - View all students
   - Edit student details
   - Delete student
   - Search students by name or course

2. Build a blog system:
   - User registration and login
   - Create blog posts
   - Edit/delete own posts
   - View all posts
   - Comment on posts

3. Implement an e-commerce product catalog:
   - Add products with name, price, stock
   - View all products
   - Update product details
   - Delete products
   - Search and filter products

4. Create a library management system:
   - Add books
   - Issue books to students
   - Return books
   - Track due dates
   - Calculate late fees (using transactions)

---

## Code Examples Reference

- **db_connect.php** - Database connection
- **execute_queries.php** - CRUD operations examples
- **transaction.php** - Transaction management example
- **crud/** - Complete CRUD application
- **login/** - User registration and login system
- **login_with_role/** - Role-based authentication (admin/student)

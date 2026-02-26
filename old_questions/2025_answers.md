# Internet Technology II (Programming) — 2025 Answers
**Pokhara University | BCSIT III | Spring 2025**
**Full Marks: 100 | Pass Marks: 45 | Time: 3 hrs**

---

# Section "A" — Very Short Answer Questions
*(Attempt all questions. [10×2=20])*

---

## Q1. What is server-side scripting? Give an example.

**Server-side scripting** is the process of running scripts on a web server (not in the browser) to generate dynamic web content. The server processes the script, produces HTML output, and sends it to the client's browser. The client never sees the script source code.

**Example:** PHP is the most common server-side scripting language.

```php
<?php
  $name = "Alice";
  echo "Hello, " . $name . "! Today is " . date("Y-m-d");
?>
```

When a user requests this page, the server runs the PHP code and sends back plain HTML like:
`Hello, Alice! Today is 2025-04-10`

Other examples of server-side scripting languages: Python (Django/Flask), Node.js, Ruby (Rails), ASP.NET.

---

## Q2. Write a ternary operator expression in PHP to return "Pass" or "Fail" based on a mark.

The ternary operator is a shorthand for `if-else`. Syntax: `condition ? value_if_true : value_if_false`

```php
<?php
  $mark = 55;
  $result = ($mark >= 40) ? "Pass" : "Fail";
  echo $result; // Output: Pass
?>
```

**Explanation:**
- If `$mark >= 40` is **true** → returns `"Pass"`
- If `$mark >= 40` is **false** → returns `"Fail"`

---

## Q3. What is the difference between associative and indexed arrays?

| Feature         | Indexed Array                          | Associative Array                        |
|-----------------|----------------------------------------|------------------------------------------|
| **Keys**        | Numeric (0, 1, 2, ...)                 | String keys (named keys)                 |
| **Access**      | `$arr[0]`, `$arr[1]`                   | `$arr["name"]`, `$arr["age"]`            |
| **Use Case**    | Ordered lists                          | Key-value pairs (like records)           |
| **Example**     | `$colors = ["red", "green", "blue"]`   | `$student = ["name" => "Ram", "age" => 20]` |

```php
<?php
// Indexed Array
$fruits = ["Apple", "Banana", "Cherry"];
echo $fruits[0]; // Apple

// Associative Array
$student = ["name" => "Ram", "age" => 20, "grade" => "A"];
echo $student["name"]; // Ram
?>
```

---

## Q4. Define `$_SERVER` super global. Mention one use case.

**`$_SERVER`** is a PHP superglobal array that contains information about the web server environment, HTTP headers, script paths, and other server-related data. It is automatically available in all scopes without needing `global`.

**Common keys:**
- `$_SERVER['PHP_SELF']` — current script filename
- `$_SERVER['REQUEST_METHOD']` — GET or POST
- `$_SERVER['REMOTE_ADDR']` — client's IP address
- `$_SERVER['HTTP_HOST']` — the server hostname

**Use Case — Detect request method:**

```php
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Form was submitted via POST";
} else {
    echo "Page loaded via GET";
}
?>
```

---

## Q5. Write a PHP code to store a logged-in username in a session.

```php
<?php
session_start(); // Always call this before using sessions

// Store username in session after successful login
$_SESSION['username'] = "john_doe";
$_SESSION['logged_in'] = true;

echo "Welcome, " . $_SESSION['username'];
?>
```

**Explanation:**
- `session_start()` must be called at the beginning of every page that uses sessions.
- `$_SESSION` is a superglobal array that persists data across pages for a single user.

---

## Q6. What is the purpose of the `mysqli_connect()` function? Write an example.

**`mysqli_connect()`** is used to establish a connection between a PHP script and a MySQL database server. It returns a connection object on success, or `false` on failure.

**Syntax:** `mysqli_connect(host, username, password, database)`

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully!";
?>
```

**Parameters:**
- `"localhost"` — database server address
- `"root"` — MySQL username
- `""` — password (empty for local development)
- `"mydb"` — database name to connect to

---

## Q7. List any five benefits of using OOP in PHP.

1. **Code Reusability** — Classes and objects can be reused across different parts of the application, reducing duplication.
2. **Encapsulation** — Data and methods are bundled together; internal details are hidden using access modifiers (`private`, `protected`, `public`).
3. **Inheritance** — Child classes can inherit properties and methods from parent classes, promoting code extension without rewriting.
4. **Polymorphism** — The same method name can behave differently in different classes, making code more flexible.
5. **Maintainability** — OOP code is organized into logical units (classes), making it easier to debug, update, and maintain large projects.

*(Bonus: Modularity, Abstraction)*

---

## Q8. What is the main benefit of using a PHP framework like Laravel in your project?

The main benefit of using Laravel (or any PHP framework) is **rapid, structured, and secure web application development**.

**Key advantages:**
- **MVC Architecture** — enforces clean separation of concerns (Model, View, Controller).
- **Built-in Features** — routing, authentication, session management, validation, ORM (Eloquent) are ready to use.
- **Security** — built-in protection against SQL injection, XSS, and CSRF.
- **Code Reusability** — reusable components, middleware, and service providers.
- **Artisan CLI** — command-line tool for generating code, running migrations, etc.
- **Community & Ecosystem** — large community, extensive documentation, and packages (Composer).

In short, Laravel lets developers focus on business logic instead of writing repetitive boilerplate code.

---

## Q9. List any two common input validation techniques in PHP.

**1. Using `filter_var()` function:**
```php
<?php
$email = "test@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email";
}
?>
```

**2. Using `is_numeric()` / `preg_match()` for pattern matching:**
```php
<?php
$age = "25";
if (is_numeric($age) && $age > 0) {
    echo "Valid age";
}

// Using regex for only letters
$name = "Alice";
if (preg_match("/^[a-zA-Z ]+$/", $name)) {
    echo "Valid name";
}
?>
```

Other techniques: `htmlspecialchars()` for XSS prevention, `trim()` to remove whitespace, `isset()` to check if input exists.

---

## Q10. How does the View differ from the Model in MVC architecture?

| Aspect       | Model                                               | View                                                  |
|--------------|-----------------------------------------------------|-------------------------------------------------------|
| **Purpose**  | Manages data, business logic, and database queries  | Handles the presentation/display layer (HTML/UI)      |
| **Contains** | SQL queries, data validation, business rules        | HTML templates, CSS, dynamic content display          |
| **Interacts**| Communicates with the database                      | Communicates with the Controller to display data      |
| **Example**  | `User.php` — fetches/saves user data to DB          | `user_view.php` — displays user profile on screen    |
| **Awareness**| Unaware of how data is displayed                    | Unaware of how data is retrieved                      |

**In short:** The **Model** is the "brain" (data layer), while the **View** is the "face" (presentation layer). The **Controller** connects them.

---
---

# Section "B" — Descriptive Answer Questions
*(Attempt any five questions. [5×10=50])*

---

## Q11. Explain different types of operators in PHP. Write a PHP script using form inputs to perform basic arithmetic calculations.

### Types of Operators in PHP

#### 1. Arithmetic Operators
Used for mathematical calculations.

| Operator | Name           | Example      | Result |
|----------|----------------|--------------|--------|
| `+`      | Addition       | `5 + 3`      | `8`    |
| `-`      | Subtraction    | `5 - 3`      | `2`    |
| `*`      | Multiplication | `5 * 3`      | `15`   |
| `/`      | Division       | `10 / 2`     | `5`    |
| `%`      | Modulus        | `10 % 3`     | `1`    |
| `**`     | Exponentiation | `2 ** 3`     | `8`    |

#### 2. Assignment Operators
Assign values to variables.

| Operator | Example     | Equivalent    |
|----------|-------------|---------------|
| `=`      | `$x = 5`    | Assign 5      |
| `+=`     | `$x += 3`   | `$x = $x + 3` |
| `-=`     | `$x -= 3`   | `$x = $x - 3` |
| `*=`     | `$x *= 3`   | `$x = $x * 3` |
| `/=`     | `$x /= 3`   | `$x = $x / 3` |

#### 3. Comparison Operators
Compare two values; return `true` or `false`.

| Operator | Description              | Example         |
|----------|--------------------------|-----------------|
| `==`     | Equal (value only)       | `5 == "5"` → true |
| `===`    | Identical (value + type) | `5 === "5"` → false |
| `!=`     | Not equal                | `5 != 3` → true  |
| `>`      | Greater than             | `5 > 3` → true   |
| `<`      | Less than                | `3 < 5` → true   |
| `>=`     | Greater than or equal    | `5 >= 5` → true  |

#### 4. Logical Operators
Combine multiple conditions.

| Operator | Description | Example                        |
|----------|-------------|--------------------------------|
| `&&`     | AND         | `true && false` → false        |
| `\|\|`   | OR          | `true \|\| false` → true       |
| `!`      | NOT         | `!true` → false                |

#### 5. String Operators
| Operator | Description   | Example                    |
|----------|---------------|----------------------------|
| `.`      | Concatenation | `"Hello" . " World"` → `"Hello World"` |
| `.=`     | Append        | `$str .= " PHP"`           |

#### 6. Increment/Decrement Operators
| Operator | Description   |
|----------|---------------|
| `++$x`   | Pre-increment |
| `$x++`   | Post-increment|
| `--$x`   | Pre-decrement |
| `$x--`   | Post-decrement|

---

### PHP Script: Arithmetic Calculator Using Form

```php
<!DOCTYPE html>
<html>
<head>
    <title>Arithmetic Calculator</title>
</head>
<body>
    <h2>Arithmetic Calculator</h2>

    <form method="POST" action="">
        <label>First Number:</label>
        <input type="number" name="num1" value="<?= isset($_POST['num1']) ? $_POST['num1'] : '' ?>" required>

        <label>Operator:</label>
        <select name="operator">
            <option value="+">+ Addition</option>
            <option value="-">- Subtraction</option>
            <option value="*">* Multiplication</option>
            <option value="/">&divide; Division</option>
            <option value="%">% Modulus</option>
        </select>

        <label>Second Number:</label>
        <input type="number" name="num2" value="<?= isset($_POST['num2']) ? $_POST['num2'] : '' ?>" required>

        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];
        $result = null;
        $error = '';

        switch ($operator) {
            case '+': $result = $num1 + $num2; break;
            case '-': $result = $num1 - $num2; break;
            case '*': $result = $num1 * $num2; break;
            case '/':
                if ($num2 == 0) {
                    $error = "Error: Division by zero is not allowed!";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            case '%':
                if ($num2 == 0) {
                    $error = "Error: Modulus by zero is not allowed!";
                } else {
                    $result = $num1 % $num2;
                }
                break;
        }

        echo '<div class="result">';
        if ($error) {
            echo "<strong>$error</strong>";
        } else {
            echo "<strong>Result: $num1 $operator $num2 = $result</strong>";
        }
        echo '</div>';
    }
    ?>
</body>
</html>
```

---

## Q12. Explain different types of conditional statements in PHP. Write a PHP program to check whether a number is positive, negative, or zero.

### Types of Conditional Statements in PHP

#### 1. `if` Statement
Executes a block only when condition is true.
```php
if (condition) {
    // code to execute
}
```

#### 2. `if-else` Statement
Executes one block if true, another if false.
```php
if (condition) {
    // if true
} else {
    // if false
}
```

#### 3. `if-elseif-else` Statement
Checks multiple conditions in sequence.
```php
if (condition1) {
    // block 1
} elseif (condition2) {
    // block 2
} else {
    // default block
}
```

#### 4. Ternary Operator
A concise one-line conditional.
```php
$result = (condition) ? "true value" : "false value";
```

#### 5. `switch` Statement
Matches a variable against multiple cases. Better alternative to multiple `if-elseif` chains when comparing one variable to many values.
```php
switch ($variable) {
    case value1:
        // code
        break;
    case value2:
        // code
        break;
    default:
        // code
}
```

#### 6. `match` Expression (PHP 8+)
Similar to switch but returns a value and uses strict comparison.
```php
$result = match($x) {
    1 => "One",
    2 => "Two",
    default => "Other"
};
```

---

### PHP Program: Positive, Negative, or Zero

```php
<!DOCTYPE html>
<html>
<head>
    <title>Number Checker</title>
</head>
<body>
    <h2>Positive / Negative / Zero Checker</h2>

    <form method="POST" action="">
        <label>Enter a Number:</label>
        <input type="number" name="number" step="any"
               value="<?= isset($_POST['number']) ? htmlspecialchars($_POST['number']) : '' ?>"
               required>
        <button type="submit">Check</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $number = $_POST['number'];

        // Using if-elseif-else
        if ($number > 0) {
            echo "<div class='result positive'>The number $number is POSITIVE.</div>";
        } elseif ($number < 0) {
            echo "<div class='result negative'>The number $number is NEGATIVE.</div>";
        } else {
            echo "<div class='result zero'>The number is ZERO.</div>";
        }

        // Also demonstrating ternary (simplified version)
        $label = ($number > 0) ? "positive" : (($number < 0) ? "negative" : "zero");
        echo "<p>Using ternary: $number is $label.</p>";
    }
    ?>
</body>
</html>
```

---

## Q13. Explain the concept of functions in PHP. What are the benefits? Provide examples of user-defined and built-in functions.

### What is a Function?

A **function** is a reusable block of code that performs a specific task. You define it once and call it as many times as needed. Functions can accept **parameters** (inputs) and **return values** (outputs).

**Syntax:**
```php
function functionName($param1, $param2) {
    // code
    return $result;
}
// Call:
$result = functionName(value1, value2);
```

---

### Benefits of Using Functions in PHP

1. **Code Reusability** — Write once, use many times; reduces duplication.
2. **Modularity** — Breaks complex problems into smaller, manageable pieces.
3. **Readability** — Named functions make code self-documenting and easier to understand.
4. **Maintainability** — Bug fixes and updates only need to happen in one place.
5. **Testability** — Individual functions can be tested independently.
6. **Abstraction** — Hides complex implementation details behind a simple function call.

---

### User-Defined Functions (Examples)

```php
<?php
// --- 1. Basic function ---
function greet($name) {
    return "Hello, $name! Welcome to PHP.";
}
echo greet("Alice");  // Hello, Alice! Welcome to PHP.


// --- 2. Function with default parameter ---
function calculateArea($length, $width = 10) {
    return $length * $width;
}
echo calculateArea(5);       // 50 (uses default width=10)
echo calculateArea(5, 3);    // 15


// --- 3. Function with return value ---
function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1); // Recursive function
}
echo factorial(5);  // 120


// --- 4. Function to check even/odd ---
function isEven($num) {
    return ($num % 2 == 0) ? "Even" : "Odd";
}
echo isEven(7);  // Odd


// --- 5. Function with multiple return values using array ---
function minMax($arr) {
    return ["min" => min($arr), "max" => max($arr)];
}
$result = minMax([3, 1, 7, 2, 9]);
echo "Min: " . $result['min'] . ", Max: " . $result['max'];
?>
```

---

### Built-in Functions (Examples)

```php
<?php
// --- String Functions ---
echo strlen("Hello");           // 5 — string length
echo strtoupper("hello");       // HELLO
echo strtolower("WORLD");       // world
echo str_replace("PHP", "World", "Hello PHP");  // Hello World
echo trim("  hello  ");         // "hello" — removes whitespace
echo substr("Hello World", 6);  // World — substring
echo strpos("Hello", "l");      // 2 — position of 'l'

// --- Math Functions ---
echo abs(-15);          // 15 — absolute value
echo round(4.567, 2);   // 4.57
echo ceil(4.1);         // 5 — round up
echo floor(4.9);        // 4 — round down
echo pow(2, 8);         // 256
echo sqrt(144);         // 12
echo rand(1, 100);      // random number between 1 and 100

// --- Array Functions ---
$arr = [3, 1, 4, 1, 5, 9, 2];
sort($arr);                      // sort ascending
echo count($arr);                // 7 — count elements
echo array_sum($arr);            // 25 — sum of all elements
$merged = array_merge([1,2], [3,4]); // [1,2,3,4]
$unique = array_unique([1,1,2,3,3]); // [1,2,3]

// --- Date/Time Functions ---
echo date("Y-m-d");              // 2025-04-10
echo date("d/m/Y H:i:s");        // 10/04/2025 14:30:00
echo time();                     // Unix timestamp (seconds since 1970)
?>
```

---

## Q14. Explain form handling in PHP. Write a program to take a number input and display whether it is prime or not. Validate if the input is numeric.

### Form Handling in PHP

**Form handling** is the process of collecting user input via HTML forms and processing it on the server using PHP.

**Key Concepts:**

1. **HTML Form** — Creates input fields with `method="POST"` or `method="GET"` and `action="script.php"`.
2. **`$_POST`** — Superglobal array to access POST form data.
3. **`$_GET`** — Superglobal to access GET form data (visible in URL).
4. **`$_REQUEST`** — Accesses both GET and POST data.
5. **`$_SERVER['REQUEST_METHOD']`** — Check if form was submitted (POST/GET).
6. **Validation** — Check if input is correct type, range, not empty, etc.
7. **Sanitization** — Clean input using `htmlspecialchars()`, `trim()`, `strip_tags()` to prevent XSS.

**Typical Flow:**
```
User fills form → Submits → Server receives $_POST data → Validate → Process → Display result
```

---

### PHP Program: Prime Number Checker with Validation

```php
<!DOCTYPE html>
<html>
<head>
    <title>Prime Number Checker</title>
</head>
<body>
    <h2>Prime Number Checker</h2>

    <form method="POST" action="">
        <label>Enter a positive integer:</label>
        <input type="text" name="number"
               value="<?= isset($_POST['number']) ? htmlspecialchars($_POST['number']) : '' ?>"
               placeholder="e.g. 17">
        <button type="submit">Check</button>
    </form>

    <?php
    // Function to check if a number is prime
    function isPrime($n) {
        if ($n < 2) return false;         // 0 and 1 are not prime
        if ($n == 2) return true;          // 2 is prime
        if ($n % 2 == 0) return false;     // even numbers (except 2) are not prime

        // Check odd divisors up to square root
        for ($i = 3; $i <= sqrt($n); $i += 2) {
            if ($n % $i == 0) return false;
        }
        return true;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = trim($_POST['number']);

        // Validation: check if input is numeric
        if ($input === '' || !is_numeric($input)) {
            echo "<div class='result error'>Error: Please enter a valid numeric value.</div>";
        } elseif (strpos($input, '.') !== false || $input < 0) {
            echo "<div class='result error'>Error: Please enter a positive whole number.</div>";
        } else {
            $number = (int)$input;

            if (isPrime($number)) {
                echo "<div class='result prime'>
                        <strong>$number is a PRIME number.</strong><br>
                        It has no divisors other than 1 and itself.
                      </div>";
            } else {
                echo "<div class='result notprime'>
                        <strong>$number is NOT a prime number.</strong><br>";
                if ($number < 2) {
                    echo "Numbers less than 2 are not prime.";
                } else {
                    echo "It has divisors other than 1 and $number.";
                }
                echo "</div>";
            }
        }
    }
    ?>
</body>
</html>
```

---

## Q15. Describe session-based authentication in PHP. Write a PHP script to demonstrate login functionality using sessions and redirect unauthorized users.

### Session-Based Authentication in PHP

**Session-based authentication** is a mechanism where the server creates a unique session for each logged-in user and stores authentication data on the server side.

**How it works:**
1. User submits login credentials (username + password).
2. Server verifies credentials against the database.
3. If valid, server creates a session and stores user info in `$_SESSION`.
4. A unique **Session ID** is sent to the browser as a cookie (`PHPSESSID`).
5. On every subsequent request, browser sends the Session ID cookie.
6. Server looks up the session and knows who the user is.
7. On logout, session is destroyed.

**Key Functions:**
- `session_start()` — Start or resume a session (must be first line)
- `$_SESSION['key'] = value` — Store data in session
- `session_destroy()` — Destroy all session data (logout)
- `session_unset()` — Clear all session variables

---

### PHP Scripts: Session-Based Login System

**File: `login.php`**
```php
<?php
session_start();

// Redirect to dashboard if already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hardcoded credentials (in real app, verify from database)
    $valid_username = "admin";
    $valid_password = "password123";

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } elseif ($username === $valid_username && $password === $valid_password) {
        // Successful login — store in session
        $_SESSION['logged_in'] = true;
        $_SESSION['username']  = $username;
        $_SESSION['login_time'] = time();

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
```

---

**File: `dashboard.php`**
```php
<?php
session_start();

// Redirect unauthorized users to login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit(); // Always exit after redirect
}
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
    <p>You are logged in. Login time: <?= date("H:i:s", $_SESSION['login_time']) ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
```

---

**File: `logout.php`**
```php
<?php
session_start();
session_unset();    // Remove all session variables
session_destroy();  // Destroy the session
header("Location: login.php");
exit();
?>
```

---

## Q16. Write a PHP script to perform CRUD operations with MySQL. Database: "program", Table: "users".

### CRUD Operations — Explained

**CRUD** stands for:
- **C**reate — INSERT new records
- **R**ead — SELECT / fetch records
- **U**pdate — UPDATE existing records
- **D**elete — DELETE records

**Flow:**
```
PHP Script → mysqli_connect() → SQL Query → mysqli_query() → Display Result
```

---

### Database Setup (SQL)
```sql
CREATE DATABASE program;
USE program;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    age INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

### `db.php` — Database Connection
```php
<?php
$conn = mysqli_connect("localhost", "root", "", "program");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

---

### `index.php` — Full CRUD Application
```php
<?php
include 'db.php';

$message = '';

// ==================== CREATE ====================
if (isset($_POST['create'])) {
    $name  = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $age   = (int)$_POST['age'];

    $sql = "INSERT INTO users (name, email, age) VALUES ('$name', '$email', $age)";
    if (mysqli_query($conn, $sql)) {
        $message = "User created successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// ==================== UPDATE ====================
if (isset($_POST['update'])) {
    $id    = (int)$_POST['id'];
    $name  = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $age   = (int)$_POST['age'];

    $sql = "UPDATE users SET name='$name', email='$email', age=$age WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $message = "User updated successfully!";
    } else {
        $message = "Update failed: " . mysqli_error($conn);
    }
}

// ==================== DELETE ====================
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $sql = "DELETE FROM users WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $message = "User deleted successfully!";
    } else {
        $message = "Delete failed: " . mysqli_error($conn);
    }
}

// Pre-fill form for edit
$edit_user = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $edit_user = mysqli_fetch_assoc($result);
}

// ==================== READ ====================
$users = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD - Users</title>
</head>
<body>
    <h2>CRUD Operations — Users Table</h2>

    <?php if ($message): ?>
        <div class="msg"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <!-- CREATE / UPDATE FORM -->
    <h3><?= $edit_user ? 'Edit User' : 'Add New User' ?></h3>
    <form method="POST">
        <?php if ($edit_user): ?>
            <input type="hidden" name="id" value="<?= $edit_user['id'] ?>">
        <?php endif; ?>

        <input type="text"  name="name"  placeholder="Name"
               value="<?= $edit_user ? htmlspecialchars($edit_user['name']) : '' ?>" required>
        <input type="email" name="email" placeholder="Email"
               value="<?= $edit_user ? htmlspecialchars($edit_user['email']) : '' ?>" required>
        <input type="number" name="age" placeholder="Age" min="1"
               value="<?= $edit_user ? $edit_user['age'] : '' ?>" required>

        <?php if ($edit_user): ?>
            <button type="submit" name="update">Update User</button>
            <a href="index.php"><button type="button">Cancel</button></a>
        <?php else: ?>
            <button type="submit" name="create">Add User</button>
        <?php endif; ?>
    </form>

    <!-- READ — Display all users -->
    <h3>All Users</h3>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Created At</th><th>Actions</th>
        </tr>
        <?php if (mysqli_num_rows($users) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($users)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= $row['age'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                        <a href="?edit=<?= $row['id'] ?>">Edit</a> |
                        <a href="?delete=<?= $row['id'] ?>" class="del-btn"
                           onclick="return confirm('Delete this user?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">No users found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
<?php mysqli_close($conn); ?>
```

---
---

# Group "C" — Long Answer Questions
*(Attempt any two questions. [2×15=30])*

---

## Q17. Explain the core principles of OOP in PHP. For each principle, provide detailed explanation and benefits. Additionally, explain magic methods.

### Core Principles of Object-Oriented Programming (OOP) in PHP

OOP is a programming paradigm that organizes code around **objects** (instances of **classes**). PHP supports full OOP with four core principles (pillars):

---

### 1. Encapsulation

**Definition:** Encapsulation is the practice of bundling data (properties) and methods (behaviors) together inside a class, and restricting direct access to internal data using **access modifiers**.

**Access Modifiers:**
- `public` — accessible from anywhere
- `protected` — accessible within the class and its subclasses
- `private` — accessible only within the class itself

**Benefits:**
- Protects data from accidental modification
- Hides internal implementation details
- Enforces controlled access through getter/setter methods

```php
<?php
class BankAccount {
    private $balance;  // Hidden from outside

    public function __construct($initialBalance) {
        $this->balance = $initialBalance;
    }

    // Getter — controlled read access
    public function getBalance() {
        return $this->balance;
    }

    // Setter — controlled write access with validation
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposited: $$amount\n";
        } else {
            echo "Invalid deposit amount!\n";
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Insufficient balance!\n";
        }
    }
}

$account = new BankAccount(1000);
$account->deposit(500);
echo "Balance: $" . $account->getBalance(); // Balance: $1500
// $account->balance = 99999; // ERROR — private!
?>
```

---

### 2. Inheritance

**Definition:** Inheritance allows a **child class** (subclass) to inherit properties and methods from a **parent class** (superclass). The child class can also extend or override inherited behavior.

**Keyword:** `extends`

**Benefits:**
- Code reusability — don't repeat common code
- Establishes a logical "is-a" relationship
- Easy to extend existing functionality

```php
<?php
// Parent class
class Animal {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function eat() {
        echo "$this->name is eating.\n";
    }

    public function speak() {
        echo "$this->name makes a sound.\n";
    }
}

// Child class — inherits Animal
class Dog extends Animal {
    public function speak() {
        // Override parent method
        echo "$this->name says: Woof! Woof!\n";
    }

    public function fetch() {
        echo "$this->name fetches the ball!\n";
    }
}

class Cat extends Animal {
    public function speak() {
        echo "$this->name says: Meow!\n";
    }
}

$dog = new Dog("Rex");
$dog->eat();    // Inherited: Rex is eating.
$dog->speak();  // Overridden: Rex says: Woof! Woof!
$dog->fetch();  // Dog-specific: Rex fetches the ball!

$cat = new Cat("Whiskers");
$cat->speak();  // Whiskers says: Meow!
?>
```

---

### 3. Polymorphism

**Definition:** Polymorphism (meaning "many forms") allows different classes to be treated as instances of the same parent class, while each class provides its own specific implementation of the same method.

**Types:**
- **Method Overriding** — child class redefines parent method (Runtime polymorphism)
- **Interface-based** — multiple classes implement the same interface

**Benefits:**
- One interface, multiple implementations
- Makes code extensible and flexible
- Enables writing generic code that works with different object types

```php
<?php
interface Shape {
    public function area();
    public function perimeter();
}

class Circle implements Shape {
    private $radius;
    public function __construct($r) { $this->radius = $r; }

    public function area() {
        return round(M_PI * $this->radius ** 2, 2);
    }

    public function perimeter() {
        return round(2 * M_PI * $this->radius, 2);
    }
}

class Rectangle implements Shape {
    private $length, $width;
    public function __construct($l, $w) {
        $this->length = $l;
        $this->width = $w;
    }

    public function area() {
        return $this->length * $this->width;
    }

    public function perimeter() {
        return 2 * ($this->length + $this->width);
    }
}

// Polymorphic function — works with any Shape
function printShapeInfo(Shape $shape) {
    echo "Area: " . $shape->area() . ", Perimeter: " . $shape->perimeter() . "\n";
}

printShapeInfo(new Circle(7));         // Area: 153.94, Perimeter: 43.98
printShapeInfo(new Rectangle(5, 10)); // Area: 50, Perimeter: 30
?>
```

---

### 4. Abstraction

**Definition:** Abstraction hides complex implementation details and exposes only the necessary features. It is achieved through **abstract classes** and **interfaces**.

- **Abstract Class** — cannot be instantiated; can have both abstract and concrete methods.
- **Interface** — defines a contract (method signatures only); all methods must be implemented.

**Benefits:**
- Reduces complexity
- Focuses on "what" rather than "how"
- Enforces a consistent API across related classes

```php
<?php
abstract class Vehicle {
    protected $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    // Abstract method — must be implemented by child
    abstract public function fuelType();

    // Concrete method — shared behavior
    public function describe() {
        echo "$this->brand runs on " . $this->fuelType() . ".\n";
    }
}

class Car extends Vehicle {
    public function fuelType() { return "Petrol"; }
}

class ElectricBike extends Vehicle {
    public function fuelType() { return "Electricity"; }
}

$car = new Car("Toyota");
$car->describe();  // Toyota runs on Petrol.

$bike = new ElectricBike("Tesla");
$bike->describe(); // Tesla runs on Electricity.
?>
```

---

### Magic Methods in PHP

**Magic methods** are special predefined methods in PHP that are automatically invoked in certain situations. They always start with a double underscore `__`.

| Magic Method         | When Called                                              |
|----------------------|----------------------------------------------------------|
| `__construct()`      | When an object is created (`new ClassName()`)            |
| `__destruct()`       | When an object is destroyed (garbage collected)          |
| `__get($name)`       | When accessing an undefined/private property             |
| `__set($name, $val)` | When setting an undefined/private property               |
| `__isset($name)`     | When `isset()` is called on an inaccessible property     |
| `__unset($name)`     | When `unset()` is called on an inaccessible property     |
| `__toString()`       | When object is used as a string (`echo $obj`)            |
| `__call($name, $args)`       | When calling an undefined method on an object  |
| `__callStatic($name, $args)` | When calling an undefined static method        |
| `__clone()`          | When object is cloned (`clone $obj`)                     |

```php
<?php
class MagicDemo {
    private $data = [];
    private $name;

    // __construct — called on object creation
    public function __construct($name) {
        $this->name = $name;
        echo "__construct: Object '$name' created.\n";
    }

    // __get — called when accessing undefined/private property
    public function __get($key) {
        return $this->data[$key] ?? "Property '$key' not found";
    }

    // __set — called when setting undefined/private property
    public function __set($key, $value) {
        $this->data[$key] = $value;
        echo "__set: '$key' set to '$value'\n";
    }

    // __isset — called when isset() used on inaccessible property
    public function __isset($key) {
        return isset($this->data[$key]);
    }

    // __toString — called when object echoed as string
    public function __toString() {
        return "Object: {$this->name}, Data: " . json_encode($this->data);
    }

    // __call — called when undefined method is invoked
    public function __call($method, $args) {
        echo "__call: Method '$method' not found. Args: " . implode(', ', $args) . "\n";
    }

    // __destruct — called when object is destroyed
    public function __destruct() {
        echo "__destruct: Object '{$this->name}' destroyed.\n";
    }
}

$obj = new MagicDemo("Demo");  // __construct called
$obj->color = "blue";          // __set called
echo $obj->color;              // __get called → blue
echo "\n";
echo isset($obj->color) ? "isset: yes\n" : "isset: no\n";  // __isset called
$obj->unknownMethod("a", "b"); // __call called
echo $obj;                     // __toString called
// __destruct called at end of script
?>
```

---

## Q18. What is MVC architecture? Describe each component. Provide a step-by-step guide to creating a blog post module using MVC.

### What is MVC Architecture?

**MVC (Model-View-Controller)** is a software design pattern that separates an application into three interconnected components. This separation promotes organized, maintainable, and scalable code.

```
User → Controller → Model → Database
                 ↓
              View ← Data
                 ↓
              Browser (HTML Response)
```

---

### Role of Each Component

#### 1. Model
- Represents the **data layer** of the application
- Handles all database operations (SQL queries)
- Contains **business logic** and data validation rules
- Is independent of the View and Controller
- Example: Fetching blog posts from database, saving new posts

#### 2. View
- Represents the **presentation layer** (UI)
- Contains HTML templates mixed with minimal PHP for displaying data
- Receives data from the Controller and renders it
- Should contain NO business logic or direct database calls
- Example: HTML page showing a list of blog posts

#### 3. Controller
- Acts as the **middleman** between Model and View
- Receives HTTP requests from the user
- Calls appropriate Model methods to get/save data
- Passes data to the View for rendering
- Handles application flow and routing
- Example: Receives a "show all posts" request, asks Model for data, passes it to View

---

### Benefits of MVC
- **Separation of Concerns** — each layer has a single responsibility
- **Maintainability** — change UI without touching business logic and vice versa
- **Testability** — test Model independently of UI
- **Team Collaboration** — developers can work on different layers simultaneously

---

### Step-by-Step: Blog Post Module in MVC

#### Directory Structure
```
blog/
├── index.php            (Front Controller / Router)
├── config/
│   └── db.php           (Database connection)
├── models/
│   └── PostModel.php    (Data layer)
├── controllers/
│   └── PostController.php (Logic layer)
└── views/
    ├── post_list.php    (Show all posts)
    ├── post_create.php  (Add new post form)
    └── post_detail.php  (Single post view)
```

---

#### Step 1: Database Setup
```sql
CREATE DATABASE blog_db;
USE blog_db;

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data
INSERT INTO posts (title, content, author) VALUES
('My First Blog Post', 'This is the content of the first post.', 'Alice'),
('Learning PHP MVC', 'MVC is a great way to organize code.', 'Bob');
```

---

#### Step 2: Database Configuration — `config/db.php`
```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blog_db');

function getConnection() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>
```

---

#### Step 3: Model — `models/PostModel.php`
```php
<?php
require_once 'config/db.php';

class PostModel {
    private $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    // READ — Get all posts
    public function getAllPosts() {
        $result = mysqli_query($this->conn, "SELECT * FROM posts ORDER BY created_at DESC");
        $posts = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }
        return $posts;
    }

    // READ — Get single post by ID
    public function getPostById($id) {
        $id = (int)$id;
        $result = mysqli_query($this->conn, "SELECT * FROM posts WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }

    // CREATE — Insert new post
    public function createPost($title, $content, $author) {
        $title   = mysqli_real_escape_string($this->conn, $title);
        $content = mysqli_real_escape_string($this->conn, $content);
        $author  = mysqli_real_escape_string($this->conn, $author);
        $sql = "INSERT INTO posts (title, content, author) VALUES ('$title', '$content', '$author')";
        return mysqli_query($this->conn, $sql);
    }

    // DELETE — Remove a post
    public function deletePost($id) {
        $id = (int)$id;
        return mysqli_query($this->conn, "DELETE FROM posts WHERE id = $id");
    }
}
?>
```

---

#### Step 4: Controller — `controllers/PostController.php`
```php
<?php
require_once 'models/PostModel.php';

class PostController {
    private $model;

    public function __construct() {
        $this->model = new PostModel();
    }

    // Show list of all posts
    public function index() {
        $posts = $this->model->getAllPosts();
        include 'views/post_list.php';
    }

    // Show single post detail
    public function show($id) {
        $post = $this->model->getPostById($id);
        if (!$post) {
            die("Post not found!");
        }
        include 'views/post_detail.php';
    }

    // Show create form / handle form submission
    public function create() {
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title   = trim($_POST['title']);
            $content = trim($_POST['content']);
            $author  = trim($_POST['author']);

            if (empty($title) || empty($content)) {
                $error = "Title and Content are required.";
            } else {
                if ($this->model->createPost($title, $content, $author)) {
                    header("Location: index.php?action=index");
                    exit();
                } else {
                    $error = "Failed to create post.";
                }
            }
        }
        include 'views/post_create.php';
    }

    // Delete a post
    public function delete($id) {
        $this->model->deletePost($id);
        header("Location: index.php?action=index");
        exit();
    }
}
?>
```

---

#### Step 5: Views

**`views/post_list.php`**
```php
<!DOCTYPE html>
<html>
<head><title>Blog Posts</title>
</head>
<body>
    <h1>All Blog Posts</h1>
    <a href="index.php?action=create" class="btn">+ New Post</a>
    <hr>
    <?php if (empty($posts)): ?>
        <p>No posts yet. <a href="index.php?action=create">Create one!</a></p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="post-card">
                <h3><a href="index.php?action=show&id=<?= $post['id'] ?>">
                    <?= htmlspecialchars($post['title']) ?>
                </a></h3>
                <p>By <strong><?= htmlspecialchars($post['author']) ?></strong>
                   on <?= date("d M Y", strtotime($post['created_at'])) ?></p>
                <p><?= htmlspecialchars(substr($post['content'], 0, 150)) ?>...</p>
                <a href="index.php?action=delete&id=<?= $post['id'] ?>"
                   onclick="return confirm('Delete this post?')">Delete</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
```

**`views/post_create.php`**
```php
<!DOCTYPE html>
<html>
<head><title>Create Post</title>
</head>
<body>
    <h2>Create New Blog Post</h2>
    <a href="index.php?action=index">← Back to list</a>

    <?php if (isset($error) && $error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Author:</label>
        <input type="text" name="author" placeholder="Anonymous">
        <label>Content:</label>
        <textarea name="content" rows="8" required></textarea>
        <button type="submit">Publish Post</button>
    </form>
</body>
</html>
```

**`views/post_detail.php`**
```php
<!DOCTYPE html>
<html>
<head><title><?= htmlspecialchars($post['title']) ?></title></head>
<body>
    <a href="index.php?action=index">← Back to all posts</a>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><em>By <?= htmlspecialchars($post['author']) ?>
       | <?= date("d M Y H:i", strtotime($post['created_at'])) ?></em></p>
    <hr>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
</body>
</html>
```

---

#### Step 6: Front Controller — `index.php` (Router)
```php
<?php
require_once 'controllers/PostController.php';

$controller = new PostController();
$action = $_GET['action'] ?? 'index';
$id     = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Route to appropriate controller method
switch ($action) {
    case 'index':  $controller->index();       break;
    case 'show':   $controller->show($id);     break;
    case 'create': $controller->create();      break;
    case 'delete': $controller->delete($id);   break;
    default:       $controller->index();       break;
}
?>
```

**How it flows:**
1. User visits `index.php?action=create`
2. Router calls `PostController::create()`
3. Controller handles POST → calls `PostModel::createPost()`
4. Model runs SQL INSERT and returns result
5. Controller redirects to list page
6. `PostController::index()` fetches all posts from Model
7. Passes `$posts` array to `post_list.php` View
8. View renders HTML and sends to browser

---

## Q19. Define file permission & transaction management. Write a program to upload a file with validation and handle error messages.

### File Permission Management in PHP

**File permissions** define who can **read**, **write**, and **execute** a file on the server. This is especially important for uploaded files to prevent security vulnerabilities.

**Unix Permission System:**
```
chmod(filename, mode)
```

| Permission | Octal | Meaning                         |
|------------|-------|---------------------------------|
| Read       | 4     | Can view file contents          |
| Write      | 2     | Can modify file                 |
| Execute    | 1     | Can run as script/program       |

**Common Permission Values:**
| Octal | Meaning                              |
|-------|--------------------------------------|
| 0644  | Owner: read+write; Others: read only |
| 0755  | Owner: all; Others: read+execute     |
| 0777  | Everyone: full access (DANGEROUS)    |

**PHP File Permission Functions:**
```php
chmod("uploads/file.txt", 0644);   // Set permissions
fileperms("file.txt");              // Get permissions
is_readable("file.txt");            // Check if readable
is_writable("file.txt");            // Check if writable
is_executable("file.txt");          // Check if executable
```

---

### Transaction Management in PHP (Database)

**Transaction management** ensures that a group of database operations either **all succeed** or **all fail together** — maintaining data integrity. This follows the **ACID** properties:
- **A**tomicity — all or nothing
- **C**onsistency — data stays valid
- **I**solation — concurrent transactions don't interfere
- **D**urability — committed changes persist

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");

mysqli_begin_transaction($conn);  // Start transaction
try {
    mysqli_query($conn, "UPDATE accounts SET balance = balance - 500 WHERE id = 1");
    mysqli_query($conn, "UPDATE accounts SET balance = balance + 500 WHERE id = 2");

    mysqli_commit($conn);    // Both succeeded — save changes
    echo "Transaction successful!";
} catch (Exception $e) {
    mysqli_rollback($conn);  // One failed — undo all changes
    echo "Transaction failed: " . $e->getMessage();
}
?>
```

---

### File Upload Program with Validation

```php
<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <h2>File Upload with Validation</h2>

    <form method="POST" enctype="multipart/form-data">
        <label>Select File to Upload:</label>
        <input type="file" name="uploaded_file" required>
        <p class="info">Allowed types: JPG, JPEG, PNG, GIF, PDF | Max size: 2 MB</p>
        <button type="submit">Upload File</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Configuration
        $upload_dir   = "uploads/";
        $max_size     = 2 * 1024 * 1024;  // 2 MB in bytes
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
        $allowed_ext   = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

        $errors = [];

        // Check if file was uploaded without errors
        if (!isset($_FILES['uploaded_file']) || $_FILES['uploaded_file']['error'] === UPLOAD_ERR_NO_FILE) {
            $errors[] = "No file was selected.";
        } else {
            $file     = $_FILES['uploaded_file'];
            $filename = basename($file['name']);
            $filesize = $file['size'];
            $filetype = $file['type'];
            $tmp_path = $file['tmp_name'];
            $file_error = $file['error'];

            // Check upload errors
            if ($file_error === UPLOAD_ERR_INI_SIZE || $file_error === UPLOAD_ERR_FORM_SIZE) {
                $errors[] = "File exceeds the maximum allowed size.";
            } elseif ($file_error !== UPLOAD_ERR_OK) {
                $errors[] = "File upload error (code: $file_error).";
            }

            // Validate file size (max 2 MB)
            if ($filesize > $max_size) {
                $errors[] = "File size (" . round($filesize / 1048576, 2) . " MB) exceeds the 2 MB limit.";
            }

            // Validate file extension
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if (!in_array($ext, $allowed_ext)) {
                $errors[] = "File type '.$ext' is not allowed. Allowed: " . implode(', ', $allowed_ext);
            }

            // Validate MIME type (more secure than just extension)
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $real_mime = finfo_file($finfo, $tmp_path);
            finfo_close($finfo);

            if (!in_array($real_mime, $allowed_types)) {
                $errors[] = "Invalid file MIME type: $real_mime. File may be disguised.";
            }

            // Check for PHP code inside file (security check)
            $file_content = file_get_contents($tmp_path);
            if (stripos($file_content, '<?php') !== false) {
                $errors[] = "File contains PHP code and is not allowed.";
            }
        }

        if (empty($errors)) {
            // Create upload directory if it doesn't exist
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Generate unique filename to prevent overwriting
            $new_filename = uniqid("upload_", true) . "." . $ext;
            $destination  = $upload_dir . $new_filename;

            // Move file from temp to destination
            if (move_uploaded_file($tmp_path, $destination)) {
                // Set secure file permissions (read-only for others)
                chmod($destination, 0644);

                echo "<div class='success'>
                        <strong>File uploaded successfully!</strong><br>
                        Original name: " . htmlspecialchars($filename) . "<br>
                        Saved as: $new_filename<br>
                        Size: " . round($filesize / 1024, 2) . " KB<br>
                        Type: $real_mime<br>
                        Permissions: 0644 (secure)
                      </div>";
            } else {
                echo "<div class='error'>Failed to move uploaded file. Check directory permissions.</div>";
            }

        } else {
            // Display all errors
            echo "<div class='error'><strong>Upload failed:</strong><ul>";
            foreach ($errors as $err) {
                echo "<li>" . htmlspecialchars($err) . "</li>";
            }
            echo "</ul></div>";
        }
    }
    ?>
</body>
</html>
```

**Key Validation Points in the Script:**
1. **Error code check** — `$_FILES['file']['error']` catches server-level upload errors
2. **File size validation** — compares `$_FILES['file']['size']` against max limit
3. **Extension whitelist** — `pathinfo()` extracts extension and checks against allowed list
4. **MIME type check** — `finfo_file()` reads actual file type (harder to spoof than extension)
5. **Content scanning** — detects hidden PHP code in uploaded files
6. **Unique filename** — `uniqid()` prevents filename collisions and enumeration
7. **`chmod(0644)`** — sets secure permissions after upload
8. **`move_uploaded_file()`** — the only safe function to move uploaded files in PHP

---

*End of Answer Sheet*
*Pokhara University — BCSIT III — Internet Technology II — 2025*
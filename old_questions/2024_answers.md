# Internet Technology II (Programming) — 2024 Answers
**Pokhara University | BCSIT III | Fall 2024**
**Full Marks: 100 | Pass Marks: 45 | Time: 3 hrs**

---

# Section "A" — Very Short Answer Questions
*(Attempt all questions. [10×2=20])*

---

## Q1. Define server-side scripting and mention its advantages in web development.

**Server-side scripting** is the execution of scripts on a web server rather than in the client's browser. The server processes the script, generates HTML output dynamically, and sends only the final HTML to the client. The client never sees the script's source code.

**Examples:** PHP, Python (Django/Flask), Node.js, Ruby on Rails, ASP.NET

**Advantages in Web Development:**

1. **Dynamic Content** — Pages can generate content based on user input, database data, or time (e.g., personalized dashboards).
2. **Security** — Business logic and database credentials stay on the server; clients cannot access them.
3. **Database Interaction** — Can query, insert, and update databases to build data-driven applications.
4. **Session Management** — Can maintain user state across multiple pages (login, shopping cart).
5. **Platform Independence** — The client only receives HTML; any browser on any device can view the page.
6. **Code Reusability** — Server-side logic can be reused across multiple pages via includes and functions.

---

## Q2. Explain the purpose of the ternary operator with an example.

The **ternary operator** (`?:`) is a shorthand conditional expression that replaces a simple `if-else` statement in a single line.

**Syntax:**
```
condition ? value_if_true : value_if_false
```

**Purpose:** To make simple conditional assignments or expressions more concise and readable.

**Example:**
```php
<?php
$age = 20;

// Using ternary operator
$status = ($age >= 18) ? "Adult" : "Minor";
echo $status;  // Output: Adult

// Equivalent if-else:
if ($age >= 18) {
    $status = "Adult";
} else {
    $status = "Minor";
}

// Nested ternary (PHP 8+ requires parentheses)
$marks = 75;
$grade = ($marks >= 80) ? "A" : (($marks >= 60) ? "B" : "C");
echo $grade;  // Output: B

// Null coalescing operator (??) — related shorthand
$name = $_GET['name'] ?? "Guest";  // Uses "Guest" if $_GET['name'] is not set
echo $name;
?>
```

---

## Q3. What is an indexed array in PHP? Provide an example of how to declare and iterate through it.

An **indexed array** (also called a numeric array) is an array where each element is assigned a **numeric index** automatically starting from `0`. Elements are ordered and accessed by their position.

**Declaration:**
```php
<?php
// Method 1: Using array() function
$fruits = array("Apple", "Banana", "Cherry", "Mango");

// Method 2: Short array syntax (preferred)
$colors = ["Red", "Green", "Blue"];

// Method 3: Manual index assignment
$numbers[0] = 10;
$numbers[1] = 20;
$numbers[2] = 30;
?>
```

**Iterating through an indexed array:**
```php
<?php
$students = ["Alice", "Bob", "Charlie", "Diana", "Eve"];

// Method 1: for loop (using count())
echo "--- for loop ---\n";
for ($i = 0; $i < count($students); $i++) {
    echo "Student $i: $students[$i]\n";
}

// Method 2: foreach loop (most common)
echo "--- foreach loop ---\n";
foreach ($students as $index => $name) {
    echo "[$index] $name\n";
}

// Method 3: while loop with each()
echo "--- while loop ---\n";
$i = 0;
while ($i < count($students)) {
    echo $students[$i] . "\n";
    $i++;
}

// Useful array functions
echo "Total students: " . count($students) . "\n";
echo "First: " . $students[0] . "\n";
echo "Last: " . end($students) . "\n";
?>
```

**Output:**
```
[0] Alice
[1] Bob
[2] Charlie
[3] Diana
[4] Eve
Total students: 5
```

---

## Q4. Define GET and POST.

Both `GET` and `POST` are **HTTP request methods** used to send data from a client (browser) to a web server.

| Feature              | GET                                               | POST                                              |
|----------------------|---------------------------------------------------|---------------------------------------------------|
| **Definition**       | Sends data appended to the URL as query string    | Sends data in the HTTP request body               |
| **Visibility**       | Data visible in URL (`?key=value&key2=value2`)    | Data hidden from URL                              |
| **Security**         | Less secure — data exposed in URL and logs        | More secure — data not visible in URL             |
| **Data Limit**       | Limited (~2048 characters in URL)                 | No practical limit (large data, files)            |
| **Bookmarkable**     | Yes — URL can be bookmarked/shared                | No — data not stored in URL                       |
| **Caching**          | Can be cached by browser                          | Not cached                                        |
| **Use Case**         | Search queries, filters, pagination               | Login forms, file uploads, sensitive data         |
| **PHP Access**       | `$_GET['key']`                                    | `$_POST['key']`                                   |

**Example:**
```php
// GET: URL becomes → page.php?username=alice&age=20
<form method="GET" action="page.php">
    <input type="text" name="username">
    <input type="submit">
</form>

// POST: Data sent in request body, URL stays clean
<form method="POST" action="page.php">
    <input type="password" name="password">
    <input type="submit">
</form>

<?php
// Accessing values
$username = $_GET['username'];   // From URL
$password = $_POST['password'];  // From form body
?>
```

---

## Q5. List different types of file opening modes used in file handling.

PHP uses `fopen($filename, $mode)` to open files. The **mode** determines how the file is opened:

| Mode  | Name              | Description                                                             |
|-------|-------------------|-------------------------------------------------------------------------|
| `r`   | Read              | Open for reading only. File must exist. Pointer at beginning.           |
| `r+`  | Read + Write      | Open for reading and writing. File must exist. Pointer at beginning.    |
| `w`   | Write             | Open for writing only. Creates file if not exists. **Erases** existing content. |
| `w+`  | Write + Read      | Open for reading and writing. Creates/erases file. Pointer at beginning.|
| `a`   | Append            | Open for writing. Creates if not exists. Pointer at **end** (preserves content). |
| `a+`  | Append + Read     | Open for reading and appending. Pointer at end.                         |
| `x`   | Exclusive Create  | Creates new file for writing. **Fails** if file already exists.         |
| `x+`  | Exclusive Create+ | Creates new file for reading/writing. Fails if exists.                  |
| `b`   | Binary            | Used with other modes on Windows (`rb`, `wb`) for binary files.         |

**Example:**
```php
<?php
// Read a file
$file = fopen("data.txt", "r");
while (!feof($file)) {
    echo fgets($file);
}
fclose($file);

// Write (creates or overwrites)
$file = fopen("log.txt", "w");
fwrite($file, "New content\n");
fclose($file);

// Append (add to end)
$file = fopen("log.txt", "a");
fwrite($file, "Appended line\n");
fclose($file);
?>
```

---

## Q6. Write a PHP code snippet to fetch records from a MySQL database.

```php
<?php
// Step 1: Connect to the database
$conn = mysqli_connect("localhost", "root", "", "mydb");

// Step 2: Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 3: Write and execute the SELECT query
$sql = "SELECT id, name, email, age FROM users ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

// Step 4: Check if records exist and fetch them
if (mysqli_num_rows($result) > 0) {
    // Fetch row by row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . " | ";
        echo "Name: " . $row['name'] . " | ";
        echo "Email: " . $row['email'] . " | ";
        echo "Age: " . $row['age'] . "\n";
    }
} else {
    echo "No records found.";
}

// Step 5: Close connection
mysqli_close($conn);
?>
```

**Output:**
```
ID: 1 | Name: Alice | Email: alice@example.com | Age: 22
ID: 2 | Name: Bob | Email: bob@example.com | Age: 25
```

---

## Q7. Discuss one benefit of using PHP frameworks in web development.

**Benefit: Rapid Development through Built-in Features and Structure**

PHP frameworks like **Laravel**, **CodeIgniter**, and **Symfony** provide pre-built components and a structured project layout that dramatically speed up development.

**How it helps:**
- **Routing** — Define URL routes in one place without manual URL parsing.
- **ORM (Object-Relational Mapping)** — Interact with databases using PHP objects instead of raw SQL (e.g., Laravel's Eloquent).
- **Authentication** — Complete login/registration systems are scaffolded in minutes.
- **Validation** — Built-in form validation rules (`required`, `email`, `min`, `max`).
- **Templating Engine** — Blade (Laravel) or Twig (Symfony) for clean, reusable HTML views.
- **Security** — Automatic CSRF protection, SQL injection prevention, and XSS filtering.
- **Artisan CLI** (Laravel) — Generate models, controllers, migrations with a single command.

**Example — Laravel route vs raw PHP:**
```php
// Laravel: clean, one line
Route::get('/users', [UserController::class, 'index']);

// Raw PHP: parse URL manually, include files, handle errors...
// (20+ lines of boilerplate)
```

In summary, frameworks let developers focus on **business logic** instead of reinventing the wheel for common tasks.

---

## Q8. Explain the concept of object-oriented programming (OOP) in PHP.

**Object-Oriented Programming (OOP)** is a programming paradigm that organizes code around **objects** — self-contained units that combine **data (properties)** and **behavior (methods)**.

**Core Concepts:**

- **Class** — A blueprint/template defining properties and methods.
- **Object** — An instance of a class; the actual entity created from the blueprint.
- **Property** — A variable belonging to a class (data/attributes).
- **Method** — A function belonging to a class (behavior).

**Four Pillars of OOP:**
1. **Encapsulation** — Bundle data and methods; restrict direct access using `private`/`protected`.
2. **Inheritance** — A child class inherits from a parent class (`extends`).
3. **Polymorphism** — Same method name, different behavior across classes.
4. **Abstraction** — Hide complexity; expose only what's necessary.

**Simple Example:**
```php
<?php
class Student {
    // Properties
    public $name;
    private $marks;

    // Constructor
    public function __construct($name, $marks) {
        $this->name  = $name;
        $this->marks = $marks;
    }

    // Method
    public function getGrade() {
        if ($this->marks >= 80) return "A";
        elseif ($this->marks >= 60) return "B";
        else return "C";
    }

    public function getInfo() {
        return "{$this->name} — Grade: " . $this->getGrade();
    }
}

// Creating objects
$s1 = new Student("Alice", 85);
$s2 = new Student("Bob", 62);

echo $s1->getInfo();  // Alice — Grade: A
echo $s2->getInfo();  // Bob — Grade: B
?>
```

**Benefits of OOP:** Code reusability, modularity, easier maintenance, scalability, and real-world modeling.

---

## Q9. Explain the difference between local and global variables in PHP.

| Feature         | Local Variable                                      | Global Variable                                      |
|-----------------|-----------------------------------------------------|------------------------------------------------------|
| **Definition**  | Declared inside a function                          | Declared outside all functions (in global scope)     |
| **Scope**       | Accessible only within the function it is defined in | Accessible throughout the script (outside functions) |
| **Lifetime**    | Created when function is called; destroyed when function ends | Exists for the entire script execution             |
| **Access in function** | Directly accessible                        | Requires `global` keyword or `$GLOBALS` array        |

**Example:**
```php
<?php
$globalVar = "I am global";  // Global variable
$counter = 0;

function testScope() {
    $localVar = "I am local";  // Local variable
    echo $localVar;   // Works — local scope

    // echo $globalVar; // ERROR — not accessible directly!

    // Access global variable using 'global' keyword
    global $counter;
    $counter++;
    echo $counter;

    // Access via $GLOBALS superglobal
    echo $GLOBALS['globalVar'];  // Works!
}

testScope();
// echo $localVar; // ERROR — $localVar doesn't exist here

echo $globalVar;   // Works — global scope
echo $counter;     // 1 — modified inside function via global

// Static variable — local but retains value between calls
function countCalls() {
    static $count = 0;  // Initialized only once
    $count++;
    echo "Called: $count times\n";
}

countCalls();  // Called: 1 times
countCalls();  // Called: 2 times
countCalls();  // Called: 3 times
?>
```

---

## Q10. What is the purpose of HTTPS?

**HTTPS (HyperText Transfer Protocol Secure)** is the secure version of HTTP. It uses **SSL/TLS (Secure Sockets Layer / Transport Layer Security)** encryption to protect data transmitted between a web browser and a web server.

**Purpose and Key Functions:**

1. **Encryption** — All data transmitted is encrypted, so even if intercepted, it cannot be read by attackers (man-in-the-middle protection).
2. **Authentication** — The SSL/TLS certificate verifies that the website is genuinely who it claims to be (prevents impersonation).
3. **Data Integrity** — Ensures data is not tampered with during transmission; any modification is detected.
4. **Trust & Credibility** — Browsers show a padlock icon for HTTPS sites; users trust them more.
5. **SEO Benefit** — Google ranks HTTPS sites higher than HTTP sites.
6. **Compliance** — Required for handling sensitive data (passwords, credit card info) under regulations like GDPR, PCI-DSS.

**How it works:**
```
Client ←→ SSL Handshake ←→ Server
         (exchange certificates,
          agree on encryption keys)

All data then travels encrypted:
Browser → [Encrypted Request] → Server
Server  → [Encrypted Response] → Browser
```

**URL difference:**
- HTTP:  `http://example.com` — port 80, no encryption
- HTTPS: `https://example.com` — port 443, encrypted

---
---

# Section "B" — Descriptive Answer Questions
*(Attempt any five questions. [5×10=50])*

---

## Q11. Define conditional statement and loop. Write a program to demonstrate if-else, for loop and switch. Compare their usage.

### Conditional Statements

A **conditional statement** controls the flow of execution based on whether a condition evaluates to `true` or `false`. It allows a program to make decisions.

**Types:**
- `if` — execute block if condition is true
- `if-else` — choose between two blocks
- `if-elseif-else` — chain multiple conditions
- `switch` — match a value against multiple cases
- Ternary (`?:`) — inline shorthand

### Loops

A **loop** repeatedly executes a block of code as long as a condition remains true, or for a specified number of iterations.

**Types:**
- `for` — known number of iterations
- `while` — condition checked before each iteration
- `do-while` — condition checked after (executes at least once)
- `foreach` — iterates over arrays

---

### PHP Program: Demonstrating if-else, for loop, and switch

```php
<!DOCTYPE html>
<html>
<head>
    <title>Control Structures Demo</title>
</head>
<body>
    <h2>PHP Control Structures Demo</h2>

    <form method="POST">
        <label>Enter marks (0–100):</label>
        <input type="number" name="marks" min="0" max="100" required
               value="<?= isset($_POST['marks']) ? $_POST['marks'] : '' ?>">
        <button type="submit">Evaluate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        $marks = (int)$_POST['marks'];
    ?>

    <!-- ==================== IF-ELSE ==================== -->
    <div class="section">
        <h3>1. if-else Statement</h3>
        <p>Checks multiple conditions in order and executes the matching block.</p>
        <?php
        if ($marks >= 80) {
            echo "<p><strong>Grade: A</strong> — Distinction. Excellent performance!</p>";
        } elseif ($marks >= 60) {
            echo "<p><strong>Grade: B</strong> — First Division. Good performance.</p>";
        } elseif ($marks >= 45) {
            echo "<p><strong>Grade: C</strong> — Second Division. Average performance.</p>";
        } elseif ($marks >= 32) {
            echo "<p><strong>Grade: D</strong> — Pass. Below average.</p>";
        } else {
            echo "<p><strong>Grade: F</strong> — Fail. Better luck next time.</p>";
        }
        ?>
    </div>

    <!-- ==================== FOR LOOP ==================== -->
    <div class="section">
        <h3>2. for Loop</h3>
        <p>Multiplication table for the entered marks value (<?= $marks ?> × 1 to 10):</p>
        <table>
            <tr><th>Expression</th><th>Result</th></tr>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<tr>";
                echo "<td>$marks × $i</td>";
                echo "<td>" . ($marks * $i) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <!-- ==================== SWITCH ==================== -->
    <div class="section">
        <h3>3. switch Statement</h3>
        <p>Categorizing marks into a performance band:</p>
        <?php
        // Determine band (tens digit)
        $band = intdiv($marks, 10);  // e.g., 75 → 7

        switch (true) {
            case ($marks >= 80):
                echo "<p>Performance Band: <strong>Outstanding (80–100)</strong></p>";
                echo "<p>Message: Keep up the excellent work!</p>";
                break;
            case ($marks >= 60):
                echo "<p>Performance Band: <strong>Good (60–79)</strong></p>";
                echo "<p>Message: Good job! Aim higher next time.</p>";
                break;
            case ($marks >= 45):
                echo "<p>Performance Band: <strong>Average (45–59)</strong></p>";
                echo "<p>Message: You passed. Work harder.</p>";
                break;
            case ($marks >= 32):
                echo "<p>Performance Band: <strong>Below Average (32–44)</strong></p>";
                echo "<p>Message: Barely passed. Serious improvement needed.</p>";
                break;
            default:
                echo "<p>Performance Band: <strong>Fail (0–31)</strong></p>";
                echo "<p>Message: You did not pass. Please retake the exam.</p>";
        }
        ?>
    </div>

    <?php endif; ?>

    <!-- Comparison Table -->
    <div class="section">
        <h3>Comparison: if-else vs for loop vs switch</h3>
        <table>
            <tr>
                <th>Feature</th>
                <th>if-else</th>
                <th>for loop</th>
                <th>switch</th>
            </tr>
            <tr>
                <td><strong>Purpose</strong></td>
                <td>Decision making</td>
                <td>Repeat a block N times</td>
                <td>Match value to cases</td>
            </tr>
            <tr>
                <td><strong>Condition</strong></td>
                <td>Any boolean expression</td>
                <td>Loop counter condition</td>
                <td>Equality match (==)</td>
            </tr>
            <tr>
                <td><strong>Best for</strong></td>
                <td>Complex range conditions</td>
                <td>Known iteration count</td>
                <td>Single variable, many values</td>
            </tr>
            <tr>
                <td><strong>Breaks</strong></td>
                <td>Not needed</td>
                <td>break / continue</td>
                <td>break required</td>
            </tr>
            <tr>
                <td><strong>Example use</strong></td>
                <td>Grade checking</td>
                <td>Printing table, iterating</td>
                <td>Day name, menu selection</td>
            </tr>
        </table>
    </div>
</body>
</html>
```

---

## Q12. Explain the concept of multi-dimensional arrays in PHP. Write a PHP program to store and display a 2D array of student marks.

### Multi-dimensional Arrays in PHP

A **multi-dimensional array** is an array that contains one or more arrays as its elements. The most common is a **2D array** (array of arrays), which can represent a table (rows and columns).

**Types:**
- **2D Array** — array inside an array (like a table/matrix)
- **3D Array** — array inside array inside array
- **Associative multi-dimensional** — named keys at each level

**Syntax:**
```php
// 2D Indexed Array (like a matrix)
$matrix[row][column]

// 2D Associative Array (like records)
$students[index]['field']
```

**Why use them?**
- Represent tabular data (student records, exam results)
- Store complex data structures
- Avoid using multiple separate arrays

---

### PHP Program: 2D Array of Student Marks

```php
<!DOCTYPE html>
<html>
<head>
    <title>Student Marks — 2D Array</title>
</head>
<body>
    <h2>Student Marks — 2D Array Demo</h2>

    <?php
    // ---- 2D Associative Array: Student Records ----
    $students = [
        ["name" => "Alice",   "math" => 88, "science" => 76, "english" => 92, "nepali" => 70],
        ["name" => "Bob",     "math" => 55, "science" => 62, "english" => 48, "nepali" => 58],
        ["name" => "Charlie", "math" => 95, "science" => 90, "english" => 85, "nepali" => 88],
        ["name" => "Diana",   "math" => 30, "science" => 42, "english" => 38, "nepali" => 45],
        ["name" => "Eve",     "math" => 72, "science" => 68, "english" => 75, "nepali" => 80],
    ];

    $subjects  = ["math", "science", "english", "nepali"];
    $pass_mark = 40;

    // ---- Display the 2D Array as a Table ----
    echo "<h3>1. Student Marks Table</h3>";
    echo "<table>";
    echo "<tr><th>Student</th><th>Math</th><th>Science</th><th>English</th><th>Nepali</th><th>Total</th><th>Average</th><th>Result</th></tr>";

    foreach ($students as $student) {
        $total   = $student['math'] + $student['science'] + $student['english'] + $student['nepali'];
        $average = $total / count($subjects);

        // Check if failed any subject
        $failed = false;
        foreach ($subjects as $sub) {
            if ($student[$sub] < $pass_mark) {
                $failed = true;
                break;
            }
        }
        $result      = $failed ? "FAIL" : "PASS";
        $result_class = $failed ? "fail" : "pass";
        $row_class    = $failed ? "highlight" : "";

        echo "<tr class='$row_class'>";
        echo "<td><strong>{$student['name']}</strong></td>";

        foreach ($subjects as $sub) {
            $mark = $student[$sub];
            $class = ($mark < $pass_mark) ? "fail" : "";
            echo "<td class='$class'>$mark</td>";
        }

        echo "<td><strong>$total</strong></td>";
        echo "<td>" . number_format($average, 1) . "</td>";
        echo "<td class='$result_class'>$result</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<p><em>*Highlighted rows = failed at least one subject. Red marks = below pass mark ($pass_mark).</em></p>";

    // ---- Subject-wise Statistics using 2D array ----
    echo "<h3>2. Subject-wise Statistics</h3>";
    echo "<table>";
    echo "<tr><th>Subject</th><th>Highest</th><th>Lowest</th><th>Average</th><th>Pass Count</th></tr>";

    foreach ($subjects as $sub) {
        $marks = array_column($students, $sub);
        $highest   = max($marks);
        $lowest    = min($marks);
        $avg       = array_sum($marks) / count($marks);
        $pass_count = count(array_filter($marks, fn($m) => $m >= $pass_mark));

        echo "<tr>";
        echo "<td><strong>" . ucfirst($sub) . "</strong></td>";
        echo "<td class='pass'>$highest</td>";
        echo "<td class='fail'>$lowest</td>";
        echo "<td>" . number_format($avg, 1) . "</td>";
        echo "<td>$pass_count / " . count($students) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // ---- 2D Indexed Array example (matrix) ----
    echo "<h3>3. 2D Indexed Array (3×3 Matrix)</h3>";
    $matrix = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9]
    ];

    echo "<table style='width:auto'>";
    foreach ($matrix as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td style='width:50px'>$cell</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Accessing specific element
    echo "<p>Element at row 1, col 2: <strong>" . $matrix[1][2] . "</strong></p>"; // 6
    ?>
</body>
</html>
```

---

## Q13. How do you handle form submissions in PHP? Illustrate with example.

### Form Handling in PHP

**Form handling** is the process of receiving, validating, and processing data submitted via HTML forms.

**Key Steps:**
1. **Create HTML form** with `method` (GET/POST) and `action` (target script)
2. **Check submission** using `$_SERVER['REQUEST_METHOD']`
3. **Retrieve data** from `$_POST` or `$_GET`
4. **Validate input** — check empty, type, format, length
5. **Sanitize input** — clean data to prevent XSS (htmlspecialchars, trim, strip_tags)
6. **Process data** — save to database, send email, etc.
7. **Display result** or redirect

**Important Superglobals:**
- `$_POST['field']` — data from POST form
- `$_GET['field']` — data from GET form / URL
- `$_REQUEST['field']` — both POST and GET
- `$_FILES['field']` — uploaded file data

---

### Example: Student Registration Form

```php
<?php
// Initialize variables
$errors   = [];
$success  = '';
$name = $email = $age = $gender = $course = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // --- Retrieve and sanitize inputs ---
    $name   = trim(htmlspecialchars($_POST['name']));
    $email  = trim(htmlspecialchars($_POST['email']));
    $age    = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    $course = trim($_POST['course']);

    // --- Validation ---
    if (empty($name)) {
        $errors[] = "Full name is required.";
    } elseif (strlen($name) < 2) {
        $errors[] = "Name must be at least 2 characters.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($age)) {
        $errors[] = "Age is required.";
    } elseif (!is_numeric($age) || $age < 16 || $age > 60) {
        $errors[] = "Age must be a number between 16 and 60.";
    }

    if (empty($gender)) {
        $errors[] = "Please select a gender.";
    }

    if (empty($course)) {
        $errors[] = "Please select a course.";
    }

    // --- Process if no errors ---
    if (empty($errors)) {
        // Here you would typically save to DB
        // For demo, just display success message
        $success = "Registration successful! Welcome, $name.
                    You have been enrolled in $course.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
</head>
<body>
    <h2>Student Registration</h2>

    <!-- Display errors -->
    <?php if (!empty($errors)): ?>
        <div class="errors">
            <strong>Please fix the following errors:</strong>
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?= $err ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Display success -->
    <?php if ($success): ?>
        <div class="success"><?= $success ?></div>
    <?php endif; ?>

    <!-- Registration Form -->
    <form method="POST" action="">

        <label>Full Name *</label>
        <input type="text" name="name" value="<?= $name ?>"
               class="<?= in_array('Full name is required.', $errors) ? 'error-field' : '' ?>"
               placeholder="Enter your full name">

        <label>Email Address *</label>
        <input type="email" name="email" value="<?= $email ?>"
               placeholder="Enter your email">

        <label>Age *</label>
        <input type="number" name="age" value="<?= $age ?>"
               min="16" max="60" placeholder="Your age">

        <label>Gender *</label>
        <select name="gender">
            <option value="">-- Select Gender --</option>
            <option value="male"   <?= $gender == 'male'   ? 'selected' : '' ?>>Male</option>
            <option value="female" <?= $gender == 'female' ? 'selected' : '' ?>>Female</option>
            <option value="other"  <?= $gender == 'other'  ? 'selected' : '' ?>>Other</option>
        </select>

        <label>Course *</label>
        <select name="course">
            <option value="">-- Select Course --</option>
            <option value="BCSIT"  <?= $course == 'BCSIT'  ? 'selected' : '' ?>>BCSIT</option>
            <option value="BCA"    <?= $course == 'BCA'    ? 'selected' : '' ?>>BCA</option>
            <option value="BIT"    <?= $course == 'BIT'    ? 'selected' : '' ?>>BIT</option>
        </select>

        <button type="submit">Register Now</button>
    </form>
</body>
</html>
```

**Key Points:**
- `htmlspecialchars()` prevents XSS by converting `<`, `>`, `"` to HTML entities
- `trim()` removes leading/trailing whitespace
- `filter_var()` with `FILTER_VALIDATE_EMAIL` validates email format
- Values are re-populated in the form after submission (user-friendly)
- Errors collected in array and displayed together

---

## Q14. Define DBMS. Write a PHP script to perform CRUD operations on MySQL. Include examples of each operation.

### Database Management System (DBMS)

A **Database Management System (DBMS)** is software that enables users to create, manage, and interact with databases. It provides an interface between users/applications and the physical database storage.

**Key Functions of DBMS:**
- **Data Storage** — Organizes data in structured tables (RDBMS)
- **Data Retrieval** — Query language (SQL) to fetch required data
- **Data Manipulation** — INSERT, UPDATE, DELETE records
- **Data Security** — User roles, permissions, authentication
- **Data Integrity** — Constraints (PRIMARY KEY, FOREIGN KEY, NOT NULL)
- **Concurrency Control** — Handle multiple users accessing data simultaneously
- **Backup and Recovery** — Protect against data loss

**Example DBMS:** MySQL, PostgreSQL, Oracle, MS SQL Server, SQLite

**MySQL** is the most popular RDBMS used with PHP.

---

### PHP CRUD Script: Complete Example

**Database Setup:**
```sql
CREATE DATABASE school;
USE school;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    course VARCHAR(50),
    marks INT DEFAULT 0,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

**`crud.php` — Full CRUD Application:**
```php
<?php
// ==================== DATABASE CONNECTION ====================
$conn = mysqli_connect("localhost", "root", "", "school");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$msg = "";

// ==================== CREATE (INSERT) ====================
if (isset($_POST['insert'])) {
    $name   = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email  = mysqli_real_escape_string($conn, trim($_POST['email']));
    $course = mysqli_real_escape_string($conn, trim($_POST['course']));
    $marks  = (int)$_POST['marks'];

    if (!empty($name) && !empty($email)) {
        $sql = "INSERT INTO students (name, email, course, marks)
                VALUES ('$name', '$email', '$course', $marks)";

        if (mysqli_query($conn, $sql)) {
            $msg = "success|Student '$name' inserted successfully! (ID: " . mysqli_insert_id($conn) . ")";
        } else {
            $msg = "error|Insert failed: " . mysqli_error($conn);
        }
    } else {
        $msg = "error|Name and Email are required.";
    }
}

// ==================== UPDATE ====================
if (isset($_POST['update'])) {
    $id     = (int)$_POST['id'];
    $name   = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email  = mysqli_real_escape_string($conn, trim($_POST['email']));
    $course = mysqli_real_escape_string($conn, trim($_POST['course']));
    $marks  = (int)$_POST['marks'];

    $sql = "UPDATE students
            SET name='$name', email='$email', course='$course', marks=$marks
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $affected = mysqli_affected_rows($conn);
        $msg = "success|Student updated successfully! ($affected row affected)";
    } else {
        $msg = "error|Update failed: " . mysqli_error($conn);
    }
}

// ==================== DELETE ====================
if (isset($_GET['delete'])) {
    $id  = (int)$_GET['delete'];
    $sql = "DELETE FROM students WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $msg = "success|Student with ID $id deleted successfully!";
    } else {
        $msg = "error|Delete failed: " . mysqli_error($conn);
    }
}

// Pre-fill form for editing
$edit = null;
if (isset($_GET['edit'])) {
    $id     = (int)$_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
    $edit   = mysqli_fetch_assoc($result);
}

// ==================== READ (SELECT ALL) ====================
$students = mysqli_query($conn, "SELECT * FROM students ORDER BY enrolled_at DESC");

// Parse message
[$msg_type, $msg_text] = $msg ? explode('|', $msg, 2) : ['', ''];
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD — Student Database</title>
</head>
<body>
    <h2>Student CRUD — PHP + MySQL</h2>

    <?php if ($msg_text): ?>
        <div class="<?= $msg_type ?>"><?= htmlspecialchars($msg_text) ?></div>
    <?php endif; ?>

    <!-- ===== INSERT / UPDATE FORM ===== -->
    <h3><?= $edit ? 'Edit Student (UPDATE)' : 'Add New Student (INSERT)' ?></h3>
    <form method="POST">
        <?php if ($edit): ?>
            <input type="hidden" name="id" value="<?= $edit['id'] ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required
                   value="<?= $edit ? htmlspecialchars($edit['name']) : '' ?>" placeholder="Full Name">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required
                   value="<?= $edit ? htmlspecialchars($edit['email']) : '' ?>" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Course:</label>
            <select name="course">
                <?php foreach (['BCSIT','BCA','BIT','BSc.CSIT'] as $c): ?>
                    <option value="<?= $c ?>" <?= ($edit && $edit['course']==$c) ? 'selected' : '' ?>>
                        <?= $c ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Marks:</label>
            <input type="number" name="marks" min="0" max="100"
                   value="<?= $edit ? $edit['marks'] : '0' ?>">
        </div>

        <?php if ($edit): ?>
            <button type="submit" name="update" class="btn btn-warning">Update Student</button>
            <a href="crud.php"><button type="button" class="btn btn-primary">Cancel</button></a>
        <?php else: ?>
            <button type="submit" name="insert" class="btn btn-primary">Add Student</button>
        <?php endif; ?>
    </form>

    <!-- ===== READ — Display All Records ===== -->
    <h3>All Students (READ / SELECT)</h3>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Course</th>
            <th>Marks</th><th>Enrolled At</th><th>Actions</th>
        </tr>
        <?php if (mysqli_num_rows($students) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($students)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= $row['course'] ?></td>
                    <td><?= $row['marks'] ?><?= $row['marks'] >= 40 ? ' ✓' : ' ✗' ?></td>
                    <td><?= date("d M Y", strtotime($row['enrolled_at'])) ?></td>
                    <td>
                        <a href="?edit=<?= $row['id'] ?>">
                            <button class="btn btn-warning">Edit</button>
                        </a>
                        <a href="?delete=<?= $row['id'] ?>"
                           onclick="return confirm('Delete <?= addslashes($row['name']) ?>?')">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7">No records found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
<?php mysqli_close($conn); ?>
```

**CRUD Flow Summary:**

| Operation | SQL Command | PHP Function                      |
|-----------|-------------|-----------------------------------|
| Create    | `INSERT INTO` | `mysqli_query()` + `mysqli_insert_id()` |
| Read      | `SELECT`      | `mysqli_query()` + `mysqli_fetch_assoc()` |
| Update    | `UPDATE ... SET` | `mysqli_query()` + `mysqli_affected_rows()` |
| Delete    | `DELETE FROM` | `mysqli_query()`                  |

---

## Q15. Explain MVC architecture and its implementation in Laravel. Discuss the benefits.

### MVC Architecture

**MVC (Model-View-Controller)** is a software architectural pattern that separates an application into three distinct components, each responsible for a specific concern.

```
[User Request]
      ↓
[Controller] — receives request, orchestrates flow
      ↓              ↑
   [Model]    ← →  [Database]
      ↓
   [View]  — renders HTML to user
      ↓
[User Response]
```

### Role of Each Component

**1. Model**
- Manages **data and business logic**
- Communicates directly with the database
- Validates data and enforces business rules
- Independent of how data is displayed
- *Example:* A `Post` model fetches/saves blog posts from DB

**2. View**
- Handles **presentation layer** (HTML/UI)
- Receives data from Controller and renders it
- Contains minimal logic — only display logic
- Should NOT access the database directly
- *Example:* A Blade template (`posts.blade.php`) displaying blog posts

**3. Controller**
- Acts as the **middleman** (glue)
- Receives HTTP requests from the user/browser
- Calls Model to get or save data
- Passes data to the appropriate View
- Handles routing responses and redirects
- *Example:* `PostController` handles create, read, update, delete actions

---

### MVC in Laravel

Laravel implements MVC with clean conventions and powerful tools:

**1. Routes** (`routes/web.php`)
```php
use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);

// Or shorter with Resource Route:
Route::resource('posts', PostController::class);
```

**2. Model** (`app/Models/Post.php`)
```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = ['title', 'content', 'author'];

    // Eloquent ORM — no raw SQL needed!
    // Post::all()          → SELECT * FROM posts
    // Post::find($id)      → SELECT * FROM posts WHERE id = ?
    // Post::create([...])  → INSERT INTO posts ...
    // $post->update([...]) → UPDATE posts SET ...
    // $post->delete()      → DELETE FROM posts WHERE id = ?
}
```

**3. Controller** (`app/Http/Controllers/PostController.php`)
```php
<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'   => 'required|min:3|max:255',
            'content' => 'required',
            'author'  => 'required',
        ]);

        Post::create($request->all());
        return redirect('/posts')->with('success', 'Post created!');
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function destroy($id) {
        Post::findOrFail($id)->delete();
        return redirect('/posts')->with('success', 'Post deleted!');
    }
}
```

**4. View** (`resources/views/posts/index.blade.php`)
```html
<!DOCTYPE html>
<html>
<head><title>Blog Posts</title></head>
<body>
    <h1>All Posts</h1>
    <a href="/posts/create">New Post</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @foreach($posts as $post)
        <div>
            <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
            <p>By {{ $post->author }}</p>
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
</body>
</html>
```

---

### Benefits of Using Laravel Framework

| Benefit | Description |
|---------|-------------|
| **MVC Structure** | Clean separation; easier to maintain and scale |
| **Eloquent ORM** | Database operations using PHP objects — no raw SQL needed |
| **Blade Templating** | Reusable, clean templates with directives (`@if`, `@foreach`) |
| **Built-in Auth** | Ready-made login, registration, password reset (Laravel Breeze/Jetstream) |
| **Artisan CLI** | `php artisan make:model`, `make:controller`, `migrate` — generate code fast |
| **Migrations** | Version-control your database schema in PHP files |
| **Validation** | `$request->validate()` — clean, readable form validation rules |
| **Security** | CSRF protection, SQL injection prevention, XSS filtering built-in |
| **Routing** | Clean, RESTful URLs with minimal code |
| **Composer Support** | Thousands of packages available via Composer |

---

## Q16. Discuss the steps to set up a PHP development environment using XAMPP. Explain different types of operators with examples.

### Setting Up PHP Development Environment with XAMPP

**XAMPP** is a free, open-source cross-platform web server package that bundles:
- **X** — Cross-platform (Windows, Mac, Linux)
- **A** — Apache (web server)
- **M** — MariaDB/MySQL (database)
- **P** — PHP (server-side language)
- **P** — Perl (scripting language)

---

**Step-by-Step Setup:**

**Step 1: Download XAMPP**
- Visit the official Apache Friends website and download the installer for your OS (Windows/Mac/Linux).

**Step 2: Install XAMPP**
- Run the installer, select components: Apache, MySQL, PHP, phpMyAdmin.
- Choose installation directory (e.g., `C:\xampp` on Windows).
- Complete installation and open XAMPP Control Panel.

**Step 3: Start Services**
- Open XAMPP Control Panel.
- Click **Start** next to **Apache** (web server on port 80).
- Click **Start** next to **MySQL** (database on port 3306).
- Green indicators confirm services are running.

**Step 4: Verify Installation**
- Open browser and go to `http://localhost`
- You should see the XAMPP welcome page.
- Go to `http://localhost/phpmyadmin` to access phpMyAdmin (database GUI).

**Step 5: Create Your PHP Project**
- Navigate to `C:\xampp\htdocs\` (the web root directory).
- Create a new folder for your project: `C:\xampp\htdocs\myproject\`
- Create `index.php` inside it:
```php
<?php
  phpinfo();  // Shows all PHP configuration
?>
```
- Open browser: `http://localhost/myproject/index.php`

**Step 6: Create a Database**
- Open phpMyAdmin: `http://localhost/phpmyadmin`
- Click "New" → Enter database name → Click "Create"
- Create tables and manage data via GUI or SQL tab.

**Step 7: Write PHP Code**
- Use any text editor or IDE (VS Code, PhpStorm, Sublime Text)
- Install VS Code extension: PHP Intelephense for code completion.

---

### Types of Operators in PHP with Examples

#### 1. Arithmetic Operators
```php
<?php
$a = 15; $b = 4;
echo $a + $b;   // 19 — Addition
echo $a - $b;   // 11 — Subtraction
echo $a * $b;   // 60 — Multiplication
echo $a / $b;   // 3.75 — Division
echo $a % $b;   // 3 — Modulus (remainder)
echo $a ** $b;  // 50625 — Exponentiation (15^4)
?>
```

#### 2. Assignment Operators
```php
<?php
$x = 10;        // Assign 10 to $x
$x += 5;        // $x = $x + 5 → 15
$x -= 3;        // $x = $x - 3 → 12
$x *= 2;        // $x = $x * 2 → 24
$x /= 4;        // $x = $x / 4 → 6
$x %= 4;        // $x = $x % 4 → 2
$str  = "Hello";
$str .= " World"; // Concatenation assign → "Hello World"
?>
```

#### 3. Comparison Operators
```php
<?php
$a = 10; $b = "10";
var_dump($a == $b);   // true  — equal value (loose)
var_dump($a === $b);  // false — identical (value + type)
var_dump($a != $b);   // false — not equal
var_dump($a !== $b);  // true  — not identical
var_dump($a > 5);     // true  — greater than
var_dump($a < 5);     // false — less than
var_dump($a >= 10);   // true  — greater than or equal
var_dump($a <=> 10);  // 0     — spaceship (0=equal, 1=greater, -1=less)
?>
```

#### 4. Logical Operators
```php
<?php
$age  = 20;
$pass = true;

var_dump($age >= 18 && $pass);   // true  — AND (both must be true)
var_dump($age < 18 || $pass);    // true  — OR (at least one true)
var_dump(!$pass);                // false — NOT (inverts boolean)
var_dump($age >= 18 and $pass);  // true  — and (lower precedence)
var_dump($age < 18 or  $pass);   // true  — or  (lower precedence)
?>
```

#### 5. String Operators
```php
<?php
$first = "Hello";
$last  = "World";

$full  = $first . " " . $last;   // Concatenation → "Hello World"
$first .= " PHP";                 // Append → "Hello PHP"
echo $full;
?>
```

#### 6. Increment / Decrement Operators
```php
<?php
$n = 5;
echo $n++;  // 5 — post-increment (use then increment)
echo $n;    // 6
echo ++$n;  // 7 — pre-increment (increment then use)
echo $n--;  // 7 — post-decrement
echo --$n;  // 5 — pre-decrement
?>
```

#### 7. Bitwise Operators
```php
<?php
$a = 6;  // binary: 110
$b = 3;  // binary: 011

echo $a & $b;   // 2 (010) — AND
echo $a | $b;   // 7 (111) — OR
echo $a ^ $b;   // 5 (101) — XOR
echo ~$a;       // -7      — NOT
echo $a << 1;   // 12      — Left shift
echo $a >> 1;   // 3       — Right shift
?>
```

#### 8. Ternary and Null Coalescing Operators
```php
<?php
$marks = 55;
$grade = ($marks >= 40) ? "Pass" : "Fail";  // Ternary

$username = $_GET['user'] ?? "Guest";        // Null coalescing
$value    = null;
echo $value ?? "Default";                    // "Default"
?>
```

---
---

# Section "C" — Long Answer Questions
*(Attempt any two questions. [2×15=30])*

---

## Q17. Write PHP code: (a) Insert customer form → DB, (b) Display records, (c) Delete records, (d) Edit records. [DB: "PU", Table: "record"]

### Database Setup

```sql
CREATE DATABASE PU;
USE PU;

CREATE TABLE record (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(15),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

### `db.php` — Connection File

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "PU");
if (!$conn) {
    die("<p style='color:red'>Database connection failed: " . mysqli_connect_error() . "</p>");
}
?>
```

---

### `index.php` — Main CRUD Application (with full layout)

```php
<?php
include 'db.php';

$message = '';
$msg_type = '';

// ========== (a) INSERT — Create Customer ==========
if (isset($_POST['insert'])) {
    $name    = mysqli_real_escape_string($conn, trim($_POST['full_name']));
    $email   = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone   = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));

    if (empty($name) || empty($email)) {
        $message  = "Name and Email are required!";
        $msg_type = "danger";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message  = "Invalid email format!";
        $msg_type = "danger";
    } else {
        $sql = "INSERT INTO record (full_name, email, phone, address)
                VALUES ('$name', '$email', '$phone', '$address')";

        if (mysqli_query($conn, $sql)) {
            $message  = "Customer '{$name}' added successfully! (ID: " . mysqli_insert_id($conn) . ")";
            $msg_type = "success";
        } else {
            $message  = "Insert error: " . mysqli_error($conn);
            $msg_type = "danger";
        }
    }
}

// ========== (d) UPDATE — Edit Customer ==========
if (isset($_POST['update'])) {
    $id      = (int)$_POST['id'];
    $name    = mysqli_real_escape_string($conn, trim($_POST['full_name']));
    $email   = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone   = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));

    $sql = "UPDATE record
            SET full_name='$name', email='$email', phone='$phone', address='$address'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $message  = "Customer record updated successfully!";
        $msg_type = "success";
    } else {
        $message  = "Update error: " . mysqli_error($conn);
        $msg_type = "danger";
    }
}

// ========== (c) DELETE — Delete Customer ==========
if (isset($_GET['delete'])) {
    $id  = (int)$_GET['delete'];
    $sql = "DELETE FROM record WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $message  = "Record ID $id deleted successfully!";
        $msg_type = "success";
    } else {
        $message  = "Delete error: " . mysqli_error($conn);
        $msg_type = "danger";
    }
}

// Fetch data for editing
$edit_record = null;
if (isset($_GET['edit'])) {
    $id     = (int)$_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM record WHERE id=$id");
    $edit_record = mysqli_fetch_assoc($result);
}

// ========== (b) READ — Fetch All Records ==========
$records = mysqli_query($conn, "SELECT * FROM record ORDER BY created_at DESC");
$total   = mysqli_num_rows($records);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management System — PU</title>
</head>
<body>

<!-- HEADER -->
<header>
    <h1>Customer Management System</h1>
    <span>Database: PU &nbsp;|&nbsp; Table: record &nbsp;|&nbsp; Pokhara University</span>
</header>

<div class="container">

    <!-- STATS BAR -->
    <div class="stats">
        <div class="stat-item">
            <div class="stat-num"><?= $total ?></div>
            <div class="stat-lbl">Total Customers</div>
        </div>
        <div class="stat-item">
            <div class="stat-num"><?= date("d M Y") ?></div>
            <div class="stat-lbl">Today's Date</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">PU</div>
            <div class="stat-lbl">Database</div>
        </div>
    </div>

    <!-- ALERT MESSAGE -->
    <?php if ($message): ?>
        <div class="alert alert-<?= $msg_type ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="grid">

        <!-- ===== LEFT: INSERT / UPDATE FORM ===== -->
        <div>
            <div class="card">
                <div class="card-title">
                    <?= $edit_record ? 'Edit Customer Record' : 'Add New Customer' ?>
                </div>

                <form method="POST">
                    <?php if ($edit_record): ?>
                        <input type="hidden" name="id" value="<?= $edit_record['id'] ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Full Name *</label>
                        <input type="text" name="full_name" required
                               value="<?= $edit_record ? htmlspecialchars($edit_record['full_name']) : '' ?>"
                               placeholder="Enter customer name">
                    </div>

                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" name="email" required
                               value="<?= $edit_record ? htmlspecialchars($edit_record['email']) : '' ?>"
                               placeholder="customer@email.com">
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" name="phone"
                               value="<?= $edit_record ? htmlspecialchars($edit_record['phone']) : '' ?>"
                               placeholder="98XXXXXXXX">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address"
                                  placeholder="Enter address"><?= $edit_record ? htmlspecialchars($edit_record['address']) : '' ?></textarea>
                    </div>

                    <?php if ($edit_record): ?>
                        <button type="submit" name="update" class="btn btn-warning">Update Record</button>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                    <?php else: ?>
                        <button type="submit" name="insert" class="btn btn-primary">Add Customer</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <!-- ===== RIGHT: DISPLAY RECORDS ===== -->
        <div>
            <div class="card">
                <div class="card-title">
                    Customer Records
                    <span class="badge"><?= $total ?> Total</span>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Date Added</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($total > 0): ?>
                            <?php $sn = 1; while ($row = mysqli_fetch_assoc($records)): ?>
                                <tr>
                                    <td><?= $sn++ ?></td>
                                    <td><strong><?= htmlspecialchars($row['full_name']) ?></strong></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= htmlspecialchars($row['phone'] ?: '—') ?></td>
                                    <td><?= htmlspecialchars(substr($row['address'] ?: '—', 0, 30)) ?></td>
                                    <td><?= date("d M Y", strtotime($row['created_at'])) ?></td>
                                    <td>
                                        <!-- EDIT -->
                                        <a href="?edit=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <!-- DELETE -->
                                        <a href="?delete=<?= $row['id'] ?>"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Delete <?= addslashes(htmlspecialchars($row['full_name'])) ?>?')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">
                                    No customer records found. Add your first customer!
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div><!-- end grid -->
</div><!-- end container -->

<footer>
    &copy; <?= date('Y') ?> Pokhara University — Customer Management System | PHP + MySQL
</footer>

</body>
</html>
<?php mysqli_close($conn); ?>
```

---

## Q18. Describe session-based authentication and authorization in PHP. Include code and explain how to manage sessions securely.

### Session-Based Authentication in PHP

**Authentication** verifies *who* the user is (login check).
**Authorization** determines *what* the authenticated user is allowed to do (role/permission check).

**How Sessions Work:**
1. User submits login credentials (username + password).
2. Server verifies against database.
3. On success: `session_start()` creates a unique **session ID**.
4. Session data (`$_SESSION`) is stored **server-side**.
5. Session ID sent to browser as a cookie (`PHPSESSID`).
6. On each request, browser sends the cookie → server looks up session.
7. Server checks `$_SESSION` to verify login status.
8. On logout: session is destroyed server-side.

**Security Considerations:**
- Use `session_regenerate_id(true)` after login to prevent **session fixation**.
- Use `HTTPS` to protect session cookie in transit.
- Set `session.cookie_httponly = true` to prevent JavaScript access to cookie.
- Set `session.cookie_secure = true` for HTTPS-only cookies.
- Store **hashed passwords** (`password_hash()` / `password_verify()`).
- Set session **timeout** to auto-logout idle users.
- Never store passwords in sessions — store user ID and role.

---

### Database Setup

```sql
CREATE DATABASE auth_db;
USE auth_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,       -- bcrypt hashed
    role ENUM('admin', 'user') DEFAULT 'user',
    is_active TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert test users (passwords hashed with bcrypt)
-- Admin: admin / Admin@123
-- User:  john / User@456
INSERT INTO users (username, email, password, role) VALUES
('admin', 'admin@example.com', '$2y$10$YourHashedPasswordHere', 'admin'),
('john',  'john@example.com',  '$2y$10$YourHashedPasswordHere', 'user');
```

---

### `config.php` — Secure Session Configuration

```php
<?php
// Secure session settings (call before session_start)
function configureSession() {
    // Prevent JavaScript from reading session cookie (XSS protection)
    ini_set('session.cookie_httponly', 1);

    // Only send cookie over HTTPS (enable in production)
    // ini_set('session.cookie_secure', 1);

    // Prevent session ID from being passed in URL
    ini_set('session.use_only_cookies', 1);

    // Session lifetime (30 minutes)
    ini_set('session.gc_maxlifetime', 1800);

    session_start();
}

function getDB() {
    $conn = mysqli_connect("localhost", "root", "", "auth_db");
    if (!$conn) die("DB Error: " . mysqli_connect_error());
    return $conn;
}

// Check if user is authenticated; redirect if not
function requireLogin() {
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
        header("Location: login.php");
        exit();
    }

    // Session timeout check (30 minutes of inactivity)
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
        session_unset();
        session_destroy();
        header("Location: login.php?timeout=1");
        exit();
    }
    $_SESSION['last_activity'] = time();
}

// Check if user has required role
function requireRole($role) {
    requireLogin();
    if ($_SESSION['role'] !== $role) {
        header("Location: dashboard.php?error=unauthorized");
        exit();
    }
}
?>
```

---

### `register.php` — User Registration

```php
<?php
require_once 'config.php';
configureSession();

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$errors  = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    // Validation
    if (empty($username) || strlen($username) < 3)
        $errors[] = "Username must be at least 3 characters.";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = "Invalid email address.";

    if (strlen($password) < 6)
        $errors[] = "Password must be at least 6 characters.";

    if ($password !== $confirm)
        $errors[] = "Passwords do not match.";

    if (empty($errors)) {
        $conn = getDB();

        // Check if username/email already exists
        $check = mysqli_query($conn, "SELECT id FROM users
                                      WHERE username='$username' OR email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $errors[] = "Username or email already exists.";
        } else {
            // Hash password using bcrypt
            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$hashed')";

            if (mysqli_query($conn, $sql)) {
                $success = "Registration successful! <a href='login.php'>Login here</a>.";
            } else {
                $errors[] = "Registration failed: " . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Register</title>
</head>
<body>
    <h2>Create Account</h2>

    <?php if (!empty($errors)): ?>
        <div class="errors"><ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success"><?= $success ?></div>
    <?php else: ?>
        <form method="POST">
            <input type="text"     name="username"         placeholder="Username" required>
            <input type="email"    name="email"            placeholder="Email" required>
            <input type="password" name="password"         placeholder="Password (min 6 chars)" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    <?php endif; ?>
</body>
</html>
```

---

### `login.php` — Secure Login with Sessions

```php
<?php
require_once 'config.php';
configureSession();

// Already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "Please enter username and password.";
    } else {
        $conn = getDB();
        $username_esc = mysqli_real_escape_string($conn, $username);

        // Fetch user by username
        $result = mysqli_query($conn, "SELECT * FROM users
                                       WHERE username='$username_esc' AND is_active=1");

        if ($row = mysqli_fetch_assoc($result)) {
            // Verify password using password_verify() — works with bcrypt hash
            if (password_verify($password, $row['password'])) {

                // SECURITY: Regenerate session ID to prevent session fixation
                session_regenerate_id(true);

                // Store user info in session (never store password!)
                $_SESSION['user_id']       = $row['id'];
                $_SESSION['username']      = $row['username'];
                $_SESSION['role']          = $row['role'];
                $_SESSION['logged_in']     = true;
                $_SESSION['login_time']    = time();
                $_SESSION['last_activity'] = time();

                header("Location: dashboard.php");
                exit();

            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($_GET['timeout'])): ?>
        <div class="timeout">Session expired. Please login again.</div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text"     name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>No account? <a href="register.php">Register</a></p>
</body>
</html>
```

---

### `dashboard.php` — Protected Page (Authentication)

```php
<?php
require_once 'config.php';
configureSession();
requireLogin(); // Redirects to login.php if not authenticated
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title>
</head>
<body>
    <div class="nav">
        <span>Welcome, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>
              <span class="role-badge"><?= strtoupper($_SESSION['role']) ?></span>
        </span>
        <a href="logout.php">Logout</a>
    </div>

    <div class="card">
        <h2>Dashboard</h2>
        <p>Login time: <?= date("d M Y H:i:s", $_SESSION['login_time']) ?></p>
        <p>Your role: <strong><?= $_SESSION['role'] ?></strong></p>

        <h3>Your Privileges:</h3>
        <ul>
            <li>View your profile</li>
            <li>Browse content</li>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <!-- Authorization: Only admin sees this -->
                <li><a href="admin.php">Admin Panel</a></li>
                <li>Manage all users</li>
                <li>Access all records</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
```

---

### `admin.php` — Role-Based Authorization

```php
<?php
require_once 'config.php';
configureSession();
requireRole('admin'); // Only admin can access — others are redirected
?>
<html>
<body>
    <h2>Admin Panel</h2>
    <p>Welcome, Admin <?= htmlspecialchars($_SESSION['username']) ?>!</p>
    <p>Only users with the 'admin' role can see this page.</p>
</body>
</html>
```

---

### `logout.php` — Secure Logout

```php
<?php
require_once 'config.php';
configureSession();

// Clear all session variables
$_SESSION = [];

// Delete the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session on server
session_destroy();

header("Location: login.php");
exit();
?>
```

**Session Security Summary:**

| Threat | Protection |
|--------|-----------|
| Session Fixation | `session_regenerate_id(true)` after login |
| XSS Cookie Theft | `session.cookie_httponly = 1` |
| Network Sniffing | HTTPS + `session.cookie_secure = 1` |
| Session Hijacking | Short session timeout, IP binding |
| Brute Force | Rate limiting, CAPTCHA on login |
| Password Leaks | `password_hash()` + `password_verify()` (bcrypt) |

---

## Q19. Discuss OOP principles in PHP focusing on encapsulation and inheritance. Write a program to demonstrate these principles.

### Object-Oriented Programming — Encapsulation & Inheritance

---

### 1. Encapsulation

**Encapsulation** is the OOP principle of **bundling data (properties) and methods (behaviors) into a single unit (class)** and **restricting direct access** to internal data using access modifiers.

**Access Modifiers:**
| Modifier    | Class | Subclass | Outside |
|-------------|-------|----------|---------|
| `public`    | ✓     | ✓        | ✓       |
| `protected` | ✓     | ✓        | ✗       |
| `private`   | ✓     | ✗        | ✗       |

**Benefits of Encapsulation:**
- **Data hiding** — prevents accidental modification of internal state
- **Validation** — setter methods can validate before changing values
- **Flexibility** — internal implementation can change without affecting external code
- **Security** — sensitive data remains controlled

**Getters and Setters** are the standard way to provide controlled access:
```php
// Getter — read access
public function getName() { return $this->name; }

// Setter — write access with validation
public function setAge($age) {
    if ($age > 0 && $age < 150) $this->age = $age;
}
```

---

### 2. Inheritance

**Inheritance** is the OOP principle where a **child class (subclass)** acquires the properties and methods of a **parent class (superclass)** using the `extends` keyword.

**Key Concepts:**
- **`extends`** — defines inheritance relationship
- **`parent::`** — calls parent class methods/constructor
- **Method Overriding** — child redefines a parent method with the same name
- **`final`** — prevents a class or method from being inherited/overridden
- **`abstract`** — forces child classes to implement certain methods

**Benefits of Inheritance:**
- **Code Reusability** — common code in parent; child only adds specific code
- **Extensibility** — easily add new child classes with specialized behavior
- **Logical Hierarchy** — models real-world "is-a" relationships (Dog is-a Animal)
- **Polymorphism** — different child classes can be used interchangeably

---

### Complete PHP Program: Encapsulation + Inheritance

```php
<?php

// =============================================================
//  BASE CLASS: Employee (Encapsulation + reusable properties)
// =============================================================
class Employee {
    // Private — only accessible within Employee class
    private $id;
    private $name;
    private $email;

    // Protected — accessible in Employee and its subclasses
    protected $baseSalary;
    protected $department;

    // Public — accessible everywhere
    public $position;

    // Constructor
    public function __construct($id, $name, $email, $baseSalary, $department, $position) {
        $this->id         = $id;
        $this->name       = $name;
        $this->department = $department;
        $this->position   = $position;

        // Use setter for validation
        $this->setEmail($email);
        $this->setBaseSalary($baseSalary);
    }

    // ---- GETTERS (controlled read access) ----
    public function getId()         { return $this->id; }
    public function getName()       { return $this->name; }
    public function getEmail()      { return $this->email; }
    public function getBaseSalary() { return $this->baseSalary; }
    public function getDepartment() { return $this->department; }

    // ---- SETTERS (controlled write access with validation) ----
    public function setName($name) {
        if (strlen(trim($name)) >= 2) {
            $this->name = trim($name);
        } else {
            throw new InvalidArgumentException("Name must be at least 2 characters.");
        }
    }

    public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new InvalidArgumentException("Invalid email: $email");
        }
    }

    public function setBaseSalary($salary) {
        if ($salary >= 0) {
            $this->baseSalary = $salary;
        } else {
            throw new InvalidArgumentException("Salary cannot be negative.");
        }
    }

    // ---- Common Methods ----
    public function calculateSalary() {
        return $this->baseSalary;  // Base implementation
    }

    public function getDetails() {
        return [
            'ID'          => $this->id,
            'Name'        => $this->name,
            'Email'       => $this->email,
            'Department'  => $this->department,
            'Position'    => $this->position,
            'Base Salary' => 'Rs. ' . number_format($this->baseSalary),
        ];
    }

    public function displayInfo() {
        echo "=== Employee Info ===\n";
        foreach ($this->getDetails() as $key => $val) {
            echo str_pad($key, 14) . ": $val\n";
        }
    }
}


// =============================================================
//  CHILD CLASS: FullTimeEmployee (Inheritance from Employee)
// =============================================================
class FullTimeEmployee extends Employee {
    private $bonus;
    private $taxRate;

    public function __construct($id, $name, $email, $baseSalary, $department, $bonus = 5000, $taxRate = 0.10) {
        // Call parent constructor using parent::
        parent::__construct($id, $name, $email, $baseSalary, $department, 'Full-Time');
        $this->bonus   = $bonus;
        $this->taxRate = $taxRate;
    }

    // Override parent method (Polymorphism)
    public function calculateSalary() {
        $gross = $this->baseSalary + $this->bonus;
        $tax   = $gross * $this->taxRate;
        return $gross - $tax;  // Net salary
    }

    public function getBonus()   { return $this->bonus; }
    public function getTaxRate() { return ($this->taxRate * 100) . '%'; }

    // Extend parent method
    public function getDetails() {
        $details = parent::getDetails();  // Get parent details
        $details['Bonus']      = 'Rs. ' . number_format($this->bonus);
        $details['Tax Rate']   = $this->getTaxRate();
        $details['Net Salary'] = 'Rs. ' . number_format($this->calculateSalary());
        return $details;
    }
}


// =============================================================
//  CHILD CLASS: PartTimeEmployee (Inheritance from Employee)
// =============================================================
class PartTimeEmployee extends Employee {
    private $hoursWorked;
    private $hourlyRate;

    public function __construct($id, $name, $email, $department, $hoursWorked, $hourlyRate) {
        $baseSalary = $hoursWorked * $hourlyRate;
        parent::__construct($id, $name, $email, $baseSalary, $department, 'Part-Time');
        $this->hoursWorked = $hoursWorked;
        $this->hourlyRate  = $hourlyRate;
    }

    // Override calculateSalary
    public function calculateSalary() {
        return $this->hoursWorked * $this->hourlyRate;
    }

    public function getDetails() {
        $details = parent::getDetails();
        $details['Hours Worked'] = $this->hoursWorked . ' hrs';
        $details['Hourly Rate']  = 'Rs. ' . number_format($this->hourlyRate);
        $details['Total Pay']    = 'Rs. ' . number_format($this->calculateSalary());
        return $details;
    }
}


// =============================================================
//  CHILD CLASS: Manager (Multi-level Inheritance)
// =============================================================
class Manager extends FullTimeEmployee {
    private $teamSize;
    private $managementAllowance;

    public function __construct($id, $name, $email, $baseSalary, $teamSize) {
        parent::__construct($id, $name, $email, $baseSalary, 'Management', 15000, 0.15);
        $this->teamSize            = $teamSize;
        $this->managementAllowance = $teamSize * 1000;
        $this->position = 'Manager';
    }

    // Override calculateSalary — Manager gets extra allowance
    public function calculateSalary() {
        return parent::calculateSalary() + $this->managementAllowance;
    }

    public function getDetails() {
        $details = parent::getDetails();
        $details['Team Size']    = $this->teamSize . ' employees';
        $details['Mgmt Allow.']  = 'Rs. ' . number_format($this->managementAllowance);
        $details['Total Salary'] = 'Rs. ' . number_format($this->calculateSalary());
        return $details;
    }
}


// =============================================================
//  DEMONSTRATION
// =============================================================

// Create objects
$emp1 = new FullTimeEmployee(101, "Alice Sharma",   "alice@company.com",   50000, "IT",      8000, 0.10);
$emp2 = new PartTimeEmployee(102, "Bob Thapa",      "bob@company.com",     "Sales",    80,  250);
$mgr  = new Manager(         103, "Carol Maharjan", "carol@company.com",   80000, 5);

echo "\n";

// Display FullTimeEmployee
echo "====== FULL-TIME EMPLOYEE ======\n";
foreach ($emp1->getDetails() as $key => $val) {
    echo str_pad($key, 15) . ": $val\n";
}

echo "\n====== PART-TIME EMPLOYEE ======\n";
foreach ($emp2->getDetails() as $key => $val) {
    echo str_pad($key, 15) . ": $val\n";
}

echo "\n====== MANAGER (inherits FullTimeEmployee) ======\n";
foreach ($mgr->getDetails() as $key => $val) {
    echo str_pad($key, 15) . ": $val\n";
}

// Demonstrate Encapsulation — setter validation
echo "\n====== ENCAPSULATION DEMO ======\n";
try {
    $emp1->setEmail("invalid-email");  // Will throw exception
} catch (InvalidArgumentException $e) {
    echo "Caught error: " . $e->getMessage() . "\n";
}

try {
    $emp1->setBaseSalary(-5000);       // Negative salary — rejected
} catch (InvalidArgumentException $e) {
    echo "Caught error: " . $e->getMessage() . "\n";
}

// Private property cannot be accessed directly
// echo $emp1->id;     // ERROR: Cannot access private property
// echo $emp1->name;   // ERROR: Cannot access private property
echo "ID (via getter): " . $emp1->getId() . "\n";   // Works — via getter
echo "Name (via getter): " . $emp1->getName() . "\n";

// Demonstrate Polymorphism — same method, different behavior
echo "\n====== POLYMORPHISM DEMO (calculateSalary) ======\n";
$employees = [$emp1, $emp2, $mgr];
foreach ($employees as $emp) {
    echo get_class($emp) . " ({$emp->getName()}): Rs. " .
         number_format($emp->calculateSalary()) . "\n";
}
?>
```

**Expected Output:**
```
====== FULL-TIME EMPLOYEE ======
ID             : 101
Name           : Alice Sharma
Email          : alice@company.com
Department     : IT
Position       : Full-Time
Base Salary    : Rs. 50,000
Bonus          : Rs. 8,000
Tax Rate       : 10%
Net Salary     : Rs. 52,200

====== PART-TIME EMPLOYEE ======
ID             : 102
Name           : Bob Thapa
...
Total Pay      : Rs. 20,000

====== MANAGER ======
ID             : 103
...
Total Salary   : Rs. 88,650

====== ENCAPSULATION DEMO ======
Caught error: Invalid email: invalid-email
Caught error: Salary cannot be negative.
ID (via getter): 101
Name (via getter): Alice Sharma

====== POLYMORPHISM DEMO ======
FullTimeEmployee (Alice Sharma): Rs. 52,200
PartTimeEmployee (Bob Thapa): Rs. 20,000
Manager (Carol Maharjan): Rs. 88,650
```

**Key OOP Concepts Demonstrated:**

| Concept | Where Used |
|---------|-----------|
| **Encapsulation** | `private $id`, `private $name`; getter/setter methods with validation |
| **Inheritance** | `FullTimeEmployee extends Employee`; `Manager extends FullTimeEmployee` |
| **Method Overriding** | `calculateSalary()` defined differently in each class |
| **`parent::`** | `parent::__construct()`, `parent::getDetails()`, `parent::calculateSalary()` |
| **`protected`** | `$baseSalary` accessible in child classes but not outside |
| **Polymorphism** | Loop calls same `calculateSalary()` on different object types |
| **Exception Handling** | `try-catch` with `InvalidArgumentException` in setters |

---

*End of Answer Sheet*
*Pokhara University — BCSIT III — Internet Technology II — 2024*
# Unit 5: File Handling, Sessions, and Error Handling

**Duration:** 6 Hours

## Learning Objectives
- Learn about the importance of file handling in web development
- Understand file reading and writing modes
- Know the differences between file inclusion methods (include and require)
- Gain practical knowledge in managing sessions and cookies
- Acquire skills in implementing session-based authentication and authorization
- Learn to handle unexpected errors using try-catch blocks

---

## 5.1 Reading From and Writing To Files

### Why File Handling?

File handling allows PHP applications to:
- Store user-generated content (logs, uploads, configs)
- Read configuration files
- Generate reports
- Create downloadable files
- Maintain application logs

---

### Opening a File: fopen()

```php
$file = fopen("filename.txt", "mode");
```

**File Modes:**

| Mode | Description | Creates if not exist | Truncates |
|------|-------------|---------------------|-----------|
| `r` | Read only | No | No |
| `r+` | Read and write | No | No |
| `w` | Write only | Yes | Yes |
| `w+` | Read and write | Yes | Yes |
| `a` | Append (write at end) | Yes | No |
| `a+` | Read and append | Yes | No |
| `x` | Create and write (fails if exists) | Yes | No |
| `x+` | Create, read and write (fails if exists) | Yes | No |

---

### Writing to a File

```php
<?php
// Open file for writing
$file = fopen("notes.txt", "w");

// Write data
fwrite($file, "Hello Students!\n");
fwrite($file, "Learning file handling in PHP.\n");

// Close file
fclose($file);

echo "Data written successfully!";
?>
```

---

### Reading from a File

#### Method 1: fread() - Read entire file

```php
<?php
$file = fopen("notes.txt", "r");
$content = fread($file, filesize("notes.txt"));
fclose($file);

echo $content;
?>
```

#### Method 2: fgets() - Read line by line

```php
<?php
$file = fopen("notes.txt", "r");
while (!feof($file)) {
    $line = fgets($file);
    echo $line . "<br>";
}
fclose($file);
?>
```

#### Method 3: file_get_contents() - Simplest way

```php
<?php
$content = file_get_contents("notes.txt");
echo $content;
?>
```

#### Method 4: file() - Read into array

```php
<?php
$lines = file("notes.txt");
foreach ($lines as $line) {
    echo $line . "<br>";
}
?>
```

---

### Other File Operations

#### file_put_contents() - Write to file (simple)

```php
<?php
$data = "Hello World!";
file_put_contents("message.txt", $data);
?>
```

#### file_exists() - Check if file exists

```php
<?php
if (file_exists("notes.txt")) {
    echo "File exists!";
} else {
    echo "File not found!";
}
?>
```

#### unlink() - Delete a file

```php
<?php
if (unlink("notes.txt")) {
    echo "File deleted successfully!";
} else {
    echo "Unable to delete file.";
}
?>
```

#### filesize() - Get file size

```php
<?php
$size = filesize("notes.txt");
echo "File size: " . ($size / 1024) . " KB";
?>
```

#### rename() - Rename a file

```php
<?php
rename("old_name.txt", "new_name.txt");
?>
```

**See:** `file_read_write.php` for complete example

---

## 5.2 Understanding File Permissions and Security Considerations

### File Permissions

File permissions determine who can read, write, or execute a file.

**Permission Format:** `0755` (octal notation)

| Digit | Owner | Group | Others |
|-------|-------|-------|--------|
| 0 | - | - | - |
| 7 | rwx (read, write, execute) | - | - |
| 5 | - | r-x (read, execute) | - |
| 5 | - | - | r-x (read, execute) |

**Common Permissions:**
- `0644` - Read/write for owner, read for others (files)
- `0755` - Read/write/execute for owner, read/execute for others (directories)
- `0777` - All permissions for everyone (dangerous!)

### Setting Permissions

```php
chmod("file.txt", 0644);
```

---

### Security Considerations

1. **Validate File Paths**
   ```php
   // BAD - vulnerable to path traversal
   $file = $_GET['file'];
   include($file);  // User could access ../../etc/passwd

   // GOOD - validate input
   $allowed = ['config.php', 'header.php'];
   if (in_array($file, $allowed)) {
       include($file);
   }
   ```

2. **Check File Permissions**
   ```php
   if (!is_writable("logs/app.log")) {
       die("Cannot write to log file!");
   }
   ```

3. **Sanitize Filenames**
   ```php
   // Remove dangerous characters
   $filename = preg_replace("/[^a-zA-Z0-9._-]/", "", $_POST['filename']);
   ```

4. **Never Trust User Input**
   - Always validate file uploads
   - Check file extensions and MIME types
   - Limit file sizes
   - Store uploads outside web root

---

## 5.3 File Inclusion (Include and Require)

File inclusion allows you to insert the content of one PHP file into another. This promotes code reusability.

### include vs require

| Feature | include | require |
|---------|---------|---------|
| **If file not found** | Warning, script continues | Fatal error, script stops |
| **Use case** | Optional files (header, footer) | Critical files (config, database) |

---

### include

```php
<?php
include "header.php";  // If file missing, shows warning but continues
?>

<h2>Home Page</h2>
<p>Welcome to our website!</p>

<?php
include "footer.php";
?>
```

**If header.php doesn't exist:**
- Shows: `Warning: include(header.php): failed to open stream`
- Script continues executing

---

### require

```php
<?php
require "config.php";  // If file missing, fatal error and stops
?>

<h2>Application</h2>
```

**If config.php doesn't exist:**
- Shows: `Fatal error: require(): Failed opening required 'config.php'`
- Script stops completely

---

### include_once and require_once

Prevents including the same file multiple times.

```php
<?php
include_once "functions.php";  // Includes only once
include_once "functions.php";  // Skips (already included)

require_once "database.php";   // Includes only once
require_once "database.php";   // Skips (already included)
?>
```

**When to use:**
- Use `_once` variants for files with function/class definitions
- Prevents "function already defined" errors

---

### Practical Example: Website Template

**config.php** (Configuration)
```php
<?php
$siteName = "My Website";
$welcomeMessage = "Welcome to our platform!";
$author = "John Doe";
?>
```

**header.php** (Header)
```php
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $siteName; ?></title>
</head>
<body>
<h1><?php echo $siteName; ?></h1>
<nav>Home | About | Contact</nav>
<hr>
```

**footer.php** (Footer)
```php
<hr>
<footer>
    <p>&copy; 2026 <?php echo $author; ?>. All rights reserved.</p>
</footer>
</body>
</html>
```

**index.php** (Main Page)
```php
<?php
require "config.php";  // Essential
include "header.php";  // Optional
?>

<h2>Home Page</h2>
<p><?php echo $welcomeMessage; ?></p>

<?php
include "footer.php";  // Optional
?>
```

**See:** `file_inclusion/` directory for examples

---

## 5.4 Managing Sessions and Cookies

### Sessions vs Cookies

| Feature | Sessions | Cookies |
|---------|----------|---------|
| **Storage** | Server-side | Client-side (browser) |
| **Size limit** | No limit | 4KB per cookie |
| **Security** | More secure | Less secure (user can modify) |
| **Lifetime** | Until browser closes | Can persist for years |
| **Use case** | Login, shopping cart | Remember preferences, theme |

---

### Sessions

Sessions allow you to store user data on the server across multiple pages.

#### How Sessions Work:
1. User visits website
2. PHP creates unique session ID
3. Session ID stored in cookie on user's browser
4. Server stores session data linked to that ID
5. User's subsequent requests include session ID
6. Server retrieves data for that session

---

### Working with Sessions

#### Starting a Session

```php
<?php
session_start();  // MUST be called before any output
?>
```

**IMPORTANT:** `session_start()` must be called at the top of EVERY page that uses sessions.

#### Storing Data in Session

```php
<?php
session_start();

$_SESSION['username'] = "john_doe";
$_SESSION['email'] = "john@example.com";
$_SESSION['role'] = "admin";
?>
```

#### Retrieving Session Data

```php
<?php
session_start();

if (isset($_SESSION['username'])) {
    echo "Welcome, " . $_SESSION['username'];
} else {
    echo "Please login";
}
?>
```

#### Modifying Session Data

```php
<?php
session_start();

$_SESSION['views'] = ($_SESSION['views'] ?? 0) + 1;
echo "Page views: " . $_SESSION['views'];
?>
```

#### Removing Specific Session Variable

```php
<?php
session_start();

unset($_SESSION['username']);  // Remove username only
?>
```

#### Destroying Entire Session (Logout)

```php
<?php
session_start();

session_unset();    // Remove all session variables
session_destroy();  // Destroy the session

// Redirect to login
header("Location: login.php");
exit;
?>
```

---

### Practical Example: Shopping Cart

**products.php** (Product List)
```php
<?php
session_start();

$products = [
    1 => ["name" => "Laptop", "price" => 75000],
    2 => ["name" => "Mouse", "price" => 800]
];

// Add to cart
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id] = [
            "name" => $products[$id]["name"],
            "price" => $products[$id]["price"],
            "quantity" => 1
        ];
    }
}
?>

<h2>Products</h2>
<?php foreach ($products as $id => $product): ?>
    <p><?php echo $product["name"]; ?> - Rs. <?php echo $product["price"]; ?>
    <a href="?id=<?php echo $id; ?>">Add to Cart</a></p>
<?php endforeach; ?>
<a href="cart.php">View Cart</a>
```

**cart.php** (View Cart)
```php
<?php
session_start();
?>

<h2>Your Cart</h2>
<?php if (!empty($_SESSION['cart'])): ?>
    <table border="1">
        <tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th></tr>
        <?php
        $grandTotal = 0;
        foreach ($_SESSION['cart'] as $item):
            $total = $item['price'] * $item['quantity'];
            $grandTotal += $total;
        ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td>Rs. <?php echo $item['price']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td>Rs. <?php echo $total; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Grand Total</td>
            <td>Rs. <?php echo $grandTotal; ?></td>
        </tr>
    </table>
<?php else: ?>
    <p>Cart is empty</p>
<?php endif; ?>
```

**See:** `session/products.php` and `session/cart.php`

---

### Cookies

Cookies are small pieces of data stored on the user's browser.

#### Setting a Cookie

```php
setcookie(name, value, expire, path, domain, secure, httponly);
```

**Parameters:**
- `name` - Cookie name
- `value` - Cookie value
- `expire` - Expiration time (Unix timestamp)
- `path` - Path where cookie is valid (default: `/`)
- `domain` - Domain where cookie is valid
- `secure` - Only send over HTTPS (default: false)
- `httponly` - Not accessible via JavaScript (default: false)

**Example:**

```php
<?php
// Set cookie for 30 days
$expire = time() + (30 * 24 * 60 * 60);
setcookie("username", "john_doe", $expire, "/");

echo "Cookie set!";
?>
```

**IMPORTANT:** `setcookie()` must be called before any output.

#### Reading a Cookie

```php
<?php
if (isset($_COOKIE['username'])) {
    echo "Welcome back, " . $_COOKIE['username'];
} else {
    echo "First time visitor!";
}
?>
```

#### Deleting a Cookie

```php
<?php
// Set expiration to past time
setcookie("username", "", time() - 3600, "/");
echo "Cookie deleted!";
?>
```

---

### Practical Example: Theme Preference

**set_theme.php** (Set Theme)
```php
<?php
$theme = $_GET['theme'] ?? 'light';

// Store theme preference for 30 days
$expire = time() + (30 * 24 * 60 * 60);
setcookie("theme_color", $theme, $expire, "/");

header("Location: index.php");
?>
```

**index.php** (Use Theme)
```php
<?php
$theme = $_COOKIE["theme_color"] ?? "light";
?>
<!DOCTYPE html>
<html>
<body style="background-color: <?php echo $theme == 'dark' ? '#333' : '#fff'; ?>;">
<h2>Your theme: <?php echo $theme; ?></h2>
<a href="set_theme.php?theme=light">Light Mode</a> |
<a href="set_theme.php?theme=dark">Dark Mode</a>
</body>
</html>
```

**See:** `cookie/index.php` and `cookie/set_theme.php`

---

## 5.5 Implementing Session-based Authentication and Authorization

### Authentication vs Authorization

| Authentication | Authorization |
|---------------|---------------|
| **Who are you?** | **What can you do?** |
| Login verification | Permission checking |
| Username/password | Role-based access |
| Example: Login form | Example: Admin-only pages |

---

### Simple Authentication System

**login.php** (Login Page)
```php
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hardcoded users (in real world, use database)
    $users = [
        "admin" => ["password" => "admin123", "role" => "admin"],
        "student" => ["password" => "student123", "role" => "student"]
    ];

    // Verify credentials
    if (isset($users[$username]) && $users[$username]["password"] === $password) {
        // Store user info in session
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $users[$username]["role"];

        // Redirect based on role
        if ($_SESSION["role"] == "admin") {
            header("Location: admin.php");
        } else {
            header("Location: student.php");
        }
        exit;
    } else {
        echo "<p>Invalid username or password!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login Form</h2>
<form method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
</body>
</html>
```

---

**admin.php** (Admin Dashboard - Authorization)
```php
<?php
session_start();

// Check if user is logged in AND has admin role
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "admin") {
    header("Location: access_denied.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title></head>
<body>
<h2>Welcome Admin, <?php echo $_SESSION["username"]; ?>!</h2>
<p>This page is only accessible to admins.</p>
<a href="logout.php">Logout</a>
</body>
</html>
```

---

**student.php** (Student Dashboard - Authorization)
```php
<?php
session_start();

// Check if user is logged in AND has student role
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "student") {
    header("Location: access_denied.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Student Dashboard</title></head>
<body>
<h2>Welcome Student, <?php echo $_SESSION["username"]; ?>!</h2>
<p>This page is only accessible to students.</p>
<a href="logout.php">Logout</a>
</body>
</html>
```

---

**logout.php** (Logout)
```php
<?php
session_start();

session_unset();
session_destroy();

header("Location: login.php");
exit;
?>
```

**See:** `auth/` directory for complete authentication system

---

### Best Practices for Authentication

1. **Never store passwords in plain text**
   ```php
   // Hash password before storing
   $hashed = password_hash($password, PASSWORD_DEFAULT);

   // Verify password
   if (password_verify($password, $hashed)) {
       // Correct password
   }
   ```

2. **Always use HTTPS for login forms**

3. **Implement session timeout**
   ```php
   $_SESSION['last_activity'] = time();

   if (time() - $_SESSION['last_activity'] > 1800) {  // 30 minutes
       session_destroy();
       header("Location: login.php");
   }
   ```

4. **Regenerate session ID after login**
   ```php
   session_regenerate_id(true);  // Prevents session fixation attacks
   ```

---

## 5.6 Error Handling in PHP: Try-Catch Blocks, Exception Handling

### Why Error Handling?

Without error handling:
- Application crashes unexpectedly
- Sensitive information exposed to users
- Poor user experience

With error handling:
- Graceful error messages
- Log errors for debugging
- Application continues running

---

### Types of Errors

1. **Syntax Errors** - Code won't run (missing semicolon, typo)
2. **Runtime Errors** - Occur during execution (division by zero, file not found)
3. **Logic Errors** - Code runs but gives wrong results

---

### Try-Catch-Finally

```php
try {
    // Code that might throw an exception
} catch (ExceptionType $e) {
    // Handle the exception
} finally {
    // Always executes (optional)
}
```

---

### Basic Exception Handling

```php
<?php
try {
    $num1 = 10;
    $num2 = 0;

    if ($num2 == 0) {
        throw new Exception("Cannot divide by zero!");
    }

    $result = $num1 / $num2;
    echo "Result: $result";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```

**Output:** `Error: Cannot divide by zero!`

---

### Custom Exceptions

```php
<?php
// Define custom exception
class InvalidInputException extends Exception {}

function divideNumbers($num1, $num2) {
    // Check for non-numeric input
    if (!is_numeric($num1) || !is_numeric($num2)) {
        throw new InvalidInputException("Both inputs must be numbers!");
    }

    // Check for division by zero
    if ($num2 == 0) {
        throw new Exception("Cannot divide by zero!");
    }

    return $num1 / $num2;
}

try {
    echo divideNumbers(10, 2) . "<br>";      // Works
    echo divideNumbers(10, 0) . "<br>";      // Throws Exception
    echo divideNumbers(10, "abc") . "<br>";  // Throws InvalidInputException

} catch (InvalidInputException $e) {
    echo "Input Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
?>
```

---

### The Finally Block

Executes regardless of whether an exception was thrown.

```php
<?php
try {
    $file = fopen("data.txt", "r");
    // Read file operations
    throw new Exception("Something went wrong!");

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();

} finally {
    // Always close the file
    if (isset($file)) {
        fclose($file);
    }
    echo "File closed.";
}
?>
```

**See:** `try_catch.php` for complete example

---

### Exception Methods

```php
<?php
try {
    throw new Exception("Error message", 100);
} catch (Exception $e) {
    echo $e->getMessage();    // Error message
    echo $e->getCode();       // 100
    echo $e->getFile();       // File where exception occurred
    echo $e->getLine();       // Line number
    echo $e->getTraceAsString();  // Stack trace
}
?>
```

---

### Multiple Catch Blocks

```php
<?php
try {
    // Some code
} catch (InvalidArgumentException $e) {
    echo "Invalid argument: " . $e->getMessage();
} catch (RuntimeException $e) {
    echo "Runtime error: " . $e->getMessage();
} catch (Exception $e) {
    echo "General error: " . $e->getMessage();
}
?>
```

**Order matters:** Catch specific exceptions first, then general Exception.

---

## Summary

### Key Takeaways

1. **File Handling**
   - `fopen()`, `fread()`, `fwrite()`, `fclose()`
   - Simple methods: `file_get_contents()`, `file_put_contents()`
   - Always close files after use

2. **File Inclusion**
   - `include` - warning if file missing, continues
   - `require` - fatal error if file missing, stops
   - Use `_once` variants to prevent multiple inclusions

3. **Sessions**
   - Stored on server, more secure
   - Use `session_start()` on every page
   - Store in `$_SESSION` array
   - Destroy with `session_destroy()`

4. **Cookies**
   - Stored on client browser
   - Limited to 4KB per cookie
   - Use `setcookie()` before any output
   - Access via `$_COOKIE` array

5. **Authentication & Authorization**
   - Authentication: verify identity (login)
   - Authorization: check permissions (role-based access)
   - Use sessions to maintain login state

6. **Error Handling**
   - Use try-catch for graceful error handling
   - Create custom exceptions for specific errors
   - Use finally for cleanup code
   - Always log errors, display user-friendly messages

---

## Practice Exercises

1. Create a visitor counter that:
   - Stores count in a file
   - Increments on each page load
   - Displays total visits

2. Build a multi-page website with:
   - Common header and footer (file inclusion)
   - Navigation menu
   - Multiple pages

3. Implement a shopping cart system:
   - Add/remove products
   - Update quantities
   - Calculate total
   - Clear cart

4. Create a login system with:
   - Registration (store in file/database)
   - Login verification
   - Role-based access (admin, user)
   - Session timeout

5. Build an error logging system:
   - Catch different types of exceptions
   - Log errors to file with timestamp
   - Display user-friendly error messages

---

## Code Examples Reference

- **file_read_write.php** - File operations example
- **try_catch.php** - Exception handling example
- **file_inclusion/** - Include/require examples
- **session/** - Shopping cart with sessions
- **cookie/** - Theme preference with cookies
- **auth/** - Authentication and authorization system

# Unit 1: Introduction to PHP

## Duration: 4 Hours

---

## 1.1 Understanding Server-Side Scripting and PHP Programming

### What is Server-Side Scripting?

**Server-side scripting** is a technique used in web development where scripts are executed on the web server rather than on the client's browser. When a user requests a web page, the server processes the script and sends the resulting HTML to the client's browser.

#### Key Characteristics:
- **Execution Location**: Runs on the web server
- **Processing**: Code is executed before sending response to client
- **Security**: Source code is not visible to end users
- **Database Access**: Can interact with databases directly
- **Dynamic Content**: Generates personalized content based on user requests

#### Client-Side vs Server-Side Scripting:

| Aspect | Client-Side | Server-Side |
|--------|------------|-------------|
| Execution | Browser | Web Server |
| Languages | JavaScript, HTML, CSS | PHP, Python, Ruby, Node.js |
| Speed | Faster (no server round-trip) | Depends on server processing |
| Security | Less secure (code visible) | More secure (code hidden) |
| Database Access | No direct access | Direct access possible |

### What is PHP?

**PHP (Hypertext Preprocessor)** is a popular open-source server-side scripting language designed specifically for web development. Originally created by Rasmus Lerdorf in 1994, PHP has evolved into one of the most widely used languages for building dynamic web applications.

#### Features of PHP:
- **Open Source**: Free to use and distribute
- **Platform Independent**: Runs on Windows, Linux, macOS
- **Easy to Learn**: Simple syntax similar to C and Perl
- **Database Support**: Works with MySQL, PostgreSQL, Oracle, etc.
- **Large Community**: Extensive documentation and support
- **Embedded in HTML**: Can be mixed with HTML code
- **Fast Performance**: Efficient execution speed

#### Why Use PHP?
- Powers major websites (Facebook, Wikipedia, WordPress)
- Excellent for CRUD operations (Create, Read, Update, Delete)
- Strong database integration capabilities
- Cost-effective (free and open-source)
- Large ecosystem of frameworks (Laravel, Symfony, CodeIgniter)

---

## 1.2 Installing and Setting Up PHP Development Environment

### XAMPP Installation

**XAMPP** is a free, cross-platform web server solution stack package that includes Apache HTTP Server, MySQL database, and PHP interpreter.

#### Components of XAMPP:
- **X** - Cross-platform (Windows, Linux, macOS)
- **A** - Apache HTTP Server
- **M** - MySQL Database
- **P** - PHP
- **P** - Perl

#### Installation Steps:

1. **Download XAMPP**
   - Visit: https://www.apachefriends.org
   - Select appropriate version for your OS
   - Choose latest stable version with PHP 7.x or 8.x

2. **Install XAMPP**
   - Windows: Run installer (.exe file)
   - macOS: Open .dmg file and drag to Applications
   - Linux: Extract and run installation script

3. **Start Services**
   - Open XAMPP Control Panel
   - Start Apache (web server)
   - Start MySQL (database server)

4. **Verify Installation**
   - Open browser
   - Navigate to: `http://localhost`
   - You should see XAMPP welcome page

#### Directory Structure:
```
xampp/
├── htdocs/          # Your PHP files go here (document root)
├── php/             # PHP installation directory
├── mysql/           # MySQL database files
├── apache/          # Apache configuration
└── phpMyAdmin/      # Database management tool
```

### Alternative: WAMP (Windows only)

**WAMP** stands for Windows, Apache, MySQL, and PHP. It's similar to XAMPP but specifically designed for Windows.

#### Key Differences:
- More lightweight than XAMPP
- Easier switching between PHP/MySQL versions
- Windows-only solution
- Simpler interface

### Alternative: MAMP (macOS)

**MAMP** is designed for macOS users and provides a similar stack.

### Creating Your First PHP File:

1. Navigate to `xampp/htdocs/`
2. Create a new folder (e.g., `myproject`)
3. Create a file named `index.php`
4. Access via: `http://localhost/myproject/index.php`

---

## 1.3 Basic Syntax and Data Types

### PHP Syntax Basics

#### PHP Tags:
```php
<?php
// PHP code goes here
?>
```

#### Alternative Tags:
```php
<?php echo "Standard tags"; ?>

<?= "Short echo tags" ?>  // Short syntax for echo
```

#### Embedding PHP in HTML:
```php
<!DOCTYPE html>
<html>
<head>
    <title>PHP Example</title>
</head>
<body>
    <h1><?php echo "Hello, World!"; ?></h1>
    <p>Current time: <?= date('H:i:s'); ?></p>
</body>
</html>
```

#### Comments in PHP:
```php
<?php
// Single-line comment

# Another single-line comment

/*
   Multi-line comment
   Can span multiple lines
*/

/**
 * Documentation comment
 * Used for function/class documentation
 */
?>
```

#### Statements and Semicolons:
```php
<?php
echo "Statement must end with semicolon";
$name = "John";  // Each statement ends with ;
?>
```

### PHP Data Types

PHP supports 8 primitive data types:

#### 1. String
Text enclosed in quotes (single or double)

```php
<?php
$name = "John Doe";        // Double quotes
$city = 'New York';        // Single quotes
$message = "Hello, $name"; // Variable interpolation in double quotes
$literal = 'Cost: $50';    // No interpolation in single quotes

echo $message;  // Output: Hello, John Doe
echo $literal;  // Output: Cost: $50
?>
```

#### 2. Integer
Whole numbers (positive or negative)

```php
<?php
$age = 25;
$temperature = -10;
$hex = 0xFF;        // Hexadecimal
$octal = 0755;      // Octal
$binary = 0b1010;   // Binary (PHP 5.4+)

echo $age;          // Output: 25
?>
```

#### 3. Float (Double)
Decimal numbers

```php
<?php
$price = 19.99;
$pi = 3.14159;
$scientific = 1.5e3;  // Scientific notation (1500)

echo $price;           // Output: 19.99
?>
```

#### 4. Boolean
True or false values

```php
<?php
$isLoggedIn = true;
$hasError = false;

if ($isLoggedIn) {
    echo "Welcome!";
}
?>
```

#### 5. Array
Collection of values

```php
<?php
$fruits = array("Apple", "Banana", "Orange");
$colors = ["Red", "Green", "Blue"];  // Short syntax (PHP 5.4+)

echo $fruits[0];  // Output: Apple
?>
```

#### 6. Object
Instance of a class

```php
<?php
class Person {
    public $name;
    public $age;
}

$person = new Person();
$person->name = "John";
$person->age = 30;

echo $person->name;  // Output: John
?>
```

#### 7. NULL
Represents a variable with no value

```php
<?php
$emptyVar = null;
$undefinedVar;  // Automatically null

if ($emptyVar === null) {
    echo "Variable is null";
}
?>
```

#### 8. Resource
Special variable holding reference to external resources

```php
<?php
$file = fopen("data.txt", "r");  // File resource
$connection = mysqli_connect("localhost", "user", "pass");  // Database resource
?>
```

### Type Checking Functions:

```php
<?php
$value = "Hello";

var_dump($value);       // string(5) "Hello"
echo gettype($value);   // string

// Type checking functions
is_string($value);      // true
is_int($value);         // false
is_float($value);       // false
is_bool($value);        // false
is_array($value);       // false
is_object($value);      // false
is_null($value);        // false
is_resource($value);    // false
?>
```

### Type Casting:

```php
<?php
$num = "123";
$int = (int)$num;       // Cast to integer
$float = (float)$num;   // Cast to float
$str = (string)$int;    // Cast to string
$bool = (bool)$num;     // Cast to boolean

echo gettype($int);     // integer
?>
```

---

## 1.4 Variables and Constants

### Variables

Variables in PHP are used to store data that can be changed during script execution.

#### Variable Rules:
- Start with `$` sign
- Followed by letter or underscore
- Can contain letters, numbers, and underscores
- Case-sensitive (`$name` and `$Name` are different)
- Cannot start with a number

#### Variable Declaration and Assignment:

```php
<?php
// Valid variable names
$name = "John";
$age = 25;
$_private = "hidden";
$userName123 = "user123";

// Invalid variable names
// $123name = "Invalid";   // Cannot start with number
// $user-name = "Invalid"; // Cannot contain hyphen
// $user name = "Invalid"; // Cannot contain space
?>
```

#### Variable Naming Conventions:

```php
<?php
// Camel Case (recommended for variables)
$firstName = "John";
$lastName = "Doe";
$phoneNumber = "123-456-7890";

// Snake Case
$first_name = "John";
$last_name = "Doe";
$phone_number = "123-456-7890";

// Pascal Case (typically for classes)
$FirstName = "John";
?>
```

#### Dynamic Variables:

```php
<?php
$varName = "name";
$$varName = "John";  // Creates $name = "John"

echo $name;  // Output: John
?>
```

#### Variable Scope:

**1. Local Scope:**
```php
<?php
function myFunction() {
    $x = 10;  // Local variable
    echo $x;
}

myFunction();  // Output: 10
// echo $x;    // Error: undefined variable
?>
```

**2. Global Scope:**
```php
<?php
$x = 10;  // Global variable

function myFunction() {
    global $x;  // Access global variable
    echo $x;
}

myFunction();  // Output: 10
?>
```

**3. Static Variables:**
```php
<?php
function counter() {
    static $count = 0;  // Retains value between calls
    $count++;
    echo $count;
}

counter();  // Output: 1
counter();  // Output: 2
counter();  // Output: 3
?>
```

#### Variable Functions:

```php
<?php
$name = "John";

// Check if variable is set
if (isset($name)) {
    echo "Variable is set";
}

// Check if variable is empty
if (empty($name)) {
    echo "Variable is empty";
}

// Unset a variable
unset($name);

// Check if variable is null
if (is_null($name)) {
    echo "Variable is null";
}
?>
```

### Constants

Constants are identifiers for simple values that cannot change during script execution.

#### Defining Constants:

**Method 1: Using define()**
```php
<?php
define("SITE_NAME", "My Website");
define("MAX_USERS", 100);
define("VERSION", 1.5);
define("IS_ACTIVE", true);

echo SITE_NAME;  // Output: My Website
echo MAX_USERS;  // Output: 100

// Constants are case-insensitive by default in define()
define("PI", 3.14159, true);  // Third parameter for case-insensitivity
echo pi;  // Output: 3.14159
?>
```

**Method 2: Using const keyword (PHP 5.3+)**
```php
<?php
const DATABASE_HOST = "localhost";
const DATABASE_NAME = "mydb";
const API_KEY = "abc123xyz";

echo DATABASE_HOST;  // Output: localhost

// const can be used inside classes
class Config {
    const MAX_ATTEMPTS = 3;
    const TIMEOUT = 30;
}

echo Config::MAX_ATTEMPTS;  // Output: 3
?>
```

#### Constant Rules:
- No `$` sign prefix
- Cannot be changed once defined
- Global scope by default
- Conventionally written in UPPERCASE
- Can only contain scalar data (string, integer, float, boolean)

#### Magic Constants:

PHP provides several predefined constants that change based on where they are used:

```php
<?php
echo __LINE__;      // Current line number
echo __FILE__;      // Full path of the file
echo __DIR__;       // Directory of the file
echo __FUNCTION__;  // Function name
echo __CLASS__;     // Class name
echo __METHOD__;    // Class method name
echo __NAMESPACE__; // Namespace name
?>
```

#### Checking Constants:

```php
<?php
define("APP_NAME", "My App");

// Check if constant is defined
if (defined("APP_NAME")) {
    echo APP_NAME;
}

// Get all defined constants
print_r(get_defined_constants());
?>
```

---

## 1.5 Operators

Operators are symbols that perform operations on variables and values.

### 1.5.1 Arithmetic Operators

Used to perform mathematical operations.

| Operator | Name | Example | Result |
|----------|------|---------|--------|
| + | Addition | $x + $y | Sum of $x and $y |
| - | Subtraction | $x - $y | Difference of $x and $y |
| * | Multiplication | $x * $y | Product of $x and $y |
| / | Division | $x / $y | Quotient of $x and $y |
| % | Modulus | $x % $y | Remainder of $x / $y |
| ** | Exponentiation | $x ** $y | $x raised to power $y (PHP 5.6+) |

#### Examples:

```php
<?php
$a = 10;
$b = 3;

echo $a + $b;   // Output: 13
echo $a - $b;   // Output: 7
echo $a * $b;   // Output: 30
echo $a / $b;   // Output: 3.3333333333333
echo $a % $b;   // Output: 1 (remainder)
echo $a ** $b;  // Output: 1000 (10^3)

// Negative numbers
$c = -5;
$d = 2;
echo $c * $d;   // Output: -10

// Order of operations (PEMDAS)
echo 2 + 3 * 4;      // Output: 14 (not 20)
echo (2 + 3) * 4;    // Output: 20
?>
```

### 1.5.2 Assignment Operators

Used to assign values to variables.

| Operator | Example | Equivalent | Description |
|----------|---------|------------|-------------|
| = | $x = 5 | $x = 5 | Simple assignment |
| += | $x += 3 | $x = $x + 3 | Add and assign |
| -= | $x -= 3 | $x = $x - 3 | Subtract and assign |
| *= | $x *= 3 | $x = $x * 3 | Multiply and assign |
| /= | $x /= 3 | $x = $x / 3 | Divide and assign |
| %= | $x %= 3 | $x = $x % 3 | Modulus and assign |

#### Examples:

```php
<?php
// Simple assignment
$x = 10;
$y = $x;  // $y is now 10

// Compound assignments
$x = 5;
$x += 3;   // $x is now 8
$x -= 2;   // $x is now 6
$x *= 4;   // $x is now 24
$x /= 3;   // $x is now 8
$x %= 5;   // $x is now 3

// String concatenation assignment
$text = "Hello";
$text .= " World";  // $text is now "Hello World"

// Multiple assignments
$a = $b = $c = 10;  // All variables are 10
?>
```

#### Increment/Decrement Operators:

```php
<?php
$x = 5;

// Pre-increment (increment first, then return)
echo ++$x;  // Output: 6, $x is 6

// Post-increment (return first, then increment)
echo $x++;  // Output: 6, $x is 7

$y = 5;

// Pre-decrement
echo --$y;  // Output: 4, $y is 4

// Post-decrement
echo $y--;  // Output: 4, $y is 3

// Practical example
$counter = 0;
$counter++;  // $counter is 1
$counter++;  // $counter is 2
?>
```

### 1.5.3 Logical Operators

Used to combine conditional statements.

| Operator | Name | Example | Description |
|----------|------|---------|-------------|
| and | And | $x and $y | True if both are true |
| or | Or | $x or $y | True if either is true |
| xor | Xor | $x xor $y | True if only one is true |
| && | And | $x && $y | True if both are true |
| \|\| | Or | $x \|\| $y | True if either is true |
| ! | Not | !$x | True if $x is not true |

#### Examples:

```php
<?php
$a = true;
$b = false;

// AND operator
if ($a && $b) {
    echo "Both are true";  // Not executed
}

if ($a and $b) {
    echo "Both are true";  // Not executed
}

// OR operator
if ($a || $b) {
    echo "At least one is true";  // Executed
}

if ($a or $b) {
    echo "At least one is true";  // Executed
}

// NOT operator
if (!$b) {
    echo "b is false";  // Executed
}

// XOR operator
if ($a xor $b) {
    echo "Only one is true";  // Executed
}

// Practical examples
$age = 25;
$hasLicense = true;

if ($age >= 18 && $hasLicense) {
    echo "Can drive";
}

$isWeekend = false;
$isHoliday = true;

if ($isWeekend || $isHoliday) {
    echo "Day off!";
}
?>
```

#### Operator Precedence:

```php
<?php
// && has higher precedence than ||
$result = true || false && false;
echo $result;  // Output: 1 (true)
// Evaluated as: true || (false && false)

// Use parentheses for clarity
$result = (true || false) && false;
echo $result;  // Output: 0 (false)

// Difference between && and 'and'
$x = true and false;   // $x = true (low precedence)
$y = true && false;    // $y = false (high precedence)
?>
```

### Comparison Operators

Used to compare two values.

| Operator | Name | Example | Description |
|----------|------|---------|-------------|
| == | Equal | $x == $y | True if values are equal |
| === | Identical | $x === $y | True if values and types are equal |
| != | Not equal | $x != $y | True if values are not equal |
| <> | Not equal | $x <> $y | True if values are not equal |
| !== | Not identical | $x !== $y | True if values or types are not equal |
| > | Greater than | $x > $y | True if $x is greater than $y |
| < | Less than | $x < $y | True if $x is less than $y |
| >= | Greater or equal | $x >= $y | True if $x is greater or equal to $y |
| <= | Less or equal | $x <= $y | True if $x is less or equal to $y |
| <=> | Spaceship | $x <=> $y | Returns -1, 0, or 1 (PHP 7+) |

#### Examples:

```php
<?php
// Equality vs Identity
$a = 5;
$b = "5";

var_dump($a == $b);   // bool(true) - values are equal
var_dump($a === $b);  // bool(false) - types are different

// Comparison operators
$x = 10;
$y = 20;

var_dump($x > $y);    // bool(false)
var_dump($x < $y);    // bool(true)
var_dump($x >= 10);   // bool(true)
var_dump($x <= 5);    // bool(false)
var_dump($x != $y);   // bool(true)

// Spaceship operator (PHP 7+)
echo 5 <=> 3;   // Output: 1 (5 is greater)
echo 3 <=> 5;   // Output: -1 (3 is less)
echo 5 <=> 5;   // Output: 0 (equal)

// String comparison
$str1 = "apple";
$str2 = "banana";
var_dump($str1 < $str2);  // bool(true) - alphabetical
?>
```

### String Operators

| Operator | Name | Example | Description |
|----------|------|---------|-------------|
| . | Concatenation | $a . $b | Joins two strings |
| .= | Concatenation assignment | $a .= $b | Appends $b to $a |

```php
<?php
$first = "Hello";
$last = "World";

// Concatenation
$message = $first . " " . $last;
echo $message;  // Output: Hello World

// Concatenation assignment
$text = "Hello";
$text .= " World";
echo $text;  // Output: Hello World

// Multiple concatenations
$fullName = $firstName . " " . $middleName . " " . $lastName;
?>
```

---

## Summary

### Key Takeaways:

1. **Server-Side Scripting**: PHP executes on the server before sending HTML to the browser
2. **Development Environment**: XAMPP/WAMP/MAMP provide all necessary tools for PHP development
3. **Data Types**: PHP supports 8 primitive data types (String, Integer, Float, Boolean, Array, Object, NULL, Resource)
4. **Variables**: Start with `$`, case-sensitive, can be local, global, or static
5. **Constants**: Defined using `define()` or `const`, cannot be changed, globally accessible
6. **Operators**:
   - Arithmetic: +, -, *, /, %, **
   - Assignment: =, +=, -=, *=, /=, %=
   - Logical: &&, ||, !, and, or, xor

---

## Practice Exercises

1. Install XAMPP and create a "Hello World" PHP page
2. Create variables of different data types and display them
3. Write a PHP script to calculate area of a circle using constants
4. Demonstrate the difference between `==` and `===` operators
5. Create a simple calculator using arithmetic operators
6. Use logical operators to check multiple conditions (e.g., age and license validation)
7. Experiment with variable scope (local, global, static)
8. Create constants for database configuration values

---

## Important Notes for Exam:

- PHP tags: `<?php ?>` and `<?= ?>`
- Variables start with `$` and are case-sensitive
- Constants use UPPERCASE by convention
- `define()` vs `const` keyword
- Difference between `==` (equal) and `===` (identical)
- Operator precedence: PEMDAS applies
- String concatenation uses `.` operator, not `+`
- Comments: `//`, `#`, `/* */`

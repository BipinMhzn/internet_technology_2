# Unit 3: Array and Function

**Duration:** 7 Hours

## Learning Objectives
- Understand the concept of arrays and their significance in storing and organizing data
- Learn how to iterate through arrays using various iteration techniques
- Understand the concept of functions and their role in promoting code reusability
- Deal with strings, numbers, date & time, and arrays with built-in functions
- Learn about passing arguments to functions and returning values from functions
- Understand variable scoping and how they affect the visibility and accessibility of variables

---

## 3.1 Working with Arrays

### What is an Array?
An array is a special variable that can store multiple values in a single variable. Instead of creating separate variables for each value, arrays allow you to organize related data together.

### 3.1.1 Indexed Arrays

Indexed arrays use numeric indexes (starting from 0) to access elements.

**Creating Indexed Arrays:**

```php
// Method 1: Using array() function
$fruits = array('apple', 'banana', 'orange');

// Method 2: Using short array syntax []
$names = ['John', 'Jane', 'Bob'];

// Method 3: Assigning values by index
$primes[0] = 2;
$primes[1] = 3;
$primes[2] = 5;
```

**Accessing Elements:**

```php
echo $fruits[0];  // Output: apple
echo $names[1];   // Output: Jane
```

**See:** `array_basics.php:15-33` for examples

---

### 3.1.2 Associative Arrays

Associative arrays use named keys (strings) instead of numeric indexes.

**Creating Associative Arrays:**

```php
$ages = array("John" => 35, "Jane" => 30, "Bob" => 25);

// Or using short syntax
$person = [
    "name" => "John",
    "age" => 35,
    "city" => "Pokhara"
];
```

**Accessing Elements:**

```php
echo $ages["John"];     // Output: 35
echo $person["name"];   // Output: John
```

**Updating Values:**

```php
$ages["John"] = 36;     // Updates John's age to 36
```

**See:** `array_basics.php:38-51` for examples

---

### 3.1.3 Array Iteration

PHP provides multiple ways to iterate through arrays.

#### Using foreach Loop (Most Common)

```php
// For indexed arrays
$fruits = ['apple', 'banana', 'orange'];
foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}

// For associative arrays
$ages = ["John" => 35, "Jane" => 30];
foreach ($ages as $name => $age) {
    echo "$name is $age years old<br>";
}
```

#### Using for Loop

```php
$fruits = ['apple', 'banana', 'orange'];
for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i] . "<br>";
}
```

#### Using while Loop

```php
$i = 0;
while ($i < count($fruits)) {
    echo $fruits[$i] . "<br>";
    $i++;
}
```

**See:** `array_loop.php` for iteration examples

---

### 3.1.4 Multi-dimensional Arrays

A multi-dimensional array contains one or more arrays within it.

**Creating Multi-dimensional Arrays:**

```php
// 2D Array
$family = array(
    'father' => array('name' => 'John', 'age' => 35),
    'mother' => array('name' => 'Jane', 'age' => 30),
    'son'    => array('name' => 'Bob', 'age' => 25)
);

// Or nested indexed arrays
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
```

**Accessing Elements:**

```php
echo $family['father']['name'];  // Output: John
echo $matrix[0][1];              // Output: 2
```

**See:** `array_basics.php:58-69` for examples

---

## 3.2 PHP's Built-in Functions

PHP provides hundreds of built-in functions for various operations. Here are the most commonly used ones.

### 3.2.1 String Functions

String functions help manipulate and work with text data.

#### Common String Functions:

| Function | Description | Example |
|----------|-------------|---------|
| `strlen($str)` | Returns string length | `strlen("hello")` → 5 |
| `strrev($str)` | Reverses a string | `strrev("hello")` → "olleh" |
| `strtoupper($str)` | Converts to uppercase | `strtoupper("hello")` → "HELLO" |
| `strtolower($str)` | Converts to lowercase | `strtolower("HELLO")` → "hello" |
| `ucfirst($str)` | First char to uppercase | `ucfirst("hello")` → "Hello" |
| `ucwords($str)` | Each word's first char to uppercase | `ucwords("hello world")` → "Hello World" |
| `substr($str, start, length)` | Extracts part of string | `substr("hello", 0, 3)` → "hel" |
| `str_replace($find, $replace, $str)` | Replaces text | `str_replace("world", "PHP", "hello world")` → "hello PHP" |
| `strpos($str, $find)` | Finds position of substring | `strpos("hello world", "world")` → 6 |
| `trim($str)` | Removes whitespace from both ends | `trim("  hello  ")` → "hello" |

**Examples:**

```php
$text = "  hello world  ";

echo strlen($text);              // 16
echo trim($text);                // "hello world"
echo strtoupper(trim($text));    // "HELLO WORLD"
echo str_replace("world", "PHP", $text);  // "  hello PHP  "
```

**See:** `string_func.php` for detailed examples

---

### 3.2.2 Math Functions

Math functions perform mathematical operations.

#### Common Math Functions:

| Function | Description | Example |
|----------|-------------|---------|
| `abs($num)` | Absolute value | `abs(-10)` → 10 |
| `pow($base, $exp)` | Power (x^y) | `pow(2, 3)` → 8 |
| `sqrt($num)` | Square root | `sqrt(16)` → 4 |
| `round($num, $precision)` | Round to nearest | `round(3.6)` → 4 |
| `ceil($num)` | Round up | `ceil(3.2)` → 4 |
| `floor($num)` | Round down | `floor(3.8)` → 3 |
| `max($x, $y, ...)` | Largest number | `max(2, 8, 5)` → 8 |
| `min($x, $y, ...)` | Smallest number | `min(2, 8, 5)` → 2 |
| `rand($min, $max)` | Random number | `rand(1, 10)` → random between 1-10 |
| `number_format($num, $decimals)` | Format number | `number_format(1234567.89, 2)` → "1,234,567.89" |

**Examples:**

```php
echo abs(-15);           // 15
echo pow(2, 3);          // 8
echo sqrt(25);           // 5
echo round(3.14159, 2);  // 3.14
echo rand(1, 100);       // Random number between 1 and 100
```

**See:** `math_func.php` for detailed examples

---

### 3.2.3 Date and Time Functions

Date and time functions help work with dates, times, and timestamps.

#### Common Date & Time Functions:

| Function | Description | Example |
|----------|-------------|---------|
| `date($format)` | Returns current date/time | `date("Y-m-d")` → "2026-01-19" |
| `time()` | Current Unix timestamp | `time()` → 1737331200 |
| `mktime($h,$m,$s,$mo,$d,$y)` | Creates timestamp | `mktime(0,0,0,12,25,2025)` |
| `strtotime($str)` | Converts string to timestamp | `strtotime("next Monday")` |

#### Date Format Characters:

| Character | Description | Example |
|-----------|-------------|---------|
| `Y` | 4-digit year | 2026 |
| `m` | Month (01-12) | 01 |
| `d` | Day (01-31) | 19 |
| `H` | Hour 24-hour format | 14 |
| `h` | Hour 12-hour format | 02 |
| `i` | Minutes (00-59) | 30 |
| `s` | Seconds (00-59) | 45 |
| `a` | am/pm | pm |
| `l` | Day of week | Sunday |
| `F` | Month name | January |

**Examples:**

```php
// Current date and time
echo date("Y-m-d");           // 2026-01-19
echo date("H:i:s");           // 14:30:45
echo date("l, F d, Y");       // Sunday, January 19, 2026

// Working with timestamps
$timestamp = strtotime("next Monday");
echo date("Y-m-d", $timestamp);

// Relative dates
echo date("Y-m-d", strtotime("tomorrow"));
echo date("Y-m-d", strtotime("+1 week"));
echo date("Y-m-d", strtotime("+1 month"));
echo date("Y-m-d", strtotime("-1 year"));
```

**See:** `date_func.php` for detailed examples

---

### 3.2.4 Array Functions

Array functions help manipulate and work with arrays.

#### Common Array Functions:

| Function | Description | Example |
|----------|-------------|---------|
| `count($arr)` | Returns array length | `count([1,2,3])` → 3 |
| `array_push($arr, $val)` | Adds element at end | `array_push($arr, "new")` |
| `array_pop($arr)` | Removes last element | `array_pop($arr)` |
| `array_shift($arr)` | Removes first element | `array_shift($arr)` |
| `array_unshift($arr, $val)` | Adds element at start | `array_unshift($arr, "new")` |
| `array_merge($arr1, $arr2)` | Combines arrays | `array_merge([1,2], [3,4])` → [1,2,3,4] |
| `array_slice($arr, $start, $len)` | Extracts portion | `array_slice($arr, 1, 2)` |
| `in_array($val, $arr)` | Checks if value exists | `in_array("apple", $fruits)` |
| `array_key_exists($key, $arr)` | Checks if key exists | `array_key_exists("name", $person)` |
| `sort($arr)` | Sort ascending | `sort($numbers)` |
| `rsort($arr)` | Sort descending | `rsort($numbers)` |
| `asort($arr)` | Sort associative by value | `asort($ages)` |
| `ksort($arr)` | Sort associative by key | `ksort($ages)` |
| `array_reverse($arr)` | Reverse array | `array_reverse($fruits)` |
| `array_unique($arr)` | Remove duplicates | `array_unique([1,2,2,3])` → [1,2,3] |
| `explode($delim, $str)` | String to array | `explode(",", "a,b,c")` → ["a","b","c"] |
| `implode($delim, $arr)` | Array to string | `implode("-", ["a","b"])` → "a-b" |
| `range($start, $end)` | Create number range | `range(1, 5)` → [1,2,3,4,5] |

**Examples:**

```php
$fruits = ["apple", "banana", "orange"];

// Adding/removing elements
array_push($fruits, "grape");      // Add at end
array_pop($fruits);                // Remove from end
array_unshift($fruits, "mango");   // Add at beginning
array_shift($fruits);              // Remove from beginning

// Searching
if (in_array("apple", $fruits)) {
    echo "Apple found!";
}

// Sorting
sort($fruits);                     // Sort alphabetically

// String/Array conversion
$str = "apple,banana,orange";
$arr = explode(",", $str);         // String to array
$str2 = implode("-", $arr);        // Array to string
```

**See:** `array_func.php` for detailed examples

---

## 3.3 User Defined Functions

Functions are reusable blocks of code that perform specific tasks. They promote code reusability and better organization.

### Why Use Functions?

**Problem without functions:**
```php
// Calculating grades for 3 students - repetitive code
$marks1 = 85;
if ($marks1 >= 80) {
    $grade1 = "A";
} elseif ($marks1 >= 60) {
    $grade1 = "B";
}
// ... repeated for student 2
// ... repeated for student 3
```

**Solution with functions:**
```php
function calculateGrade($marks) {
    if ($marks >= 80) return "A";
    elseif ($marks >= 60) return "B";
    elseif ($marks >= 40) return "C";
    else return "F";
}

echo calculateGrade(85);  // A
echo calculateGrade(72);  // B
echo calculateGrade(55);  // C
```

**See:** `why_func.php` and `why_func_sol.php` for comparison

### Function Syntax

```php
function functionName($parameter1, $parameter2, ...) {
    // Code to execute
    return $value;  // Optional
}
```

### 3.3.1 Passing Arguments and Return Values

#### 1. Basic Function (No Arguments, No Return)

```php
function sayHello() {
    echo "Hello World!<br>";
}

sayHello();  // Output: Hello World!
```

#### 2. Function with Arguments

```php
function add($a, $b) {
    echo "Sum: " . ($a + $b);
}

add(10, 20);  // Output: Sum: 30
```

#### 3. Function with Return Value

```php
function getSum($a, $b) {
    return $a + $b;
}

$result = getSum(10, 20);
echo $result;  // Output: 30
```

#### 4. Function with Default Arguments

```php
function welcome($name = "Guest") {
    echo "Welcome, $name!<br>";
}

welcome();         // Output: Welcome, Guest!
welcome("John");   // Output: Welcome, John!
```

#### 5. Function with Variable Number of Arguments

**Using spread operator (...):**
```php
function sum(...$numbers) {
    $total = 0;
    foreach ($numbers as $num) {
        $total += $num;
    }
    return $total;
}

echo sum(1, 2, 3);        // Output: 6
echo sum(1, 2, 3, 4, 5);  // Output: 15
```

**Using func_get_args():**
```php
function sum2() {
    $numbers = func_get_args();
    $total = 0;
    foreach ($numbers as $num) {
        $total += $num;
    }
    return $total;
}

echo sum2(1, 2, 3);  // Output: 6
```

#### 6. Recursive Functions

A function that calls itself.

```php
function factorial($n) {
    if ($n == 0) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

echo factorial(5);  // Output: 120 (5 * 4 * 3 * 2 * 1)
```

#### 7. Nested Functions

A function can define another function inside it.

```php
function hello() {
    echo "Hello World!<br>";

    function greet() {
        echo "Welcome!<br>";
    }
}

hello();   // Defines greet()
greet();   // Now available
```

**See:** `function.php` for all examples

---

### 3.3.2 Variable Scoping

Variable scope determines where a variable can be accessed in your code.

#### 1. Local Scope

Variables declared inside a function are local to that function.

```php
function localScopeExample() {
    $localVar = "I am local";
    echo $localVar;  // Works
}

localScopeExample();
// echo $localVar;  // ERROR: Undefined variable
```

#### 2. Global Scope

Variables declared outside functions have global scope but are NOT accessible inside functions unless declared with `global`.

```php
$globalVar = "I am global";

function globalScopeExample() {
    global $globalVar;  // Declare as global to access
    echo $globalVar;    // Now works
}

globalScopeExample();
```

#### 3. Static Scope

Static variables retain their value between function calls.

```php
function staticScopeExample() {
    static $count = 0;  // Initialized only once
    $count++;
    echo "Called $count times<br>";
}

staticScopeExample();  // Called 1 times
staticScopeExample();  // Called 2 times
staticScopeExample();  // Called 3 times
```

#### 4. Superglobals

Superglobals are built-in PHP variables accessible everywhere (inside and outside functions).

Common superglobals:
- `$_GET` - Query string parameters
- `$_POST` - Form POST data
- `$_SESSION` - Session variables
- `$_COOKIE` - Cookie data
- `$_SERVER` - Server information
- `$_FILES` - Uploaded files
- `$GLOBALS` - All global variables

```php
function showServerInfo() {
    echo $_SERVER['SERVER_NAME'];  // No global keyword needed
}
```

**See:** `variable_scope.php` for detailed examples

---

## Summary

### Key Takeaways:

1. **Arrays** store multiple values in a single variable
   - Indexed arrays use numeric indexes (0, 1, 2...)
   - Associative arrays use named keys ("name", "age"...)
   - Multi-dimensional arrays contain nested arrays

2. **Built-in Functions** provide ready-to-use functionality
   - String functions: manipulate text
   - Math functions: perform calculations
   - Date/Time functions: work with dates
   - Array functions: manipulate arrays

3. **User-Defined Functions** promote code reusability
   - Can accept arguments (parameters)
   - Can return values
   - Can have default arguments
   - Can accept variable number of arguments

4. **Variable Scope** determines variable accessibility
   - Local: only inside function
   - Global: outside functions (need `global` keyword inside)
   - Static: retains value between calls
   - Superglobals: accessible everywhere

---

## Practice Exercises

1. Create an associative array of 5 students with their names and marks. Calculate and display the average marks.

2. Write a function that takes a string and returns it reversed and in uppercase.

3. Create a function that accepts variable number of integers and returns their average.

4. Write a recursive function to calculate the sum of digits of a number (e.g., 123 → 1+2+3 = 6).

5. Create a multi-dimensional array representing a product catalog with categories and products. Display all products using nested loops.

6. Write a function that takes a date string and returns the number of days until that date.

7. Create a static counter function that tracks how many times any function in your program has been called.

---

## Code Examples Reference

- **array_basics.php** - Indexed, associative, and multi-dimensional arrays
- **array_loop.php** - Different ways to iterate through arrays
- **array_func.php** - Common array manipulation functions
- **string_func.php** - String manipulation functions
- **math_func.php** - Mathematical functions
- **date_func.php** - Date and time functions
- **function.php** - User-defined functions with various features
- **variable_scope.php** - Variable scoping examples
- **why_func.php** - Problem without functions
- **why_func_sol.php** - Solution using functions

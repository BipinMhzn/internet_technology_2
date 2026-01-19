# Unit 2: Control Structures and Loop

## Duration: 5 Hours

---

## 2.1 Conditional Statements

Conditional statements allow you to execute different code blocks based on different conditions. They control the flow of program execution.

### 2.1.1 If, Else, Elseif

#### The `if` Statement

The `if` statement executes a block of code only if a specified condition is true.

**Syntax:**
```php
if (condition) {
    // code to execute if condition is true
}
```

**Example:**
```php
<?php
$age = 18;

if ($age >= 18) {
    echo "You are an adult.";
}
// Output: You are an adult.

$temperature = 30;
if ($temperature > 25) {
    echo "It's hot outside!";
}
// Output: It's hot outside!
?>
```

#### The `else` Statement

The `else` statement executes a block of code when the `if` condition is false.

**Syntax:**
```php
if (condition) {
    // code if condition is true
} else {
    // code if condition is false
}
```

**Example:**
```php
<?php
$age = 15;

if ($age >= 18) {
    echo "You can vote.";
} else {
    echo "You cannot vote yet.";
}
// Output: You cannot vote yet.

$score = 45;
if ($score >= 50) {
    echo "Passed";
} else {
    echo "Failed";
}
// Output: Failed
?>
```

#### The `elseif` Statement

The `elseif` statement allows you to test multiple conditions.

**Syntax:**
```php
if (condition1) {
    // code if condition1 is true
} elseif (condition2) {
    // code if condition2 is true
} elseif (condition3) {
    // code if condition3 is true
} else {
    // code if all conditions are false
}
```

**Example:**
```php
<?php
$score = 75;

if ($score >= 90) {
    echo "Grade: A";
} elseif ($score >= 80) {
    echo "Grade: B";
} elseif ($score >= 70) {
    echo "Grade: C";
} elseif ($score >= 60) {
    echo "Grade: D";
} else {
    echo "Grade: F";
}
// Output: Grade: C

// Another example - Time-based greeting
$hour = date('H');

if ($hour < 12) {
    echo "Good Morning!";
} elseif ($hour < 18) {
    echo "Good Afternoon!";
} else {
    echo "Good Evening!";
}
?>
```

#### Nested If Statements

You can nest `if` statements inside other `if` statements.

```php
<?php
$age = 25;
$hasLicense = true;

if ($age >= 18) {
    if ($hasLicense) {
        echo "You can drive.";
    } else {
        echo "You need a license to drive.";
    }
} else {
    echo "You are too young to drive.";
}
// Output: You can drive.

// Another example - Login validation
$username = "admin";
$password = "pass123";
$isActive = true;

if ($username === "admin") {
    if ($password === "pass123") {
        if ($isActive) {
            echo "Login successful!";
        } else {
            echo "Account is deactivated.";
        }
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Invalid username.";
}
// Output: Login successful!
?>
```

#### Alternative Syntax

PHP offers an alternative syntax for control structures using colons and `endif`.

```php
<?php
$loggedIn = true;

if ($loggedIn):
    echo "Welcome back!";
else:
    echo "Please login.";
endif;

// Useful in templates with HTML
?>

<?php if ($isAdmin): ?>
    <div class="admin-panel">Admin Controls</div>
<?php else: ?>
    <div class="user-panel">User Dashboard</div>
<?php endif; ?>
```

---

### 2.1.2 Ternary Operator

The ternary operator is a shorthand way to write simple `if-else` statements. It's also called the conditional operator.

**Syntax:**
```php
$variable = (condition) ? value_if_true : value_if_false;
```

**Basic Examples:**
```php
<?php
// Traditional if-else
$age = 20;
if ($age >= 18) {
    $status = "Adult";
} else {
    $status = "Minor";
}

// Ternary operator equivalent
$status = ($age >= 18) ? "Adult" : "Minor";
echo $status;  // Output: Adult

// More examples
$score = 85;
$result = ($score >= 50) ? "Pass" : "Fail";
echo $result;  // Output: Pass

$temperature = 30;
$weather = ($temperature > 25) ? "Hot" : "Cold";
echo $weather;  // Output: Hot

$isLoggedIn = true;
$message = $isLoggedIn ? "Welcome!" : "Please login";
echo $message;  // Output: Welcome!

// With echo directly
echo ($age >= 18) ? "Can vote" : "Cannot vote";
?>
```

#### Nested Ternary Operators

You can nest ternary operators, but it can reduce readability.

```php
<?php
$score = 75;

// Nested ternary
$grade = ($score >= 90) ? "A" :
         (($score >= 80) ? "B" :
         (($score >= 70) ? "C" :
         (($score >= 60) ? "D" : "F")));

echo $grade;  // Output: C

// Better readability with parentheses
$age = 25;
$category = ($age < 13) ? "Child" :
            (($age < 20) ? "Teenager" :
            (($age < 60) ? "Adult" : "Senior"));

echo $category;  // Output: Adult
?>
```

**Note:** While nested ternary operators are possible, using regular `if-elseif-else` is often more readable for complex conditions.

#### Null Coalescing Operator (PHP 7+)

The null coalescing operator `??` is a special ternary operator for checking if a variable exists and is not null.

```php
<?php
// Traditional way
$username = isset($_GET['user']) ? $_GET['user'] : 'Guest';

// Null coalescing operator
$username = $_GET['user'] ?? 'Guest';

// Chaining null coalescing
$name = $firstName ?? $defaultName ?? 'Unknown';

// Practical examples
$page = $_GET['page'] ?? 1;
$limit = $_GET['limit'] ?? 10;
$search = $_POST['search'] ?? '';

echo "Page: $page, Limit: $limit";
?>
```

---

### 2.1.3 Switch Statement

The `switch` statement is used to perform different actions based on different conditions. It's an alternative to multiple `if-elseif` statements.

**Syntax:**
```php
switch (expression) {
    case value1:
        // code to execute if expression == value1
        break;
    case value2:
        // code to execute if expression == value2
        break;
    case value3:
        // code to execute if expression == value3
        break;
    default:
        // code to execute if no case matches
        break;
}
```

**Basic Examples:**
```php
<?php
$day = 3;

switch ($day) {
    case 1:
        echo "Monday";
        break;
    case 2:
        echo "Tuesday";
        break;
    case 3:
        echo "Wednesday";
        break;
    case 4:
        echo "Thursday";
        break;
    case 5:
        echo "Friday";
        break;
    case 6:
        echo "Saturday";
        break;
    case 7:
        echo "Sunday";
        break;
    default:
        echo "Invalid day";
        break;
}
// Output: Wednesday
?>
```

#### Switch with Strings:

```php
<?php
$color = "red";

switch ($color) {
    case "red":
        echo "Color is red";
        break;
    case "blue":
        echo "Color is blue";
        break;
    case "green":
        echo "Color is green";
        break;
    default:
        echo "Unknown color";
        break;
}
// Output: Color is red

// User role example
$role = "admin";

switch ($role) {
    case "admin":
        echo "Full access granted";
        break;
    case "editor":
        echo "Edit access granted";
        break;
    case "viewer":
        echo "View-only access";
        break;
    default:
        echo "No access";
        break;
}
// Output: Full access granted
?>
```

#### Fall-Through Cases

When you omit the `break` statement, execution "falls through" to the next case.

```php
<?php
$day = "Saturday";

switch ($day) {
    case "Monday":
    case "Tuesday":
    case "Wednesday":
    case "Thursday":
    case "Friday":
        echo "Weekday - Go to work";
        break;
    case "Saturday":
    case "Sunday":
        echo "Weekend - Relax!";
        break;
    default:
        echo "Invalid day";
        break;
}
// Output: Weekend - Relax!

// Grade example
$grade = "B";

switch ($grade) {
    case "A":
    case "B":
        echo "Excellent work!";
        break;
    case "C":
        echo "Good job!";
        break;
    case "D":
        echo "You passed.";
        break;
    case "F":
        echo "Failed. Try again.";
        break;
    default:
        echo "Invalid grade";
        break;
}
// Output: Excellent work!
?>
```

#### Switch vs If-Elseif

```php
<?php
// Using if-elseif
$status = "active";

if ($status == "active") {
    echo "Account is active";
} elseif ($status == "inactive") {
    echo "Account is inactive";
} elseif ($status == "suspended") {
    echo "Account is suspended";
} else {
    echo "Unknown status";
}

// Using switch (cleaner for multiple exact matches)
switch ($status) {
    case "active":
        echo "Account is active";
        break;
    case "inactive":
        echo "Account is inactive";
        break;
    case "suspended":
        echo "Account is suspended";
        break;
    default:
        echo "Unknown status";
        break;
}
?>
```

**When to use Switch:**
- Multiple exact value comparisons
- Cleaner code for many conditions
- Testing against single variable

**When to use If-Elseif:**
- Complex conditions with operators (>, <, >=, etc.)
- Different variables in each condition
- Range checking

#### Alternative Switch Syntax:

```php
<?php
$action = "edit";

switch ($action):
    case "view":
        echo "Viewing record";
        break;
    case "edit":
        echo "Editing record";
        break;
    case "delete":
        echo "Deleting record";
        break;
    default:
        echo "Unknown action";
        break;
endswitch;
// Output: Editing record
?>
```

---

## 2.2 Using Loop for Repetitive Tasks

Loops are used to execute a block of code repeatedly as long as a specified condition is met.

### 2.2.1 While, Do...While, For

#### The `while` Loop

Executes a block of code as long as the condition is true. The condition is checked **before** each iteration.

**Syntax:**
```php
while (condition) {
    // code to execute
}
```

**Examples:**
```php
<?php
// Basic while loop
$i = 1;
while ($i <= 5) {
    echo "Number: $i <br>";
    $i++;
}
/* Output:
Number: 1
Number: 2
Number: 3
Number: 4
Number: 5
*/

// Print even numbers
$num = 2;
while ($num <= 10) {
    echo "$num ";
    $num += 2;
}
// Output: 2 4 6 8 10

// Countdown
$count = 5;
while ($count > 0) {
    echo "$count... ";
    $count--;
}
echo "Blast off!";
// Output: 5... 4... 3... 2... 1... Blast off!

// Sum of numbers
$sum = 0;
$n = 1;
while ($n <= 10) {
    $sum += $n;
    $n++;
}
echo "Sum: $sum";
// Output: Sum: 55
?>
```

#### Practical While Loop Examples:

```php
<?php
// Reading lines from array
$lines = ["Line 1", "Line 2", "Line 3"];
$index = 0;
while ($index < count($lines)) {
    echo $lines[$index] . "<br>";
    $index++;
}

// User authentication attempts
$attempts = 0;
$maxAttempts = 3;
$correctPassword = "secret123";
$inputPassword = "";

while ($attempts < $maxAttempts && $inputPassword !== $correctPassword) {
    // Simulate user input
    $inputPassword = "wrong";  // In real app, get from user
    $attempts++;
    if ($inputPassword !== $correctPassword) {
        echo "Wrong password. Attempt $attempts of $maxAttempts<br>";
    }
}

if ($inputPassword === $correctPassword) {
    echo "Login successful!";
} else {
    echo "Account locked. Too many attempts.";
}
?>
```

#### The `do...while` Loop

Similar to `while`, but the condition is checked **after** each iteration. This guarantees at least one execution.

**Syntax:**
```php
do {
    // code to execute
} while (condition);
```

**Examples:**
```php
<?php
// Basic do-while
$i = 1;
do {
    echo "Number: $i <br>";
    $i++;
} while ($i <= 5);
/* Output:
Number: 1
Number: 2
Number: 3
Number: 4
Number: 5
*/

// Executes at least once even if condition is false
$x = 10;
do {
    echo "This runs once";
    $x++;
} while ($x < 5);
// Output: This runs once (even though 10 is not < 5)

// Menu-driven program
$choice = 0;
do {
    echo "Menu:\n";
    echo "1. Option 1\n";
    echo "2. Option 2\n";
    echo "3. Exit\n";

    // Simulate user choice
    $choice = 3;  // In real app, get from user input

    if ($choice == 1) {
        echo "You selected Option 1\n";
    } elseif ($choice == 2) {
        echo "You selected Option 2\n";
    }
} while ($choice != 3);

echo "Goodbye!";
?>
```

#### While vs Do-While:

```php
<?php
// While loop - may not execute at all
$count = 0;
while ($count > 0) {
    echo "This never runs";
    $count--;
}

// Do-While loop - executes at least once
$count = 0;
do {
    echo "This runs once";
    $count--;
} while ($count > 0);
?>
```

#### The `for` Loop

Used when you know in advance how many times you want to execute a block of code.

**Syntax:**
```php
for (initialization; condition; increment) {
    // code to execute
}
```

**Components:**
- **Initialization**: Executed once before the loop starts
- **Condition**: Checked before each iteration
- **Increment**: Executed after each iteration

**Examples:**
```php
<?php
// Basic for loop
for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i <br>";
}
/* Output:
Number: 1
Number: 2
Number: 3
Number: 4
Number: 5
*/

// Counting backwards
for ($i = 10; $i >= 1; $i--) {
    echo "$i ";
}
// Output: 10 9 8 7 6 5 4 3 2 1

// Skip numbers (increment by 2)
for ($i = 0; $i <= 10; $i += 2) {
    echo "$i ";
}
// Output: 0 2 4 6 8 10

// Multiplication table
$num = 5;
for ($i = 1; $i <= 10; $i++) {
    echo "$num x $i = " . ($num * $i) . "<br>";
}
/* Output:
5 x 1 = 5
5 x 2 = 10
5 x 3 = 15
...
5 x 10 = 50
*/
?>
```

#### Advanced For Loop Examples:

```php
<?php
// Multiple variables
for ($i = 0, $j = 10; $i < 5; $i++, $j--) {
    echo "i=$i, j=$j <br>";
}
/* Output:
i=0, j=10
i=1, j=9
i=2, j=8
i=3, j=7
i=4, j=6
*/

// Empty expressions (infinite loop with break)
for ($i = 1; ; $i++) {
    echo "$i ";
    if ($i >= 5) {
        break;
    }
}
// Output: 1 2 3 4 5

// Nested for loops (pattern printing)
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}
/* Output:
*
* *
* * *
* * * *
* * * * *
*/

// Generate HTML table
echo "<table border='1'>";
for ($row = 1; $row <= 3; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 4; $col++) {
        echo "<td>R{$row}C{$col}</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
```

#### Foreach Loop (for arrays)

The `foreach` loop is specifically designed for iterating through arrays.

**Syntax:**
```php
foreach ($array as $value) {
    // code to execute
}

// With key and value
foreach ($array as $key => $value) {
    // code to execute
}
```

**Examples:**
```php
<?php
// Simple array
$colors = ["Red", "Green", "Blue", "Yellow"];

foreach ($colors as $color) {
    echo "$color <br>";
}
/* Output:
Red
Green
Blue
Yellow
*/

// With index
$fruits = ["Apple", "Banana", "Orange"];

foreach ($fruits as $index => $fruit) {
    echo "$index: $fruit <br>";
}
/* Output:
0: Apple
1: Banana
2: Orange
*/

// Associative array
$person = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];

foreach ($person as $key => $value) {
    echo "$key: $value <br>";
}
/* Output:
name: John
age: 30
city: New York
*/

// Modifying array values (by reference)
$numbers = [1, 2, 3, 4, 5];

foreach ($numbers as &$num) {
    $num = $num * 2;
}
unset($num);  // Break reference

print_r($numbers);
// Output: Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 [4] => 10 )
?>
```

---

### 2.2.2 Continue and Break

#### The `break` Statement

The `break` statement immediately terminates the loop and continues with the code after the loop.

**Examples:**
```php
<?php
// Break in for loop
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        break;  // Stop when i equals 5
    }
    echo "$i ";
}
echo " Loop ended.";
// Output: 1 2 3 4  Loop ended.

// Break in while loop
$count = 1;
while (true) {
    echo "$count ";
    $count++;
    if ($count > 5) {
        break;  // Exit infinite loop
    }
}
// Output: 1 2 3 4 5

// Search in array
$numbers = [5, 10, 15, 20, 25];
$search = 15;
$found = false;

foreach ($numbers as $num) {
    if ($num == $search) {
        echo "Found: $search";
        $found = true;
        break;  // Stop searching once found
    }
}

if (!$found) {
    echo "Not found";
}
// Output: Found: 15

// Break with nested loops (break level)
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        if ($i == 2 && $j == 2) {
            break 2;  // Break out of both loops
        }
        echo "($i,$j) ";
    }
}
// Output: (1,1) (1,2) (1,3) (2,1)
?>
```

#### The `continue` Statement

The `continue` statement skips the current iteration and continues with the next iteration of the loop.

**Examples:**
```php
<?php
// Continue in for loop
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        continue;  // Skip even numbers
    }
    echo "$i ";
}
// Output: 1 3 5 7 9 (only odd numbers)

// Continue in while loop
$count = 0;
while ($count < 10) {
    $count++;
    if ($count == 5) {
        continue;  // Skip 5
    }
    echo "$count ";
}
// Output: 1 2 3 4 6 7 8 9 10

// Skip negative numbers
$numbers = [-3, 5, -1, 8, -9, 12];

foreach ($numbers as $num) {
    if ($num < 0) {
        continue;  // Skip negative numbers
    }
    echo "$num ";
}
// Output: 5 8 12

// Process only logged-in users
$users = [
    ["name" => "John", "active" => true],
    ["name" => "Jane", "active" => false],
    ["name" => "Bob", "active" => true]
];

foreach ($users as $user) {
    if (!$user["active"]) {
        continue;  // Skip inactive users
    }
    echo "Processing: " . $user["name"] . "<br>";
}
/* Output:
Processing: John
Processing: Bob
*/
?>
```

#### Break vs Continue:

```php
<?php
echo "Break Example:<br>";
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        break;  // Stops at 3
    }
    echo "$i ";
}
// Output: 1 2

echo "<br>Continue Example:<br>";
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue;  // Skips 3
    }
    echo "$i ";
}
// Output: 1 2 4 5
?>
```

#### Practical Examples with Break and Continue:

```php
<?php
// Validate input - stop on first error
$inputs = ["john@email.com", "jane", "bob@email.com"];
$validEmails = [];

foreach ($inputs as $email) {
    if (strpos($email, '@') === false) {
        echo "Invalid email found: $email. Stopping validation.<br>";
        break;  // Stop processing on first invalid email
    }
    $validEmails[] = $email;
}

print_r($validEmails);
// Output: Invalid email found: jane. Stopping validation.
//         Array ( [0] => john@email.com )

// Skip invalid entries but continue processing
$inputs = ["john@email.com", "jane", "bob@email.com"];
$validEmails = [];

foreach ($inputs as $email) {
    if (strpos($email, '@') === false) {
        echo "Skipping invalid email: $email<br>";
        continue;  // Skip this one, continue with others
    }
    $validEmails[] = $email;
}

print_r($validEmails);
// Output: Skipping invalid email: jane
//         Array ( [0] => john@email.com [1] => bob@email.com )

// Find first prime number after N
$n = 10;
$found = false;

for ($num = $n + 1; $num <= 100; $num++) {
    $isPrime = true;

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            $isPrime = false;
            break;  // Not prime, stop checking divisors
        }
    }

    if ($isPrime) {
        echo "First prime after $n is: $num";
        $found = true;
        break;  // Found it, stop outer loop
    }
}
// Output: First prime after 10 is: 11
?>
```

---

## Comparison of Loops

| Loop Type | Best Used For | Condition Check |
|-----------|---------------|-----------------|
| **while** | Unknown iterations, condition-based | Before iteration |
| **do-while** | At least one execution needed | After iteration |
| **for** | Known iterations, counter-based | Before iteration |
| **foreach** | Iterating through arrays | Automatic |

### Choosing the Right Loop:

```php
<?php
// FOR: When you know the exact count
for ($i = 0; $i < 10; $i++) {
    echo "$i ";
}

// WHILE: When condition-based, unknown iterations
$input = "";
while ($input !== "quit") {
    // $input = getUserInput();  // Simulated
    $input = "quit";  // For demo
}

// DO-WHILE: When at least one execution is needed
do {
    echo "Enter your choice: ";
    $choice = 1;  // Simulated input
} while ($choice == 0);

// FOREACH: When working with arrays
$items = ["A", "B", "C"];
foreach ($items as $item) {
    echo $item;
}
?>
```

---

## Common Loop Patterns

### Pattern 1: Counting
```php
<?php
// Count up
for ($i = 1; $i <= 5; $i++) {
    echo $i . " ";
}

// Count down
for ($i = 5; $i >= 1; $i--) {
    echo $i . " ";
}

// Count by steps
for ($i = 0; $i <= 20; $i += 5) {
    echo $i . " ";
}
?>
```

### Pattern 2: Accumulation
```php
<?php
// Sum of numbers
$sum = 0;
for ($i = 1; $i <= 10; $i++) {
    $sum += $i;
}
echo "Sum: $sum";  // Output: 55

// Product of numbers
$product = 1;
for ($i = 1; $i <= 5; $i++) {
    $product *= $i;
}
echo "Product: $product";  // Output: 120 (factorial)
?>
```

### Pattern 3: Nested Loops
```php
<?php
// Multiplication table
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        echo ($i * $j) . "\t";
    }
    echo "<br>";
}

// Triangle pattern
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}
?>
```

---

## Summary

### Key Takeaways:

1. **Conditional Statements**:
   - `if`: Execute code when condition is true
   - `else`: Execute code when condition is false
   - `elseif`: Test multiple conditions sequentially
   - Ternary `? :`: Shorthand for simple if-else
   - `switch`: Multiple exact value comparisons

2. **Loops**:
   - `while`: Condition checked before iteration
   - `do-while`: Condition checked after iteration (runs at least once)
   - `for`: Best for known iteration count
   - `foreach`: Specifically for arrays

3. **Loop Control**:
   - `break`: Exit loop immediately
   - `continue`: Skip current iteration, continue with next
   - Can specify level for nested loops: `break 2;`

---

## Practice Exercises

1. Write a program using if-elseif-else to determine if a number is positive, negative, or zero
2. Create a grade calculator using switch statement (A, B, C, D, F)
3. Use ternary operator to check if a number is even or odd
4. Write a while loop to print all even numbers from 1 to 20
5. Create a do-while loop for a simple menu system
6. Use a for loop to generate a multiplication table
7. Print the Fibonacci sequence using loops
8. Create a triangle pattern using nested loops
9. Find all prime numbers between 1 and 100 using loops with break
10. Skip multiples of 3 in a loop using continue

---

## Important Notes for Exam:

- **If vs Switch**: Use switch for multiple exact matches, if for complex conditions
- **While vs Do-While**: Do-while executes at least once
- **Break**: Exits the entire loop
- **Continue**: Skips current iteration only
- **Ternary operator**: `(condition) ? true_value : false_value`
- **Null coalescing**: `??` checks if variable exists and is not null (PHP 7+)
- **Foreach**: Specifically designed for arrays
- **Alternative syntax**: Using colon and endif/endwhile/endfor/endswitch
- **Loop level**: `break 2;` breaks out of 2 nested loops

<?php
/***************************************************************
 * PHP BASICS: Functions
 * Description: This script demonstrates different types of
 *              functions in PHP: simple, with arguments,
 *              with return values, default arguments, variable
 *              arguments, nested functions, and recursion.
 ***************************************************************/

/* ===========================
   1. Basic Function
   =========================== */
function sayHello() {
    echo "Hello World!<br>";
}

sayHello(); // Calling the function


/* ===========================
   2. Function with Arguments
   =========================== */
function add($a, $b) {
    echo "Sum of $a and $b = " . ($a + $b) . "<br>";
}

add(10, 20);
// add("Hello ", "World!"); // Works as string concatenation


/* ===========================
   3. Function with Return Value
   =========================== */
function getSum($a, $b) {
    return $a + $b;
}

$value = getSum(10, 20);
echo "Returned Sum: $value<br>";

$value = getSum("10", "20"); // PHP auto converts strings to numbers
echo "Returned Sum with strings: $value<br>";


/* ===========================
   4. Function with Default Argument
   =========================== */
function welcome($name = "Guest") {
    echo "Welcome, $name!<br>";
}

welcome();         // Uses default argument
welcome("John");   // Overrides default


/* ===========================
   5. Function with Variable Number of Arguments (Spread ...)
   =========================== */
function sum(...$numbers) {
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

echo "Sum of 1, 2, 3: " . sum(1, 2, 3) . "<br>";
echo "Sum of 1, 2, 3, 4: " . sum(1, 2, 3, 4) . "<br>";


/* ===========================
   6. Function with Variable Arguments (func_get_args)
   =========================== */
function sum2() {
    $numbers = func_get_args(); // Gets all arguments as an array
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

echo "Sum of 1, 2, 3 (func_get_args): " . sum2(1, 2, 3) . "<br>";


/* ===========================
   7. Nested Functions
   ===========================
   - A function can define another function inside it.
   - The inner function will only be available after the outer one is called.
*/
function hello() {
    echo "Hello World!<br>";

    function greet() {
        echo "Welcome to the world of functions!<br>";
    }
}

// greet(); // ❌ ERROR: greet() not available yet
hello();    // Call hello(), which defines greet()
greet();    // Now greet() is available


/* ===========================
   8. Recursive Function
   ===========================
   - A function that calls itself.
   - Commonly used for problems like factorial, fibonacci, etc.
*/
function factorial($n) {
    if ($n == 0) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

echo "Factorial of 5: " . factorial(5) . "<br>";
?>

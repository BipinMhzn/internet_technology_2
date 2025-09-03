<?php
/***************************************************************
 * PHP BASICS: Operators (Arithmetic, Assignment, Logical)
 * Author: Your Name
 * Description: This script demonstrates how different types of
 *              operators work in PHP with examples.
 ***************************************************************/

/* ===========================
   1. Arithmetic Operators
   ===========================
   Arithmetic operators are used with numbers to perform
   basic mathematical operations.
   Operators: +, -, *, /, %, **
*/

echo "<h3>Arithmetic Operators:</h3>";

$a = 15;
$b = 4;

echo "a = $a, b = $b<br>";
echo "Addition (a + b): " . ($a + $b) . "<br>";
echo "Subtraction (a - b): " . ($a - $b) . "<br>";
echo "Multiplication (a * b): " . ($a * $b) . "<br>";
echo "Division (a / b): " . ($a / $b) . "<br>";
echo "Modulus (a % b): " . ($a % $b) . " (remainder)<br>";
echo "Exponentiation (a ** b): " . ($a ** $b) . "<br>";

/* ===========================
   2. Assignment Operators
   ===========================
   Assignment operators are used to assign values to variables.
   They can also perform operations while assigning.
   Operators: =, +=, -=, *=, /=, %=
*/

echo "<h3>Assignment Operators:</h3>";

$x = 10;
echo "Initial value of x: $x<br>";

$x += 5;  // x = x + 5
echo "After x += 5: $x<br>";

$x -= 3;  // x = x - 3
echo "After x -= 3: $x<br>";

$x *= 2;  // x = x * 2
echo "After x *= 2: $x<br>";

$x /= 4;  // x = x / 4
echo "After x /= 4: $x<br>";

$x %= 3;  // x = x % 3
echo "After x %= 3: $x<br>";

/* ===========================
   3. Logical Operators
   ===========================
   Logical operators are used to combine conditional statements.
   Operators: and (&&), or (||), not (!)
*/

echo "<h3>Logical Operators:</h3>";

$val1 = true;
$val2 = false;

echo "val1 = true, val2 = false<br>";

// AND operator: true if both are true
echo "val1 && val2: "; var_dump($val1 && $val2); echo "<br>";

// OR operator: true if at least one is true
echo "val1 || val2: "; var_dump($val1 || $val2); echo "<br>";

// NOT operator: negates the value
echo "!val1: "; var_dump(!$val1); echo "<br>";
echo "!val2: "; var_dump(!$val2); echo "<br>";

/* ===========================
   4. Combined Example
   ===========================
   Using operators together in conditions.
*/

echo "<h3>Combined Example:</h3>";

$age = 18;
$isStudent = true;

if ($age >= 18 && $isStudent) {
    echo "You are an adult student.<br>";
} else {
    echo "Condition not satisfied.<br>";
}

?>
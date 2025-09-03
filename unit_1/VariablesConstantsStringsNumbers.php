<?php
/***************************************************************
 * PHP BASICS: Variables, Constants, Superglobals, Strings, Numbers
 * Description: This script demonstrates PHP variables, constants,
 *              superglobals, string operations, and number operations.
 ***************************************************************/

/* ===========================
   1. PHP Variables
   ===========================
   - Variables in PHP start with a $ sign.
   - Variable names are case-sensitive.
   - They can store different data types (string, int, float, etc).
*/

$studentName = "Alice";
$studentAge = 20;
$isEnrolled = true;

echo "<h3>Variables:</h3>";
echo "Name: $studentName<br>";
echo "Age: $studentAge<br>";
echo "Enrolled: "; var_dump($isEnrolled);
echo "<br>";

/* ===========================
   2. PHP Constants
   ===========================
   - Constants hold values that cannot be changed once set.
   - Declared using define() or const keyword.
*/

define("SITE_NAME", "PHP Tutorial Site");
const PI = 3.14159;

echo "<h3>Constants:</h3>";
echo "Site Name: " . SITE_NAME . "<br>";
echo "Value of PI: " . PI . "<br>";

/* ===========================
   3. PHP Superglobals
   ===========================
   - Superglobals are built-in arrays that are always accessible.
   - Examples: $_GET, $_POST, $_SERVER, $_SESSION, $_COOKIE
*/

// Display server info
echo "<h3>Superglobals:</h3>";
echo "PHP Script Name: " . $_SERVER['PHP_SELF'] . "<br>";
echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";

/* ===========================
   4. Strings in PHP
   ===========================
   - Strings can be single-quoted or double-quoted.
   - Double quotes allow variable parsing.
*/

$str1 = "Hello";
$str2 = 'World';

echo "<h3>Strings:</h3>";
echo "Double quoted: $str1<br>";
echo 'Single quoted: $str2 (does not parse $str2)<br>';

/* ===========================
   5. String Concatenation
   ===========================
   - Concatenation uses the dot (.) operator.
*/

$fullString = $str1 . " " . $str2 . "!";
echo "Concatenated String: " . $fullString . "<br>";

/* ===========================
   6. String In-Built Functions
   ===========================
   - PHP provides many built-in functions for string manipulation.
*/

echo "<h3>String Functions:</h3>";
echo "Length of string: " . strlen($fullString) . "<br>";
echo "Word count: " . str_word_count($fullString) . "<br>";
echo "Reversed string: " . strrev($fullString) . "<br>";
echo "Position of 'World': " . strpos($fullString, "World") . "<br>";
echo "Replace 'World' with 'PHP': " . str_replace("World", "PHP", $fullString) . "<br>";

/* ===========================
   7. Numbers in PHP
   ===========================
   - Numbers can be integers or floats.
   - PHP has many functions to work with numbers.
*/

$intNum = 42;
$floatNum = 3.75;

echo "<h3>Numbers:</h3>";
echo "Integer: $intNum<br>";
echo "Float: $floatNum<br>";

/* ===========================
   8. Number In-Built Functions
   ===========================
   - Common functions: is_int(), is_float(), round(), sqrt(), abs(), rand()
*/

echo "<h3>Number Functions:</h3>";
echo "Is \$intNum integer? "; var_dump(is_int($intNum)); echo "<br>";
echo "Is \$floatNum float? "; var_dump(is_float($floatNum)); echo "<br>";
echo "Round(3.75): " . round($floatNum) . "<br>";
echo "Square root of 49: " . sqrt(49) . "<br>";
echo "Absolute value of -10: " . abs(-10) . "<br>";
echo "Random number between 1 and 100: " . rand(1, 100) . "<br>";

?>
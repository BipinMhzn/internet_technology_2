<?php
/***************************************************************
 * PHP BASICS: echo, print, comments, and data types
 * Description: This script demonstrates the use of echo, print,
 *              single-line & multi-line comments, and all
 *              major PHP data types.
 ***************************************************************/

/* ===========================
   1. Output in PHP: echo & print
   =========================== */

// Using echo (can take multiple parameters, faster than print)
echo "Hello, World using echo!<br>";
echo "This ", "string ", "is ", "made ", "with ", "multiple arguments.<br>";

// Using print (only takes one argument, returns 1 so usable in expressions)
print "Hello, World using print!<br>";
$result = print "Print returns 1, so this can be assigned.<br>";
echo "Value of \$result: $result<br>";

/* ===========================
   2. Comments in PHP
   =========================== */

// This is a single-line comment using double slashes

# This is also a single-line comment using the hash symbol

/*
   This is a multi-line comment.
   It can span multiple lines.
   Useful for explanations or documentation.
*/

/* ===========================
   3. PHP Data Types
   =========================== */

// Boolean
$boolTrue = true;
$boolFalse = false;

echo "<br><b>Boolean:</b><br>";
echo "True value: "; var_dump($boolTrue);
echo "<br>False value: "; var_dump($boolFalse);
echo "<br>";

// Integer
$integerVar = 42;
echo "<br><b>Integer:</b><br>";
var_dump($integerVar);
echo "<br>";

// Float (floating point number or double)
$floatVar = 3.14159;
echo "<br><b>Float:</b><br>";
var_dump($floatVar);
echo "<br>";

// String
$stringVar = "Hello PHP!";
echo "<br><b>String:</b><br>";
var_dump($stringVar);
echo "<br>";

// Array
$arrayVar = array("PHP", "JavaScript", "Python");
echo "<br><b>Array:</b><br>";
var_dump($arrayVar);
echo "<br>";

// Object (Example: A simple class and object)
class Student {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age  = $age;
    }

    public function introduce() {
        return "Hi, I'm $this->name and I'm $this->age years old.";
    }
}

$student1 = new Student("Alice", 20);
echo "<br><b>Object:</b><br>";
var_dump($student1);
echo "<br>" . $student1->introduce() . "<br>";

// Resource (Example: Opening a file)
echo "<br><b>Resource:</b><br>";
$fileHandle = fopen("php://memory", "r+"); // Temporary memory stream
var_dump($fileHandle);
fclose($fileHandle); // Always close resources
echo "<br>";

// NULL
$nullVar = null;
echo "<br><b>NULL:</b><br>";
var_dump($nullVar);
echo "<br>";
?>

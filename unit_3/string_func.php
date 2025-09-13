<?php

/***************************************************************
 * PHP BASICS: String Built-in Functions
 * Description: This script demonstrates commonly used
 *              string functions in PHP with examples.
 ***************************************************************/

$str = "   hello world   ";

echo "<h2>Original String:</h2>";
echo "[$str]<br>"; // Brackets to show spaces clearly

/* ===========================
   1. strlen()
   - Returns the length of a string
=========================== */
echo "<h3>strlen()</h3>";
echo "Length of string: " . strlen($str) . "<br>";

/* ===========================
   2. strrev()
   - Reverses a string
=========================== */
echo "<h3>strrev()</h3>";
echo "Reversed string: " . strrev($str) . "<br>";

/* ===========================
   3. strtoupper()
   - Converts string to uppercase
=========================== */
echo "<h3>strtoupper()</h3>";
echo strtoupper($str) . "<br>";

/* ===========================
   4. strtolower()
   - Converts string to lowercase
=========================== */
echo "<h3>strtolower()</h3>";
echo strtolower("HELLO PHP!") . "<br>";

/* ===========================
   5. ucfirst()
   - Converts first character to uppercase
=========================== */
echo "<h3>ucfirst()</h3>";
echo ucfirst("php is awesome") . "<br>";

/* ===========================
   6. ucwords()
   - Converts first character of each word to uppercase
=========================== */
echo "<h3>ucwords()</h3>";
echo ucwords("php is awesome") . "<br>";

/* ===========================
   7. substr()
   - Extracts part of a string
   substr(string, start, length)
=========================== */
echo "<h3>substr()</h3>";
echo "Substring (0,5): " . substr("HelloWorld", 0, 5) . "<br>"; // Hello
echo "Substring (5): " . substr("HelloWorld", 5) . "<br>";       // World

/* ===========================
   8. str_replace()
   - Replaces some characters with others
=========================== */
echo "<h3>str_replace()</h3>";
echo str_replace("world", "PHP", "hello world") . "<br>";

/* ===========================
   9. strpos()
   - Finds the position of the first occurrence of a substring
=========================== */
echo "<h3>strpos()</h3>";
echo "Position of 'world' in string: " . strpos("hello world", "world") . "<br>";

/* ===========================
   10. trim()
   - Removes whitespace from both ends of a string
=========================== */
echo "<h3>trim()</h3>";
echo "Original (with spaces): [" . $str . "]<br>";
echo "After trim(): [" . trim($str) . "]<br>";


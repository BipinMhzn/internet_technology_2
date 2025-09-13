<?php
/***************************************************************
 * PHP BASICS: Math Functions
 * Description: This script demonstrates commonly used
 *              math functions in PHP with examples.
 ***************************************************************/

echo "<h2>PHP Math Functions</h2>";

/* ===========================
   1. abs()
   - Returns the absolute value
=========================== */
echo "<h3>abs()</h3>";
echo "abs(-10) = " . abs(-10) . "<br>";   // 10
echo "abs(25) = " . abs(25) . "<br>";     // 25

/* ===========================
   2. pow(x, y)
   - Returns x raised to the power of y
=========================== */
echo "<h3>pow()</h3>";
echo "pow(2, 3) = " . pow(2, 3) . "<br>";   // 8
echo "pow(5, 2) = " . pow(5, 2) . "<br>";   // 25

/* ===========================
   3. sqrt()
   - Returns the square root
=========================== */
echo "<h3>sqrt()</h3>";
echo "sqrt(16) = " . sqrt(16) . "<br>";   // 4
echo "sqrt(81) = " . sqrt(81) . "<br>";   // 9

/* ===========================
   4. round()
   - Rounds number to nearest integer
=========================== */
echo "<h3>round()</h3>";
echo "round(3.4) = " . round(3.4) . "<br>";   // 3
echo "round(3.6) = " . round(3.6) . "<br>";   // 4
echo "round(3.14159, 2) = " . round(3.14159, 2) . "<br>"; // 3.14

/* ===========================
   5. ceil()
   - Rounds number UP to nearest integer
=========================== */
echo "<h3>ceil()</h3>";
echo "ceil(3.2) = " . ceil(3.2) . "<br>";   // 4
echo "ceil(5.9) = " . ceil(5.9) . "<br>";   // 6

/* ===========================
   6. floor()
   - Rounds number DOWN to nearest integer
=========================== */
echo "<h3>floor()</h3>";
echo "floor(3.8) = " . floor(3.8) . "<br>"; // 3
echo "floor(5.1) = " . floor(5.1) . "<br>"; // 5

/* ===========================
   7. max()
   - Returns the largest number
=========================== */
echo "<h3>max()</h3>";
echo "max(2, 8, 5, 10, 3) = " . max(2, 8, 5, 10, 3) . "<br>";

/* ===========================
   8. min()
   - Returns the smallest number
=========================== */
echo "<h3>min()</h3>";
echo "min(2, 8, 5, 10, 3) = " . min(2, 8, 5, 10, 3) . "<br>";

/* ===========================
   9. rand(min, max)
   - Returns random number between min and max
=========================== */
echo "<h3>rand()</h3>";
echo "Random number between 1 and 10: " . rand(1, 10) . "<br>";
echo "Random number between 100 and 999: " . rand(100, 999) . "<br>";

/* ===========================
   10. number_format()
   - Formats number with grouped thousands
=========================== */
echo "<h3>number_format()</h3>";
$bigNumber = 1234567.891;
echo "Original number: $bigNumber<br>";
echo "Formatted: " . number_format($bigNumber) . "<br>";          // 1,234,568
echo "Formatted (2 decimals): " . number_format($bigNumber, 2) . "<br>"; // 1,234,567.89

?>

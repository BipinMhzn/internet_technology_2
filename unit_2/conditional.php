<?php

/***************************************************************
 * PHP BASICS: Conditional Statements
 * Description: This script demonstrates how to use
 *              If, Else, Elseif, Ternary Operator,
 *              and Switch in PHP.
 ***************************************************************/

echo "<h2>PHP Conditional Statements</h2>";

/* ===========================
   1. If Statement
   - Executes code if condition is true
=========================== */
echo "<h3>If Statement</h3>";
$age = 20;
if ($age >= 18) {
    echo "You are an adult.<br>";
}

/* ===========================
   2. If...Else Statement
   - Executes one block if true, another if false
=========================== */
echo "<h3>If...Else Statement</h3>";
$age = 15;
if ($age >= 18) {
    echo "You are an adult.<br>";
} else {
    echo "You are a minor.<br>";
}

/* ===========================
   3. If...Elseif...Else Statement
   - Tests multiple conditions
=========================== */
echo "<h3>If...Elseif...Else Statement</h3>";
$score = 75;
if ($score >= 90) {
    echo "Grade: A<br>";
} elseif ($score >= 75) {
    echo "Grade: B<br>";
} elseif ($score >= 50) {
    echo "Grade: C<br>";
} else {
    echo "Grade: F<br>";
}

/* ===========================
   4. Ternary Operator (?:)
   - Short way of writing If...Else
=========================== */
echo "<h3>Ternary Operator</h3>";
$isLoggedIn = true;
echo $isLoggedIn ? "Welcome back!<br>" : "Please log in.<br>";

/* ===========================
   5. Switch Statement
   - Selects code to execute based on value
=========================== */
echo "<h3>Switch Statement</h3>";
$day = "Wednesday";

switch ($day) {
    case "Monday":
        echo "Start of the week.<br>";
        break;
    case "Wednesday":
        echo "Midweek day.<br>";
        break;
    case "Friday":
        echo "Weekend is near!<br>";
        break;
    default:
        echo "It's just another day.<br>";
}


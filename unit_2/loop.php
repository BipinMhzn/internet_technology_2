<?php
/***************************************************************
 * PHP BASICS: Loops
 * Description: This script demonstrates how to use loops in PHP
 *              including while, do...while, for, foreach, and
 *              how to control loops using continue and break.
 ***************************************************************/

echo "<h2>PHP Loops</h2>";

/* ===========================
   1. While Loop
   - Executes as long as the condition is true
=========================== */
echo "<h3>While Loop</h3>";
$i = 1;
while ($i <= 5) {
    echo "Count: $i<br>";
    $i++;
}

/* ===========================
   2. Do...While Loop
   - Executes the block at least once before checking condition
=========================== */
echo "<h3>Do...While Loop</h3>";
$j = 1;
do {
    echo "Number: $j<br>";
    $j++;
} while ($j <= 5);

/* ===========================
   3. For Loop
   - Best for a known number of iterations
=========================== */
echo "<h3>For Loop</h3>";
for ($k = 1; $k <= 5; $k++) {
    echo "Iteration: $k<br>";
}

/* ===========================
   4. Foreach Loop
   - Used for arrays
=========================== */
echo "<h3>Foreach Loop</h3>";
$fruits = ["Apple", "Banana", "Orange"];
foreach ($fruits as $fruit) {
    echo "Fruit: $fruit<br>";
}

/* ===========================
   5. Continue Statement
   - Skips current iteration and moves to next
=========================== */
echo "<h3>Continue Statement</h3>";
for ($n = 1; $n <= 5; $n++) {
    if ($n == 3) {
        continue; // skip number 3
    }
    echo "Number: $n<br>";
}

/* ===========================
   6. Break Statement
   - Exits the loop immediately
=========================== */
echo "<h3>Break Statement</h3>";
for ($m = 1; $m <= 5; $m++) {
    if ($m == 4) {
        break; // stop loop at number 4
    }
    echo "Number: $m<br>";
}
?>

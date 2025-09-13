<?php
/***************************************************************
 * PHP BASICS: Array Functions
 * Description: This script demonstrates commonly used
 *              array functions in PHP with examples.
 ***************************************************************/

echo "<h2>PHP Array Functions</h2>";

/* ===========================
   1. explode()
   - Splits a string into array elements
=========================== */
echo "<h3>explode()</h3>";
$str = "apple,banana,orange";
$arr = explode(",", $str);
print_r($arr);
echo "<br>";

/* ===========================
   2. implode()
   - Joins array elements into a string
=========================== */
echo "<h3>implode()</h3>";
echo implode(" - ", $arr) . "<br>";

/* ===========================
   3. range()
   - Generates a number range as an array
=========================== */
echo "<h3>range()</h3>";
print_r(range(1, 5));
echo "<br>";

/* ===========================
   4. min() / max()
   - Finds the smallest and largest value
=========================== */
echo "<h3>min() / max()</h3>";
$nums = [10, 25, 3, 50, 7];
echo "Min: " . min($nums) . "<br>";
echo "Max: " . max($nums) . "<br>";

/* ===========================
   5. shuffle()
   - Randomly rearranges array elements
=========================== */
echo "<h3>shuffle()</h3>";
shuffle($nums);
print_r($nums);
echo "<br>";

/* ===========================
   6. array_slice()
   - Extracts a segment of an array
=========================== */
echo "<h3>array_slice()</h3>";
$fruits = ["apple", "banana", "orange", "mango"];
print_r(array_slice($fruits, 1, 2)); // banana, orange
echo "<br>";

/* ===========================
   7. array_shift()
   - Removes first element
=========================== */
echo "<h3>array_shift()</h3>";
$fruit = array_shift($fruits);
echo "Removed: $fruit<br>";
print_r($fruits);
echo "<br>";

/* ===========================
   8. array_unshift()
   - Adds element at beginning
=========================== */
echo "<h3>array_unshift()</h3>";
array_unshift($fruits, "grape");
print_r($fruits);
echo "<br>";

/* ===========================
   9. array_pop()
   - Removes last element
=========================== */
echo "<h3>array_pop()</h3>";
$last = array_pop($fruits);
echo "Removed: $last<br>";
print_r($fruits);
echo "<br>";

/* ===========================
   10. array_push()
   - Adds element at end
=========================== */
echo "<h3>array_push()</h3>";
array_push($fruits, "pear");
print_r($fruits);
echo "<br>";

/* ===========================
   11. array_unique()
   - Removes duplicate values
=========================== */
echo "<h3>array_unique()</h3>";
$dup = ["a", "b", "a", "c", "b"];
print_r(array_unique($dup));
echo "<br>";

/* ===========================
   12. array_reverse()
   - Reverses array
=========================== */
echo "<h3>array_reverse()</h3>";
print_r(array_reverse($fruits));
echo "<br>";

/* ===========================
   13. array_merge()
   - Combines two arrays
=========================== */
echo "<h3>array_merge()</h3>";
$a1 = ["red", "green"];
$a2 = ["blue", "yellow"];
print_r(array_merge($a1, $a2));
echo "<br>";

/* ===========================
   14. array_intersect()
   - Finds common elements
=========================== */
echo "<h3>array_intersect()</h3>";
$a1 = ["a", "b", "c"];
$a2 = ["b", "c", "d"];
print_r(array_intersect($a1, $a2));
echo "<br>";

/* ===========================
   15. array_diff()
   - Finds differences
=========================== */
echo "<h3>array_diff()</h3>";
print_r(array_diff($a1, $a2));
echo "<br>";

/* ===========================
   16. in_array()
   - Checks if value exists
=========================== */
echo "<h3>in_array()</h3>";
echo in_array("b", $a1) ? "Found<br>" : "Not found<br>";

/* ===========================
   17. array_key_exists()
   - Checks if key exists
=========================== */
echo "<h3>array_key_exists()</h3>";
$person = ["name" => "John", "age" => 30];
echo array_key_exists("name", $person) ? "Key exists<br>" : "Key not found<br>";

/* ===========================
   18. sort()
   - Sorts an array (ascending)
=========================== */
echo "<h3>sort()</h3>";
$nums = [5, 2, 8, 1];
sort($nums);
print_r($nums);
echo "<br>";

/* ===========================
   19. asort()
   - Sorts associative array by value
=========================== */
echo "<h3>asort()</h3>";
$ages = ["John" => 35, "Jane" => 30, "Bob" => 25];
asort($ages);
print_r($ages);
echo "<br>";

/* ===========================
   20. ksort()
   - Sorts associative array by key
=========================== */
echo "<h3>ksort()</h3>";
ksort($ages);
print_r($ages);
echo "<br>";

/* ===========================
   21. rsort()
   - Reverse sorts an array
=========================== */
echo "<h3>rsort()</h3>";
$nums = [5, 2, 8, 1];
rsort($nums);
print_r($nums);
echo "<br>";

/* ===========================
   22. krsort()
   - Reverse sorts associative array by key
=========================== */
echo "<h3>krsort()</h3>";
krsort($ages);
print_r($ages);
echo "<br>";
?>

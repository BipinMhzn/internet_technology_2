<?php
/***************************************************************
 * PHP BASICS: Date & Time Functions
 * Description: This script demonstrates commonly used
 *              date and time functions in PHP with examples.
 ***************************************************************/

echo "<h2>PHP Date and Time Functions</h2>";

/* ===========================
   1. date("Y-m-d")
   - Returns current date in Year-Month-Day format
=========================== */
echo "<h3>date('Y-m-d')</h3>";
echo "Today’s date: " . date("Y-m-d") . "<br>";

/* ===========================
   2. date("h:i:sa")
   - Returns current time (12-hour format with am/pm)
=========================== */
echo "<h3>date('h:i:sa')</h3>";
echo "Current time (12-hour): " . date("h:i:sa") . "<br>";

/* ===========================
   3. date("H:i:s")
   - Returns current time (24-hour format)
=========================== */
echo "<h3>date('H:i:s')</h3>";
echo "Current time (24-hour): " . date("H:i:s") . "<br>";

/* ===========================
   4. time()
   - Returns current Unix timestamp
   (number of seconds since January 1, 1970)
=========================== */
echo "<h3>time()</h3>";
echo "Current Unix timestamp: " . time() . "<br>";

/* ===========================
   5. mktime()
   - Returns Unix timestamp for a given date
   Syntax: mktime(hour, minute, second, month, day, year)
=========================== */
echo "<h3>mktime()</h3>";
$timestamp = mktime(0, 0, 0, 12, 25, 2025);
echo "Unix timestamp for 25 Dec 2025: " . $timestamp . "<br>";
echo "Formatted date: " . date("Y-m-d", $timestamp) . "<br>";

/* ===========================
   6. strtotime()
   - Converts a human-readable date string into timestamp
=========================== */
echo "<h3>strtotime()</h3>";
$timestamp2 = strtotime("next Monday");
echo "Next Monday timestamp: " . $timestamp2 . "<br>";
echo "Formatted date: " . date("Y-m-d", $timestamp2) . "<br>";
echo date("Y-m-d", strtotime("tomorrow")) . "<br>";
echo date("Y-m-d", strtotime("+1 week")) . "<br>";
echo date("Y-m-d", strtotime("+1 month")) . "<br>";
echo date("Y-m-d", strtotime("-1 year")) . "<br>";

/* ===========================
   7. date("l")
   - Returns day of the week
=========================== */
echo "<h3>date('l')</h3>";
echo "Today is: " . date("l") . "<br>";

/* ===========================
   8. date("F")
   - Returns month name
=========================== */
echo "<h3>date('F')</h3>";
echo "Current month: " . date("F") . "<br>";
?>
<?php

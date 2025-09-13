<?php

/***************************************************************
 * PHP BASICS: Arrays
 * Description: This script demonstrates different types of arrays
 *              in PHP: indexed, associative, multi-dimensional.
 *              It also introduces some useful
 *              array functions.
 ***************************************************************/

/* ===========================
   1. Indexed Arrays
   =========================== */
echo "<h2>Indexed Arrays</h2>";

// Using array() function
$fruits = array('apple', 'banana', 'orange');
print_r($fruits);
echo "<br>";

// Using short array syntax
$names = ['John', 'Jane', 'Bob'];
echo "The names are: $names[0], $names[1], $names[2]<br>";
print_r($names);
echo "<br>";

// Assigning values by index
$primes[0] = 2;
$primes[1] = 3;
$primes[2] = 5;
$primes[3] = 7;
print_r($primes);
echo "<br>";


/* ===========================
   2. Associative Arrays
   =========================== */
echo "<h2>Associative Arrays</h2>";

$ages = array("John" => 35, "Jane" => 30, "Bob" => 25);
echo "The ages are: " . $ages["John"] . ", " . $ages["Jane"] . ", " . $ages["Bob"] . "<br>";
print_r($ages);
echo "<br>";

// Updating values
$ages["John"] = 36;
$ages["Jane"] = 31;
$ages["Bob"] = 26;
print_r($ages);
echo "<br>";


/* ===========================
   3. Multi-Dimensional Arrays
   =========================== */
echo "<h2>Multi-Dimensional Arrays</h2>";

$family = array(
    'father' => array('name' => 'John', 'age' => 35),
    'mother' => array('name' => 'Jane', 'age' => 30),
    'son' => array('name' => 'Bob', 'age' => 25)
);

echo "The family is: " . $family['father']['name'] . ", "
    . $family['mother']['name'] . ", "
    . $family['son']['name'] . "<br>";
print_r($family);
echo "<br>";

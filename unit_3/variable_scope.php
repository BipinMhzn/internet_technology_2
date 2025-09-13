<?php
/***************************************************************
 * PHP BASICS: Variable Scope
 * Description: This script demonstrates different types of
 *              variable scope in PHP: local, global, static,
 *              and superglobals.
 ***************************************************************/

/* ===========================
   1. Local Scope
   ===========================
   - A variable declared inside a function is LOCAL to that function.
   - It cannot be accessed outside the function.
*/

echo "<h3>Local Scope:</h3>";

function localScopeExample() {
    $localVar = "I am local to this function.";
    echo $localVar . "<br>";
}

localScopeExample();
// echo $localVar; // ❌ ERROR: Undefined variable


/* ===========================
   2. Global Scope
   ===========================
   - Variables declared outside functions have GLOBAL scope.
   - They are not accessible inside functions unless declared with "global".
*/

echo "<h3>Global Scope:</h3>";

$globalVar = "I am a global variable.";

function globalScopeExample() {
    // Without "global", $globalVar is not accessible
    global $globalVar;  // ✅ Now it can be used
    echo $globalVar . "<br>";
}

globalScopeExample();


/* ===========================
   3. Static Scope
   ===========================
   - A static variable inside a function retains its value
     between function calls.
*/

echo "<h3>Static Scope:</h3>";

function staticScopeExample() {
    static $count = 0; // initialized only once
    $count++;
    echo "Function called $count times.<br>";
}

staticScopeExample();
staticScopeExample();
staticScopeExample();


/* ===========================
   4. Superglobals
   ===========================
   - Superglobals are built-in variables accessible everywhere.
   - Examples: $_GET, $_POST, $_SESSION, $_COOKIE, $_SERVER, etc.
*/

echo "<h3>Superglobals:</h3>";
echo "This script is running on server: " . $_SERVER['SERVER_NAME'] . "<br>";
echo "Script filename: " . $_SERVER['PHP_SELF'] . "<br>";

?>

<?php
class InvalidInputException extends Exception {}

function divideNumbers($num1, $num2) {
    // Check for non-numeric input
    if (!is_numeric($num1) || !is_numeric($num2)) {
        throw new InvalidInputException("Both inputs must be numbers!");
    }

    // Check for division by zero
    if ($num2 == 0) {
        throw new Exception("Cannot divide by zero!");
    }

    return $num1 / $num2;
}

try {
    echo "<h2>Division Operation Demo</h2>";

    $a = 10;
    $b = 2;
//    $b = 0;
//    $b = "abc";

    echo "Trying to divide $a by $b...<br><br>";

    // Attempt division
    $result = divideNumbers($a, $b);

    echo "Result: $a / $b = $result";
} catch (InvalidInputException $e) {
    echo "<b>Input Error:</b> " . $e->getMessage() . "<br>";
} catch (Exception $e) {
    echo "<b>General Error:</b> " . $e->getMessage() . "<br>";
} finally {
    echo "<hr><b>Program Execution Completed.</b>";
}
?>

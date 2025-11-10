<?php
// Define function ONCE
function calculateGrade($marks) {
    if ($marks >= 80) {
        return "A";
    } elseif ($marks >= 60) {
        return "B";
    } elseif ($marks >= 40) {
        return "C";
    } else {
        return "F";
    }
}

// Use function MANY times
echo "Student 1: " . calculateGrade(85) . "<br>";
echo "Student 2: " . calculateGrade(72) . "<br>";
echo "Student 3: " . calculateGrade(55) . "<br>";

// ✅ Clean, reusable, maintainable!
?>
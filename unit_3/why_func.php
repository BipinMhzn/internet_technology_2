<?php
// Scenario: Calculate grades for 3 students

// Student 1
$marks1 = 85;
if ($marks1 >= 80) {
    $grade1 = "A";
} elseif ($marks1 >= 60) {
    $grade1 = "B";
} elseif ($marks1 >= 40) {
    $grade1 = "C";
} else {
    $grade1 = "F";
}
echo "Student 1 Grade: $grade1<br>";

// Student 2
$marks2 = 72;
if ($marks2 >= 80) {
    $grade2 = "A";
} elseif ($marks2 >= 60) {
    $grade2 = "B";
} elseif ($marks2 >= 40) {
    $grade2 = "C";
} else {
    $grade2 = "F";
}
echo "Student 2 Grade: $grade2<br>";

// Student 3
$marks3 = 55;
if ($marks3 >= 80) {
    $grade3 = "A";
} elseif ($marks3 >= 60) {
    $grade3 = "B";
} elseif ($marks3 >= 40) {
    $grade3 = "C";
} else {
    $grade3 = "F";
}
echo "Student 3 Grade: $grade3<br>";

// 🤯 Same code repeated 3 times!
?>
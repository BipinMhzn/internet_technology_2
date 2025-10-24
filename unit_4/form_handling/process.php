<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Radio Button (Gender)
    if (!empty($_POST['gender'])) {
        $gender = htmlspecialchars($_POST['gender']);
    } else {
        $gender = "Not selected";
    }

    // Checkboxes (Hobbies)
    if (!empty($_POST['hobbies'])) {
        $hobbies = $_POST['hobbies'];
    } else {
        $hobbies = [];
    }

    // Dropdown List (Country)
    if (!empty($_POST['country'])) {
        $country = htmlspecialchars($_POST['country']);
    } else {
        $country = "Not selected";
    }

    // Multi-Select List (Subjects)
    $subjects = !empty($_POST['subjects']) ? $_POST['subjects'] : [];

    // Display Results
    echo "<h2>Form Submission Result</h2>";
    echo "<p><b>Gender:</b> $gender</p>";

    echo "<p><b>Hobbies:</b> ";
    if (count($hobbies) > 0) {
        echo implode(", ", array_map('htmlspecialchars', $hobbies));
    } else {
        echo "No hobbies selected";
    }
    echo "</p>";

    echo "<p><b>Country:</b> $country</p>";

    echo "<p><b>Favorite Subjects:</b> ";
    echo count($subjects) ? implode(", ", array_map('htmlspecialchars', $subjects)) : "No subjects selected";
    echo "</p>";
}
?>

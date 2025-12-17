<?php
$servername = "localhost:3306";  // Server name or IP
$username = "root";         // MySQL username
$password = "MacbookPro16";         // MySQL password (blank in XAMPP)
$database = "PU";    // Database name

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

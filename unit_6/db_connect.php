<?php
// Step 1: Define connection variables
$servername = "localhost:8889";  // Server name or IP
$username = "root";         // MySQL username
$password = "root";         // MySQL password (blank in XAMPP)
$database = "studentdb";    // Database name

// Step 2: Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Step 3: Check connection
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}

echo "✅ Connected successfully to the database!";

// Step 4: Close connection
mysqli_close($conn);
?>

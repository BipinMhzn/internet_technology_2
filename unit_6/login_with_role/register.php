<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Check if username already exists
    $checkQuery = "SELECT * FROM users WHERE username='$username'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<p>Username already exists!</p>";
    } else {
        // Insert new user
        $insertQuery = "INSERT INTO users (username, password, role)
                        VALUES ('$username', '$password', '$role')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "<p>Registration successful!</p>";
            echo "<a href='login.php'>Go to Login</a>";
        } else {
            echo "<p>Error occurred during registration.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>

<h2>Register</h2>

<form method="post">
    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    Role:
    <select name="role" required>
        <option value="student">Student</option>
        <option value="admin">Admin</option>
    </select><br><br>

    <input type="submit" value="Register">
</form>

</body>
</html>

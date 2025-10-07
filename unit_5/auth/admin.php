<?php
session_start();

// Check if user is logged in and has admin role
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "admin") {
    header("Location: access_denied.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title></head>
<body>
<h2>Welcome Admin, <?php echo $_SESSION["username"]; ?>!</h2>
<p>This is the admin dashboard. Only admin users can access this page.</p>
<a href="logout.php">Logout</a>
</body>
</html>

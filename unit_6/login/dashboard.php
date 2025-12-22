<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: access_denied.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>

<h2>Welcome, <?php echo $_SESSION["email"]; ?>!</h2>
<p>This is a protected dashboard page.</p>

<a href="logout.php">Logout</a>

</body>
</html>

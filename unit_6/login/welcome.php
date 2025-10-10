<?php
// welcome.php
session_start();
if (!isset($_SESSION['username'])) {
    // Not logged in — redirect to login
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Welcome</title></head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?>!</h2>
<p>This is your protected welcome/dashboard page.</p>
<p><a href="logout.php">Logout</a></p>
</body>
</html>

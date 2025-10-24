<?php
if (isset($_COOKIE["theme_color"])) {
    $theme = $_COOKIE["theme_color"];
} else {
    $theme = "light"; // Default theme
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cookie Example</title>
</head>
<body style="background-color: <?php echo $theme == 'dark' ? '#333' : '#fff'; ?>; color: <?php echo $theme == 'dark' ? '#fff' : '#000'; ?>;">
<h2>Welcome!</h2>
<p>Your current theme is: <?php echo ucfirst($theme); ?></p>
<a href="cookie/set_theme.php?theme=light">Switch to Light Mode</a> |
<a href="cookie/set_theme.php?theme=dark">Switch to Dark Mode</a>
</body>
</html>

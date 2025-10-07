<?php
$theme = $_GET['theme'];
setcookie("theme_color", $theme, time() + (86400 * 30), "/"); // 30 days
echo "Theme color saved as $theme!";
?>

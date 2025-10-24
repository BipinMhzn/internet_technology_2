<?php
session_start();
session_destroy();

// Redirect back to login
header("Location: login.php");
exit();

<?php
session_start();
unset($_SESSION['cart']); // Clear only the cart data
header("Location: products.php");
exit;
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
</head>
<body>
<h2>Your Shopping Cart</h2>

<?php if (!empty($_SESSION['cart'])): ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Product</th><th>Price</th><th>Quantity</th><th>Total</th>
        </tr>
        <?php
        $grandTotal = 0;
        foreach ($_SESSION['cart'] as $id => $item):
            $total = $item['price'] * $item['quantity'];
            $grandTotal += $total;
            ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td>Rs. <?php echo $item['price']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td>Rs. <?php echo $total; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><strong>Grand Total</strong></td>
            <td><strong>Rs. <?php echo $grandTotal; ?></strong></td>
        </tr>
    </table>
    <br>
    <a href="products.php">Continue Shopping</a> |
    <a href="clear_cart.php">Clear Cart</a>
<?php else: ?>
    <p>Your cart is empty.</p>
    <a href="products.php">Go Back to Products</a>
<?php endif; ?>
</body>
</html>

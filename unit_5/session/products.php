<?php
session_start();

// List of products (in real world, these come from database)
$products = [
    1 => ["name" => "Laptop", "price" => 75000],
    2 => ["name" => "Headphones", "price" => 2500],
    3 => ["name" => "Mouse", "price" => 800],
    4 => ["name" => "Keyboard", "price" => 1500]
];

// Add product to cart
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id] = [
            "name" => $products[$id]["name"],
            "price" => $products[$id]["price"],
            "quantity" => 1
        ];
    }
    echo "<p style='color:green;'>Product added to cart!</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
</head>
<body>
<h2>Available Products</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>Product</th><th>Price</th><th>Action</th>
    </tr>
    <?php foreach ($products as $id => $product): ?>
        <tr>
            <td><?php echo $product["name"]; ?></td>
            <td>Rs. <?php echo $product["price"]; ?></td>
            <td><a href="?id=<?php echo $id; ?>">Add to Cart</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<a href="cart.php">View Cart</a>
</body>
</html>

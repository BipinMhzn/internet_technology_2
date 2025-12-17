<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO record (name, email, phone)
            VALUES ('$name', '$email', '$phone')";

    mysqli_query($conn, $sql);
    header("Location: view.php");
}
?>

<!DOCTYPE html>
<html>
    <body>
        <h2>Insert Customer Details</h2>

        <form method="post">
            Name: <input type="text" name="name" required><br><br>
            Email: <input type="email" name="email" required><br><br>
            Phone: <input type="text" name="phone" required><br><br>
            <input type="submit" name="submit" value="Insert">
        </form>
    </body>
</html>

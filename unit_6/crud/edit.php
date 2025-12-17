<?php
include "db_connect.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM record WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    mysqli_query($conn, "UPDATE record 
        SET name='$name', email='$email', phone='$phone'
        WHERE id=$id");

    mysqli_close($conn);
    header("Location: view.php");
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Edit Customer Details</h2>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
    Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br><br>
    <input type="submit" name="update" value="Update">
</form>

</body>
</html>

<?php
include "db_connect.php";
$result = mysqli_query($conn, "SELECT * FROM record ORDER BY id ASC");
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<body>
<h2>Customer Records</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['phone']}</td>
        <td>
            <a href='edit.php?id={$row['id']}'>Edit</a> |
            <a href='delete.php?id={$row['id']}'>Delete</a>
        </td>
    </tr>";
    }
    ?>
</table>
<br>
<a href="insert.php">Add New Record</a>

</body>
</html>

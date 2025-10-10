<?php
$conn = mysqli_connect("localhost:8889", "root", "root", "bankdb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "<h3>Bank Transaction Example</h3>";

// Start transaction
mysqli_begin_transaction($conn);

try {
    // Step 1: Debit account A
    $debit = "UPDATE accounts SET balance = balance - 500 WHERE id = 1";
    if (!mysqli_query($conn, $debit)) {
        throw new Exception("Error debiting account A: " . mysqli_error($conn));
    }

    // Step 2: Credit account B
    $credit = "UPDATE accounts SET balance = balance + 500 WHERE id = 2";
    if (!mysqli_query($conn, $credit)) {
        throw new Exception("Error crediting account B: " . mysqli_error($conn));
    }

    // If both queries succeed
    mysqli_commit($conn);
    echo "<p style='color:green;'>✅ Transaction successful! Amount transferred.</p>";

} catch (Exception $e) {
    // Rollback changes on failure
    mysqli_rollback($conn);
    echo "<p style='color:red;'>❌ Transaction failed: " . $e->getMessage() . "</p>";
}

mysqli_close($conn);
?>

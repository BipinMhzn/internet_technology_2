<?php

$servername = "localhost:8889";
$username = "root";
$password = "root";
$database = "studentdb";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}


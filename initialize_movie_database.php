<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// // sql to create table
$sql = "CREATE TABLE Movie(\n"
    . "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,\n"
    . "Name VARCHAR(50) NOT NULL,\n"
    . "Image_path VARCHAR(100) NOT NULL,\n"
    . "Length INT NOT NULL,\n"
    . "Language VARCHAR(30) NOT NULL,\n"
    . "Casting VARCHAR(200) NOT NULL,\n"
    . "Rating CHAR(4) NOT NULL,\n"
    . ")";


if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error occured: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
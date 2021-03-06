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
$sql = "CREATE TABLE Movie_sales(\n"
    . " ID INT PRIMARY KEY AUTO_INCREMENT,\n"
    . " Name VARCHAR(50) NOT NULL,\n"
    . " Email VARCHAR(50) NOT NULL,\n"
    . " Phone VARCHAR(50) NOT NULL,\n"
    . " Movie INT NOT NULL,\n"
    . " Date VARCHAR(50) NOT NULL\n"
    . " Time VARCHAR(50) NOT NULL\n"
    . " Seat VARCHAR(50) NOT NULL\n"
    . " )";

/* NOT NULL - Each row must contain a value for that column, null values are not allowed
DEFAULT value - Set a default value that is added when no other value is passed
UNSIGNED - Used for number types, limits the stored data to positive numbers and zero
AUTO INCREMENT - MySQL automatically increases the value of the field by 1 each time a new record is added
PRIMARY KEY - Used to uniquely identify the rows in a table. The column with PRIMARY KEY setting is often an ID number, and is often used with AUTO_INCREMENT
*/


if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error occured: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
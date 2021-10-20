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
$sql = "CREATE TABLE User(\n"
    . "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,\n"
    . "Email VARCHAR(30) NOT NULL,\n"
    . "Username VARCHAR(50) NOT NULL,\n"
    . "User_password VARCHAR(60) NOT NULL\n"
    . ")";

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

$pwd = md5('f32ee');

$sql = "INSERT INTO User (Email, Username, User_password)
VALUES ('f32ee@localhost', 'f32ee', '$pwd')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
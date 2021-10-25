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
// if(isset($_GET['movie_id'])) {
//   echo $_GET['movie_id'];
//  }
$ID = $_GET['submit_button'];
$name = $_POST['name'];
$email = $_POST['email'];
$phonenum = $_POST['phonenum'];
$phonenum = (string)$phonenum;
$date = $_POST['bookeddate'];
$date = (string)$date;
$time = $_POST['bookedtime'];
$time = (string)$time;
$seat = $_POST['bookedseat'];
echo $seat;

// $sql = "INSERT INTO Movie_sales(Name,Email,Phone,Movie,Date,Time,Seat) VALUES($name,$email,$phonenum,$ID,$date,$time,$seat)";

// if (mysqli_query($conn, $sql)){
//   echo"success";
// }
// else{
//     echo 'Failed';
// }


mysqli_close($conn);
?>
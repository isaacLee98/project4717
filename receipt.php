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

$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "SELECT * FROM Movie_sales ORDER BY ID DESC LIMIT 1";

if (mysqli_query($conn, $sql)){
    $result = $conn->query($sql);
    $num_result = $result->num_rows;
    echo "<style>";
    echo "table,th,td { border: 1px solid white; }";
    echo "</style>";
    echo "<table>";
    echo "<tr>";
    echo "<th> Movie </th>";
    echo "<th> Date </th>";
    echo "<th> Time </th>";
    echo "<th> Seat </th>";
    echo "</tr>";
    for ($i = 0; $i<$num_result; $i++){
        $row = $result->fetch_assoc();
        if ($row['Phone'] == $phone){
            $movie_id = $row['Movie'];
            $sql2 = "SELECT * FROM Movie WHERE ID = $movie_id";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            $movie = $row2['Name'];
            echo "<tr>";
            echo "<td>".$movie."</td>";
            echo "<td>".$row['Date']."</td>";
            echo "<td>".$row['Time']."</td>";
            echo "<td>".$row['Seat']."</td>"; 
            echo "</tr>";
        }
    }}
    else{
        echo mysqli_error($conn);
    }

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HomePage</title>
    <link rel = "stylesheet" href = 'background.css'>
    <style>
      .table{width: 100%;}
      .table td {text-align: center;
           padding: 15px;}
    </style>  
  </head>
  <body>
    <header>
      <a href = "index.html"><img src="logo.jpg" alt="Logo"/></a>
      <a href="login.html"><p id="login">Login/Sign Up</p></a>
    </div>
    </header>
    <div class="topnav">
      <a href="nowshowing.html">Now Showing</a>
      <a href="comingsoon.html">Coming Soon</a>
      <a href="promotion.html">Promotion</a>
      <a href="checkbooking.html">Show My Bookings</a>
    </div>
    <h1><strong>Thank you for Booking!</strong></h1>
    <div class = "movie_poster">
      <table class = "table">
      </table>
    </div>
  </body>
  <footer></footer>
</html>
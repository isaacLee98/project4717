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


$sql = "SELECT * FROM Movie_sales ORDER BY ID DESC LIMIT 1";

if (mysqli_query($conn, $sql)){
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $movie_id = $row['Movie'];
    $sql2 = "SELECT * FROM Movie WHERE ID = $movie_id";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $movie = $row2['Name'];
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
    echo "<tr>";
    echo "<td>".$movie."</td>";
    echo "<td>".$row['Date']."</td>";
    echo "<td>".$row['Time']."</td>";
    echo "<td>".$row['Seat']."</td>"; 
    echo "</tr>";
        
    }
    else{
        echo mysqli_error($conn);
    }

mysqli_close($conn);

$line1 = "Dear ".$row['Name'].",\n\n";
$line2 = "Thank you for purchasing at SkyCinema, here are your booking details:\n";
$line3 = "Movie: ".$movie."\n";
$line4 = "Date: ".$row['Date']."\n";
$line5 = "Time: ".$row['Time']."\n";
$line6 = "Seat(s): ".$row['Seat']."\n\n";
$line7 = "Please come to SkyCinema to enjoy the movie.\n\n";
$line8 = "Regards,\nSkyCinema";

$msg = $line1.$line2.$line3.$line4.$line5.$line6.$line7.$line8;
$subject = "SkyCinema Booking Details";
mail('f32ee@localhost', $subject, $msg);
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
    </header>
    <div class="topnav">
      <a href="index.html">Now Showing</a>
      <a href="comingsoon.html">Coming Soon</a>
      <a href="promotion.html">Promotion</a>
      <a href="checkbooking.html">Show My Bookings</a>
    </div>
    <h1><strong>Thank you for Booking!</strong></h1>
    <div class = "movie_poster">
    </div>
  </body>
  <footer></footer>
</html>
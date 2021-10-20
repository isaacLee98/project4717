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
$ID = $_GET['movie_id'];

$sql = "SELECT * FROM Movie WHERE ID = $ID";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$Name = $row['Name'];
$Image_path = $row['Image_path'];
$Length = $row['Length'];
$Language = $row['Language'];
$Casting = $row['Casting'];
$Rating = $row['Rating'];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HomePage</title>
    <link rel="stylesheet" href="background.css" />
    <style>
      #moviedetail {
        margin-left: 300px;
      }
      #moviewrapper img {
        width: 280px;
        height: 400px;
      }
    </style>
  </head>
  <body>
    <header>
      <a href="index.html"><img src="logo.jpg" alt="Logo" /></a>
      <a href="login.html"><p id="login">Login/Sign Up</p></a>
    </div>
    </header>
    <div class="topnav">
      <a href="nowshowing.html">Now Showing</a>
      <a href="comingsoon.html">Coming Soon</a>
      <a href="promotion.html">Promotion</a>
      <a href="checkbooking.html">Show My Bookings</a>
    </div>
    <div id="moviewrapper">
      <img src=<?= $Image_path ?> style="float: left" />
      <div id="moviedetail">
        <h1 id="movietitle"><?= $Name ?></h1>
          <h2>Length: <?= $Length ?></h2>
          <h2>Language: <?= $Language ?></h2>
          <h2>Casts: <?= $Casting ?></h2>
          <h2>Rating: <?= $Rating ?></h2>
          <button onclick="window.location='bookingpage.html';">Book Ticket</button>
    </div>
  </body>
  <footer></footer>
</html>

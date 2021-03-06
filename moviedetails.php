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
      #moviedetail h3{
        font-family: "Helvetica Neue",Arial,sans-serif; font-size: 16px; font-weight: 300; line-height: 1.5625; margin-bottom: 15px;
      }
    </style>
  </head>
  <body>
    <header>
      <a href="index.html"><img src="logo.jpg" alt="Logo" /></a>
    </header>
    <div class="topnav">
      <a href="index.html">Now Showing</a>
      <a href="comingsoon.html">Coming Soon</a>
      <a href="promotion.html">Promotion</a>
      <a href="checkbooking.html">Show My Bookings</a>
    </div>
    <div id="moviewrapper">
      <img src=<?= $Image_path ?> style="float: left" />
      <div id="moviedetail">
        <form method = 'get' action = 'bookingpage.php'>
          <h1 id="movietitle"><?= $Name ?></h1>
            <h3>Length: <b><?= $Length ?>mins</b></h3>
            <h3>Language: <b><?= $Language ?></b></h3>
            <h3>Casts: <b><?= $Casting ?></b></h3>
            <h3>Rating: <b><?= $Rating ?></b></h3>
            <button type = 'submit' value = <?= $ID ?> name = 'submit_button'>Book Ticket</button>
        </form>
    </div>
  </body>
  <footer></footer>
</html>

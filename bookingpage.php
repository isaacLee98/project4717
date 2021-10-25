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
    <link rel = "stylesheet" href = 'background.css'>
    <link rel = "stylesheet" href = 'seat.css'>
  </head>
  <style>
    #bookingdetail{
      width:80%;
      align-items:center;
    }
    #movietable{
      margin:auto;
    }
    #movietable td{
      width:30%;
    }
  </style>
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
    <br>
    <div id="booking">
      <img src = <?= $Image_path ?> width="200" height="300">
      <h3><?= $Name ?></h3>
      <form action='booking.php' method='POST'>
        <table>
          <tr>
            <td>Select your date: </td>
            <td><input type='date' name='bookeddate' id="bookeddate"></td>
      </tr>
      <tr>
        <td>Select your time: </td>
        <td><select id='bookedtime' name='bookedtime'>
          <option id='closesttonow'></option>
          <option id='hour1'></option>
          <option id='hour2'></option>
          <option id='hour3'></option>
        </select></td>
      </tr>
      </table>
      </form>
    </div>
<script>
let getRoundedDate = (minutes, d=new Date()) => {

let ms = 1000 * 60 * minutes; 
let roundedDate = new Date(Math.round(d.getTime() / ms) * ms);

return roundedDate;
}
var defaultdate = document.getElementById('bookeddate').valueAsDate = new Date();


var option1 = document.getElementById('closesttonow');
var option2 = document.getElementById('hour1');
var option3 = document.getElementById('hour2');
var option4 = document.getElementById('hour3');

var interval = 30 * 60 * 1000;
var option1time = new Date(Math.ceil(new Date().getTime()/interval)* interval);
var option2time = new Date();
option2time.setHours(option1time.getHours() + 1);
option2time = getRoundedDate(30,option2time);
var option3time = new Date();
option3time.setHours(option1time.getHours() + 2);
option3time = getRoundedDate(30,option3time);
var option4time = new Date();
option4time.setHours(option1time.getHours() + 3);
option4time = getRoundedDate(30,option4time);


option1.innerHTML = option1time.toLocaleTimeString();
option2.innerHTML = option2time.toLocaleTimeString();
option3.innerHTML = option3time.toLocaleTimeString();
option4.innerHTML = option4time.toLocaleTimeString();






</script>    
  </body>
  <footer></footer>
</html>
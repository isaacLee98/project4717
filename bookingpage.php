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
<?php

function updateoccupieddetail(){
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";


$ID = $_GET['submit_button'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// if(isset($_GET['movie_id'])) {
//   echo $_GET['movie_id'];
//  }

$sql = "SELECT Date,Time,Seat FROM Movie_sales WHERE ID = $ID";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$date = $row["Date"];
$time = $row["Time"];
$seat = $row["Seat"];

$occupied_details = array($date, $time,$seat);
mysqli_close($conn);
return $seat;
}
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
    .seat {
      background-color: #444451;
      height: 12px;
      width: 15px;
      margin: 3px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;    
    }
  .seat.selected{
    background-color: #6feaf6;
    }
    .seat:nth-of-type(2) {
  margin-right: 18px;
}
.seat.occupied{
  background-color: #fff;
}
.seat:not(.occupied):hover {
  cursor:pointer;
  transform:scale(1.2);
}

.seat:nth-last-of-type(2) {
    margin-left: 18px;
}
.row {
  display:flex;
}
.container {
    perspective: 1000px;
    margin-bottom: 30px;
}
.screen {
  background-color: #fff;
  height: 70px;
  width: 100%;
  margin:15px 0;
  transform:rotatex(-45deg);
  box-shadow:0 3px 10px rgba(255,255,255,0.3);
}
p.text span{
  color: #6feaf6
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
            <td>Your Name: </td>
            <td><input type="text" name="name" id="name"></td>
</tr>
<tr>
            <td>Your Email: </td>
            <td><input type="email" name="email" id="email"></td>
</tr>
<tr>
            <td>Your Phone Number: </td>
            <td><input type="tel" name="phonenum" id="phonenum"></td>
</tr>
          <tr>
            <td>Select your date: </td>
            <td><input type='date' name='bookeddate' id="bookeddate" onchange='updateseats()'></td>
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
      <tr>
      <td>Select your seat: </td>
      <td>
        <div class="container">
          <div class = "screen"></div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
        </div>
      </td>
</tr>
<tr>
  <td><input style="display:none" name="bookedseat" id="seat"></td>
  <td><input type="submit" value="Book" onsubmit="updateseat();"></td>
</tr>
      </table>

      <p class="text">You have selected <span id="count">0</span> Seats for a price of $<span id="total">0</span></p>
      </form>
    </div>
    <script>
      var container = document.querySelector(".container");
      var seats = document.querySelectorAll(".row .seat");
      var count = document.getElementById("count");
      var total = document.getElementById("total");

    //check for occupied
    var occupieddate = "<?php echo $date ?>";
    var occupiedtime = "<?php echo $time ?>";
      var occupiedseats = new Array(<?php echo $seat; ?>); 
      populateUI();

      function updateseat(){
        document.getElementById("bookedseat").value = localStorage.getItem("selectedSeats");
      }

      function updateseats(){
        var occupieddetails = "<?=updateoccupieddetail();?>";
        console.log(occupieddetails);
      }


      //Update Number of Selected Seats and Total Price
      function updateCount(){
        selectedSeats = container.querySelectorAll(".row .seat.selected");
        count.textContent = selectedSeats.length;
        total.textContent = selectedSeats.length * 10;
        console.log(selectedSeats);
        seatsIndex = [...selectedSeats].map(function(seat){
          return [...seats].indexOf(seat);
        });
        console.log(seatsIndex);
        localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));
      }

      function populateUI(){        
        if(occupiedseats !== null && occupiedseats.length > 0){
          seats.forEach(function(seat,index){
            if(occupiedseats.indexOf(index) != -1) {
              seat.classList.add("occupied");
            }
          })
        }
      }


      container.addEventListener("click", function(e){
        if(e.target.classList.contains("seat") && !e.target.classList.contains("occupied")){
          e.target.classList.toggle("selected");
          updateCount();
        }
      });
      updateCount();
      
      </script>
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